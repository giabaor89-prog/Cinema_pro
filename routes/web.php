<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatbotController;
use Illuminate\Support\Facades\Route;
use App\Models\Movie;

/*
|--------------------------------------------------------------------------
| ROUTE KIỂM TRA VÉ
|--------------------------------------------------------------------------
*/

// Kiểm tra vé theo mã booking (dùng cho quét QR hoặc nhập mã)
Route::get('/ticket/check/{booking_code}', [MovieController::class, 'checkTicket']);


/*
|--------------------------------------------------------------------------
| ROUTE ĐẶT VÉ & XÁC NHẬN
|--------------------------------------------------------------------------
*/

// Trang xác nhận đặt vé (GET + POST), yêu cầu đăng nhập
Route::match(['get', 'post'], '/booking-confirm', [MovieController::class, 'bookingConfirm'])
    ->middleware('auth');

// Gửi thông tin liên hệ từ form Contact
Route::post('/send-contact', [MovieController::class, 'sendContact']);

// Lưu vé sau khi đặt (yêu cầu đăng nhập)
Route::post('/save-ticket', [MovieController::class, 'saveTicket'])
    ->middleware('auth');

// Xem vé đã đặt của người dùng
Route::get('/my-tickets', [MovieController::class, 'myTickets'])
    ->middleware('auth');

// Thay đổi QR code (có thể dùng cho refresh mã vé)
Route::get('/change-qr', [MovieController::class, 'changeQR']);


/*
|--------------------------------------------------------------------------
| ROUTE PHIM & THÔNG TIN PHIM
|--------------------------------------------------------------------------
*/

// Trang thông tin chi tiết nâng cao của phim
Route::get('/movie/{id}/info', [MovieController::class, 'info'])
    ->name('movie.info');

// Trang chi tiết phim cơ bản
Route::get('/movie/{id}', [MovieController::class, 'show'])
    ->name('movie.detail');

// Trang danh sách lịch chiếu
Route::get('/showtimes', [MovieController::class, 'showtimes'])
    ->name('showtimes');

// Trang danh sách phim
Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies');

// Trang chủ
Route::get('/', [MovieController::class, 'index']);


/*
|--------------------------------------------------------------------------
| ROUTE TRANG TĨNH
|--------------------------------------------------------------------------
*/

// Trang khuyến mãi
Route::get('/promotions', function () {
    return view('promotions');
})->name('promotions');

// Trang liên hệ
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Trang giới thiệu
Route::view('/about', 'about')->name('about');

// Trang điều khoản sử dụng
Route::get('/terms', function () {
    return view('terms');
})->name('terms');


/*
|--------------------------------------------------------------------------
| CHATBOT
|--------------------------------------------------------------------------
*/

// API chatbot dùng cho AJAX (frontend gọi tới)
Route::post('/chatbot', [ChatbotController::class, 'respond']);


/*
|--------------------------------------------------------------------------
| DASHBOARD & PROFILE (YÊU CẦU ĐĂNG NHẬP)
|--------------------------------------------------------------------------
*/

// Trang dashboard (chỉ user đã xác thực mới vào được)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Nhóm route quản lý profile người dùng
Route::middleware('auth')->group(function () {

    // Hiển thị form chỉnh sửa profile
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Cập nhật thông tin profile
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Xóa tài khoản
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

// Trang quản trị (UI), yêu cầu đăng nhập
// Lưu ý: phân quyền admin có thể kiểm tra trong view hoặc middleware riêng
Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin');

// Trang quản lý cho nhân viên (staff) — chỉ 
// user có role 'staff' hoặc 'admin' được truy cập
Route::get('/admin/staff', function () {
    return view('admin.staff');
})->middleware(['auth', \App\Http\Middleware\EnsureUserIsStaff::class])->name('admin.staff');


/*
|--------------------------------------------------------------------------
| AUTH (Laravel Breeze / Jetstream)
|--------------------------------------------------------------------------
*/

// Load các route xác thực (login, register, logout,...)
require __DIR__.'/auth.php';