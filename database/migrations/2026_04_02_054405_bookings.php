<?php

/**
 * Migration: Tạo bảng `bookings`
 *
 * Mục đích: lưu các bản ghi đặt vé (hoặc giỏ hàng tùy thiết kế).
 * Cột chính: `id`, `showtime_id`, `seat_number`, `total_price`, timestamps.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showtime_id')->constrained()->cascadeOnDelete();
            $table->string('seat_number');
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
