<?php

/**
 * Migration: Thêm cột `user_id` vào bảng `tickets`
 *
 * Mục đích: liên kết vé với người dùng (nếu vé được mua bởi tài khoản đã đăng nhập).
 * Cột `user_id` được thêm là nullable để vẫn cho phép vé không bắt buộc phải có user.
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
       Schema::table('tickets', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            //
        });
    }
};
