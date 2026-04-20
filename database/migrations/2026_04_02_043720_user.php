<?php

/**
 * Migration: Tạo bảng `users`
 *
 * Mục đích: lưu thông tin người dùng cơ bản.
 * Cột chính: `id`, `name`, `email` (unique), `password`, `created_at`, `updated_at`.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // khóa chính
            $table->string('name'); // tên
            $table->string('email')->unique(); // email không trùng
            $table->string('password'); // mật khẩu
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
