<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    // Hàm hiện form
    public function indexFeedback() {
        return view('user.settings', ['active_tab' => 'feedback']); 
    }

    // Hàm gửi feedback
    public function sendFeedback(Request $request) {
        $request->validate(['message' => 'required|min:10'], ['message.required' => 'Nhập nội dung đi ông ơi!']);
        
        Feedback::create([
            'user_id' => Auth::id(),
            'message' => $request->message
        ]);

        return redirect()->back()->with('success', 'Gửi feedback thành công!');
    }
    // Trang cài đặt chung (Đổi tên, avatar...)
    public function index()
    {
        return view('user.settings');
    }

    // Xử lý cập nhật thông tin cá nhân (Tên)
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }

    // --- PHẦN ĐỔI MẬT KHẨU ---

    // 1. Hiển thị form đổi mật khẩu
    public function changePassword()
    {
        // Đảm bảo file này nằm đúng tại: resources/views/user/change_password.blade.php
        return view('user.change_password'); 
    }

    // 2. Xử lý đổi mật khẩu (Code đã Fix hoàn chỉnh)
    public function updatePassword(Request $request)
    {
        // BƯỚC 1: Validate dữ liệu đầu vào
        // Kiểm tra xem người dùng có nhập đủ và đúng định dạng không
        $request->validate([
            'old_password' => 'required', // Bắt buộc phải có input name="old_password"
            'new_password' => 'required|string|min:6|confirmed', // Bắt buộc có input name="new_password"
        ], [
            'old_password.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'new_password.required' => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 6 ký tự.',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);

        // BƯỚC 2: Kiểm tra mật khẩu cũ có đúng với Database không
        $currentUser = Auth::user();
        
        if (!Hash::check($request->old_password, $currentUser->password)) {
            // Nếu sai pass cũ -> Quay lại và báo lỗi đỏ ngay ô nhập cũ
            return back()->withErrors(['old_password' => 'Mật khẩu hiện tại không chính xác.']);
        }

        // BƯỚC 3: Lưu mật khẩu mới
        // Dùng cách gán trực tiếp này để tránh lỗi $fillable trong Model
        $currentUser->password = Hash::make($request->new_password);
        $currentUser->save();

        // BƯỚC 4: Thông báo thành công
        return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
    }
}