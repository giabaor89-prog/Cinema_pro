<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * AppServiceProvider
     * Dùng để đăng ký các service container bindings và bootstrap logic toàn cục.
     */
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Đăng ký binding, singleton, observer, v.v.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Code khởi tạo, macro hoặc sự kiện boot toàn cục.
    }
}
