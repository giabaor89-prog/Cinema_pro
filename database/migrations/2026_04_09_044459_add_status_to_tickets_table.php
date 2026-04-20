<?php

/**
 * Migration: Thêm cột `status` vào bảng `tickets`
 *
 * Mục đích: theo dõi trạng thái vé (ví dụ: 'booked', 'used', 'cancelled').
 * Thực hiện bằng cách thêm cột string `status` với giá trị mặc định 'booked'.
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
        $table->string('status')->default('booked');
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
