<?php

namespace App\Models;

// Dùng cái này để hỗ trợ đăng nhập (Auth)
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; // Thêm cái này nếu cần gửi mail reset pass

class User extends Authenticatable
{
    // public $timestamps = false; // Bỏ comment nếu bảng user của ông không có cột created_at/updated_at
    protected $primaryKey = "user_id";
    protected $table = "users";

    protected $fillable = [
        "name",
        "email",
        "password",
        "avatar",
        "role",
        "created_at",
        "updated_at",
    ];

    // Thêm dòng này để Laravel biết cột password tên là gì (nếu ông đặt khác mặc định)
    // public function getAuthPassword() {
    //     return $this->password;
    // }
}