<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    /**
     * Chuẩn hoá chuỗi: bỏ dấu tiếng Việt, loại bỏ ký tự không phải chữ/số
     * và chuyển về chữ thường để so sánh.
     * @param string $s Chuỗi đầu vào
     * @return string Chuỗi đã chuẩn hoá
     */
    private function normalize(string $s): string
    {
        // remove diacritics and non-alphanum
        $t = iconv('UTF-8', 'ASCII//TRANSLIT', $s);
        $t = preg_replace('/[^A-Za-z0-9\s]/', '', $t);
        return trim(mb_strtolower($t));
    }

    /**
     * Tìm một phim trong bảng `movies` dựa trên tiêu đề đã được chuẩn hoá.
     * So sánh bằng tiêu đề đã remove dấu để tăng khả năng khớp tên nhập không dấu.
     * @param string $norm Tiêu đề đã chuẩn hoá
     * @return object|null Trả về đối tượng phim (id, title, description, duration) hoặc null nếu không tìm thấy
     */
    private function findMovieByNormalized(string $norm)
    {
        $movies = DB::table('movies')->select('id', 'title', 'description', 'duration')->get();
        foreach ($movies as $m) {
            $n = $this->normalize(mb_strtolower($m->title));
            if ($n === $norm || str_contains($n, $norm) || str_contains($norm, $n)) {
                return $m;
            }
        }
        return null;
    }
    /**
     * Endpoint xử lý tin nhắn từ widget chatbot (AJAX POST).
     * - Đọc `message` từ request
     * - Chuẩn hoá và xác định intent (lịch chiếu/giá/thông tin phim/ghế)
     * - Truy vấn CSDL tương ứng và trả về JSON chứa key `reply` (chuỗi phản hồi)
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond(Request $request)
    {
        $msg = trim($request->input('message', ''));

        try {
            $low = mb_strtolower($msg);
            $norm = $this->normalize($low);

            if ($msg === '') {
                return response()->json(['reply' => 'Bạn chưa nhập câu hỏi.']);
            }

            // Intent: hỏi phim / lịch chiếu
            if (str_contains($low, 'lịch') || str_contains($low, 'suất') || str_contains($low, 'chiếu')) {
            $today = Carbon::today()->toDateString();

            $rows = DB::table('showtimes')
                ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
                ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
                ->whereDate('showtimes.start_time', $today)
                ->orderBy('showtimes.start_time')
                ->select('movies.title', 'cinemas.name as cinema', 'showtimes.start_time', 'showtimes.price')
                ->limit(8)
                ->get();

            if ($rows->isEmpty()) {
                return response()->json(['reply' => 'Hiện không tìm thấy suất chiếu cho hôm nay. Bạn muốn xem phim nào cụ thể không?']);
            }

            $lines = [];
            foreach ($rows as $r) {
                $time = Carbon::parse($r->start_time)->format('H:i');
                $lines[] = "{$r->title} — {$time} @ {$r->cinema} (Giá: {$r->price}đ)";
            }

            $reply = "Lịch chiếu hôm nay:\n" . implode("\n", $lines);
            return response()->json(['reply' => $reply]);
        }

        // Intent: hỏi giá
        if (str_contains($low, 'giá') || str_contains($low, 'bao nhiêu')) {
            $movie = $this->findMovieByNormalized($norm);

            if ($movie) {
                $row = DB::table('showtimes')
                    ->where('movie_id', $movie->id)
                    ->orderBy('start_time')
                    ->first();
                if ($row) {
                    return response()->json(['reply' => "Giá vé cho '{$movie->title}' khoảng {$row->price}đ (tùy suất và loại ghế)."]);
                }
            }

            return response()->json(['reply' => 'Giá vé dao động tuỳ theo rạp và suất chiếu; thường từ 85.000đ - 150.000đ. Bạn muốn xem giá cho phim nào?']);
        }

        // Intent: hỏi thông tin phim (tìm theo tiêu đề)
        $movie = $this->findMovieByNormalized($norm);

        if ($movie) {
            $reply = "Thông tin phim: {$movie->title}. ";
            if (!empty($movie->description)) $reply .= trim($movie->description) . ' ';
            if (!empty($movie->duration)) $reply .= "Thời lượng: {$movie->duration} phút. ";

            // show next showtimes
            $rows = DB::table('showtimes')
                ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
                ->where('showtimes.movie_id', $movie->id)
                ->where('showtimes.start_time', '>=', Carbon::now())
                ->orderBy('showtimes.start_time')
                ->select('cinemas.name as cinema', 'showtimes.start_time', 'showtimes.price')
                ->limit(5)
                ->get();

            if ($rows->isNotEmpty()) {
                $reply .= "\nSuất chiếu sắp tới:\n";
                foreach ($rows as $r) {
                    $reply .= Carbon::parse($r->start_time)->format('d/m H:i') . " @ {$r->cinema} (Giá: {$r->price}đ)\n";
                }
            }

            return response()->json(['reply' => $reply]);
        }

        // Intent: kiểm tra ghế/vé còn (ví dụ: "còn ghế", "còn vé avengers")
        if (str_contains($low, 'ghế') || str_contains($low, 'còn chỗ') || str_contains($low, 'còn vé') || str_contains($low, 'vé còn')) {
            $movie = $this->findMovieByNormalized($norm);
            if (! $movie) {
                return response()->json(['reply' => 'Bạn muốn kiểm tra vé cho phim nào? Vui lòng cho biết tên phim.']);
            }

            $showtimes = DB::table('showtimes')
                ->where('movie_id', $movie->id)
                ->where('start_time', '>=', Carbon::now())
                ->orderBy('start_time')
                ->select('id', 'start_time')
                ->get();

            if ($showtimes->isEmpty()) {
                return response()->json(['reply' => 'Hiện không có suất chiếu sắp tới cho phim này.']);
            }

            $lines = [];
            foreach ($showtimes as $s) {
                $available = DB::table('seats')->where('showtime_id', $s->id)->where('is_booked', false)->count();
                $time = Carbon::parse($s->start_time)->format('d/m H:i');
                $lines[] = "{$time} — Còn {$available} ghế";
            }

            $reply = "Tình trạng ghế cho '{$movie->title}':\n" . implode("\n", $lines);
            return response()->json(['reply' => $reply]);
        }

            // Default fallback
            return response()->json(['reply' => 'Xin chào! Mình là Trợ lý Cinema. Mình có thể giúp bạn xem lịch chiếu, giá vé hoặc thông tin phim. Hãy hỏi tên phim hoặc "lịch chiếu hôm nay".']);
        } catch (\Throwable $e) {
            Log::error('ChatbotController::respond error', [
                'message' => $msg,
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(['reply' => 'Lỗi nội bộ server. Vui lòng thử lại sau.'], 500);
        }
    }

}
