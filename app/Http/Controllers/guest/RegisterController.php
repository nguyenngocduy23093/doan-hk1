<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Hiển thị trang đăng ký
    public function index()
    {
        return view('guest.register');
    }

    /**
     * Xử lý tạo tài khoản mới
     * 
     * Cách hoạt động:
     * 1. Validate dữ liệu từ form đăng ký
     * 2. Mã hóa password bằng bcrypt (Hash::make)
     * 3. Tạo user mới trong database
     * 4. Lưu thông tin user vào session (tự động đăng nhập)
     * 5. Redirect về trang chủ
     */
    public function creating(Request $request)
    {
        // Validate dữ liệu đầu vào
        // required = bắt buộc
        // email = phải đúng format email
        // unique:users,email = email chưa tồn tại trong bảng users
        // min:6 = tối thiểu 6 ký tự
        // confirmed = phải có field password_confirmation và giá trị phải giống password
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ], [
            // Custom error messages (thông báo lỗi tùy chỉnh)
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);

        // Tạo user mới trong database  
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            // Hash::make() = mã hóa password bằng bcrypt
            // Bcrypt là thuật toán mã hóa 1 chiều, không thể giải mã ngược lại
            // Khi login, dùng Hash::check() để so sánh password nhập vào với hash trong DB
            'password' => Hash::make($validated['password']),
            'role' => 'user', // Mặc định role là user (không phải admin)
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Lưu thông tin user vào session (tự động đăng nhập sau khi đăng ký)
        // session()->put() = lưu data vào session
        // Session sẽ tồn tại cho đến khi user logout hoặc đóng browser
        $request->session()->put('user_verified', true);
        $request->session()->put('user_id', $user->user_id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_email', $user->email);

        // Redirect về trang chủ với thông báo thành công
        // with('success', ...) = flash message, hiển thị 1 lần
        return redirect('/')->with('success', 'Đăng ký thành công!');
    }
}
