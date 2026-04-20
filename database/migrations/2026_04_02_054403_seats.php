<?php

/**
 * Migration: Tạo bảng `seats`
 *
 * Mục đích: quản lý ghế cho từng `showtime` (vị trí, trạng thái đặt).
 * Cột chính: `id`, `showtime_id`, `seat_number`, `is_booked`, timestamps.
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('showtime_id')->constrained()->cascadeOnDelete();
            $table->string('seat_number');
            $table->boolean('is_booked')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
