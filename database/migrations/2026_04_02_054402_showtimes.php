<?php

/**
 * Migration: Tạo bảng `showtimes`
 *
 * Mục đích: lưu các suất chiếu, liên kết `movie_id` và `cinema_id`.
 * Cột chính: `id`, `movie_id`, `cinema_id`, `start_time`, `price`, timestamps.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('showtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained()->cascadeOnDelete();
            $table->foreignId('cinema_id')->constrained()->cascadeOnDelete();
            $table->dateTime('start_time');
            $table->integer('price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
