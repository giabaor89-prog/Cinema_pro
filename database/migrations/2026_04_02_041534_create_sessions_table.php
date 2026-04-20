<?php

/**
 * Migration: Tạo bảng `sessions`
 *
 * Mục đích: lưu dữ liệu phiên (session) khi sử dụng driver 'database'.
 * Cột chính:
 * - id: string, khóa chính của session
 * - user_id: nullable foreign id, liên kết đến users nếu có
 * - ip_address: địa chỉ IP client
 * - user_agent: chuỗi user agent (trình duyệt)
 * - payload: dữ liệu session (được serialize)
 * - last_activity: timestamp (int) của lần hoạt động cuối
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
    Schema::create('sessions', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->foreignId('user_id')->nullable()->index();
        $table->string('ip_address', 45)->nullable();
        $table->text('user_agent')->nullable();
        $table->longText('payload');
        $table->integer('last_activity')->index();
    });
}
};
