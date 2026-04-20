<?php

/**
 * Migration: Tạo bảng `tickets`
 *
 * Mục đích: lưu thông tin vé đã phát hành.
 * Cột chính: `id`, `movie_id`, `booking_code`, `seats`, `total`, `email`, timestamps.
 * Các migration bổ sung sẽ thêm `status` và `user_id` khi cần thiết.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('movie_id');
    $table->string('booking_code');
    $table->string('seats');
    $table->integer('total');
    $table->string('email');
    $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
