<?php

/**
 * Migration: Tạo bảng `movies`
 *
 * Mục đích: lưu thông tin phim gồm tiêu đề, mô tả, hình ảnh, thời lượng, v.v.
 * Cột chính: `id`, `title`, `description`, `image`, `duration`, `created_at`, `updated_at`.
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
    Schema::create('movies', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->string('image')->nullable();   // thêm
        $table->integer('duration')->nullable(); // thêm
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('movies'); // phải đúng tên bảng
}
};
