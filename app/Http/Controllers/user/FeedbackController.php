<?php

namespace App\Http\Controllers\user; // Kiểm tra lại namespace của bạn cho đúng thư mục

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback; // Nhớ import Model Feedback
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // Hàm hiển thị form (như cũ)
    public function index() {
        return view('user.feedback');
    }

    // Hàm xử lý lưu dữ liệu
    public function store(Request $request) {
        // 1. Validate dữ liệu đầu vào
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000', // Ở form tên là 'content'
        ], [
            'rating.required' => 'Vui lòng chọn số sao đánh giá.',
            'content.required' => 'Vui lòng nhập nội dung góp ý.',
        ]);

        // 2. Lưu vào Database
        Feedback::create([
            // Nếu bảng của bạn CÓ cột user_id thì mở dòng dưới ra:
            // 'user_id' => Auth::id(), 
            
            'rating' => $request->rating,
            
            // Ánh xạ: Form gửi lên 'content' -> Lưu vào cột 'message'
            'message' => $request->content 
        ]);

        // 3. Thông báo và quay lại trang cũ
        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi đánh giá!');
    }
}