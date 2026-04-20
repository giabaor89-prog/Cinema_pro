<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'is_staff')) {
                // Nếu có cột `is_admin` thì thêm sau đó, nếu không thì thêm bình thường
                if (Schema::hasColumn('users', 'is_admin')) {
                    $table->boolean('is_staff')->default(false)->after('is_admin');
                } else {
                    $table->boolean('is_staff')->default(false);
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_staff')) {
                $table->dropColumn('is_staff');
            }
        });
    }
};
