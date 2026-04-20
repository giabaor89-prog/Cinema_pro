<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// bootstrap/app.php: cấu hình ứng dụng khởi tạo (routing, console, healthcheck)
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Chèn middleware toàn cục nếu cần
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        // Cấu hình xử lý ngoại lệ tùy chỉnh
    })->create();
