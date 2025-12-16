<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // 1. Khai báo tên bảng (nếu Laravel không tự nhận diện đúng số nhiều)
    protected $table = 'feedback';

    // 2. Khai báo khóa chính (Vì bảng của bạn dùng 'feedback_id' thay vì 'id')
    protected $primaryKey = 'feedback_id';

    public $timestamps = false;

    // 3. Cho phép các cột này được lưu dữ liệu
    protected $fillable = [
        'user_id', // Nếu bảng của bạn có cột này để lưu người gửi
        'rating',
        'message', // Trong DB là 'message'
        'unread'
    ];
}