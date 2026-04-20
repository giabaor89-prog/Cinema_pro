<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// routes/console.php: Đăng ký các lệnh Artisan tùy chỉnh cho ứng dụng.
// Lệnh 'inspire' trả về một câu trích dẫn truyền cảm hứng khi gọi `php artisan inspire`.
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
