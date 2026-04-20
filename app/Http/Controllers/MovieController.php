<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class MovieController extends Controller
{
    /**
     * Display a listing of movies with optional search (case-insensitive) and pagination.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        if ($q) {
            $term = mb_strtolower($q, 'UTF-8');
            $movies = DB::table('movies')->whereRaw('LOWER(title) LIKE ?', ["%{$term}%"])->get();
        } else {
            $movies = DB::table('movies')->get();
        }

        return view('movies', compact('movies'));
    }

    /**
     * Show movie detail with showtimes and cinemas.
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        $showtimes = DB::table('showtimes')
            ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
            ->where('movie_id', $id)
            ->select('showtimes.*', 'cinemas.name as cinema_name', 'cinemas.id as cinema_id')
            ->get();

        $cinemas = DB::table('cinemas')->get();

        return view('movie_detail', compact('movie', 'showtimes', 'cinemas'));
    }

    /**
     * Simple info view for a movie.
     */
    public function info($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movie_info', compact('movie'));
    }

    /**
     * List all showtimes joined with cinemas and movies.
     */
    // Sửa lại hàm showtimes trong Controller của cậu như sau:

public function showtimes()
{
    $showtimes = DB::table('showtimes')
        ->join('cinemas', 'showtimes.cinema_id', '=', 'cinemas.id')
        ->join('movies', 'showtimes.movie_id', '=', 'movies.id')
        ->select(
            'showtimes.*',
            'cinemas.name as cinema_name',
            'cinemas.id as cinema_id',
            'movies.title as movie_title',
            'movies.image'
        )
        ->get();

    // DÒNG QUAN TRỌNG NHẤT: Gom nhóm theo tiêu đề phim
    // Nó sẽ biến collection phẳng thành một mảng có key là tên phim
    $groupedShowtimes = $showtimes->groupBy('movie_title');

    return view('showtimes', compact('groupedShowtimes'));
}

    /**
     * Booking confirmation page (expects movie_id, cinema_id, showtime_id)
     */
    public function bookingConfirm(Request $request)
    {
        if (!$request->movie_id) {
            return redirect('/');
        }

        $movie = DB::table('movies')->where('id', $request->movie_id)->first();
        $cinema = DB::table('cinemas')->where('id', $request->cinema_id)->first();
        $showtime = DB::table('showtimes')->where('id', $request->showtime_id)->first();

        return view('my_ticket', [
            'movie' => $movie,
            'cinema' => $cinema,
            'showtime' => $showtime,
            'seats' => $request->selected_seats,
            'total' => $request->total_price,
            'booking_code' => 'RAP' . rand(100000, 999999)
        ]);
    }

    /**
     * Return QR image HTML for payment preview.
     */
    public function changeQR(Request $request)
    {
        $bank = "970422";
        $account = "0933257687";
        $amount = $request->total;
        $content = $request->booking;

        $qr = "https://img.vietqr.io/image/" . $bank . "-" . $account . "-compact2.png?amount=" . $amount . "&addInfo=" . $content;

        return '<img src="' . $qr . '" width="250" class="rounded-xl">';
    }

    /**
     * Save ticket and send email with QR.
     */
    public function saveTicket(Request $request)
    {
        $exist = DB::table('tickets')
            ->where('movie_id', $request->movie_id)
            ->where('seats', $request->seats)
            ->exists();

        if ($exist) {
            return back()->with('error', 'Ghế đã được đặt');
        }

        DB::table('tickets')->insert([
            'user_id' => auth()->id(),
            'movie_id' => $request->movie_id,
            'cinema_id' => $request->cinema_id,
            'showtime_id' => $request->showtime_id,
            'booking_code' => $request->booking_code,
            'seats' => $request->seats,
            'email' => $request->email,
            'phone' => $request->phone,
            'total' => $request->total,
            'status' => 'booked',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $movie = DB::table('movies')->where('id', $request->movie_id)->first();
        $scanUrl = url('/ticket/check/' . $request->booking_code);
        $ticketQR = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . $scanUrl;

        try {
            Mail::to($request->email)->send(new TicketMail([
                'booking_code' => $request->booking_code,
                'movie_title' => $movie->title,
                'seats' => $request->seats,
                'total' => $request->total,
                'ticket_qr' => $ticketQR
            ]));
        } catch (\Exception $e) {
            // ignore mail errors for now
        }

        return redirect('/')->with('success', 'Đặt vé thành công');
    }

    /**
     * User tickets listing (admin sees all).
     */
    public function myTickets()
    {
        $adminEmail = env('ADMIN_EMAIL');
        $isAdmin = false;
        if (auth()->check()) {
            $user = auth()->user();
            $isAdmin = ($user->is_admin ?? false) || ($adminEmail && $user->email === $adminEmail);
        }

        if ($isAdmin) {
            $tickets = DB::table('tickets')
                ->join('movies', 'tickets.movie_id', '=', 'movies.id')
                ->join('cinemas', 'tickets.cinema_id', '=', 'cinemas.id')
                ->join('showtimes', 'tickets.showtime_id', '=', 'showtimes.id')
                ->select(
                    'tickets.*',
                    'movies.title as movie_title',
                    'movies.image as movie_image',
                    'cinemas.name as cinema_name',
                    'showtimes.start_time as showtime_start'
                )
                ->latest('tickets.created_at')
                ->get();

            return view('my_tickets', compact('tickets'));
        }

        $tickets = DB::table('tickets')
            ->join('movies', 'tickets.movie_id', '=', 'movies.id')
            ->join('cinemas', 'tickets.cinema_id', '=', 'cinemas.id')
            ->join('showtimes', 'tickets.showtime_id', '=', 'showtimes.id')
            ->where('tickets.user_id', auth()->id())
            ->select(
                'tickets.*',
                'movies.title as movie_title',
                'movies.image as movie_image',
                'cinemas.name as cinema_name',
                'showtimes.start_time as showtime_start'
            )
            ->latest('tickets.created_at')
            ->get();

        return view('my_tickets', compact('tickets'));
    }

    /**
     * Handle contact form and send email.
     */
    public function sendContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'message' => 'required|string'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->message,
            'sent_at' => now()->toDateTimeString(),
        ];

        Mail::send('emails.contact', $data, function ($mail) use ($request) {
            $mail->to('giabaor89@gmail.com')
                ->from(config('mail.from.address'), config('mail.from.name'))
                ->replyTo($request->email, $request->name)
                ->subject('Liên hệ mới từ Cinema Pro');
        });

        return back()->with('success', 'Đã gửi liên hệ thành công');
    }

    /**
     * Check and mark ticket as used by booking code.
     */
    public function checkTicket($booking_code)
    {
        $ticket = DB::table('tickets')->where('booking_code', $booking_code)->first();

        if (!$ticket) {
            return 'Không tìm thấy vé';
        }

        if ($ticket->status == 'used') {
            return 'Vé này đã được sử dụng';
        }

        DB::table('tickets')
            ->where('booking_code', $booking_code)
            ->update([
                'status' => 'used',
                'updated_at' => now()
            ]);

        return 'Quét vé thành công - Vé hợp lệ';
    }

}
