<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * User model
     * Đại diện cho bảng users. Các thuộc tính fillable và hidden được định nghĩa bằng attributes.
     */

    /**
     * Get the attributes that should be cast.
     * - `email_verified_at` -> datetime
     * - `password` -> hashed (tự động hashing khi gán)
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    /**
     * Kiểm tra user có quyền admin hay không.
     * Trả true nếu cột `is_admin` = true hoặc email trùng `ADMIN_EMAIL` trong .env.
     * @return bool
     */
    public function isAdmin(): bool
    {
        $adminEmail = env('ADMIN_EMAIL');
        return ($this->is_admin ?? false) || ($adminEmail && $this->email === $adminEmail);
    }
}
