<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Hiển thị trang form đăng ký
     * Route: GET /register
     * 
     * @return \Illuminate\View\View Trả về view auth.register
     */
    public function showRegisterForm()
    {
        // Trả về view trang đăng ký (file: resources/views/auth/register.blade.php)
        return view('auth.register');
    }

    /**
     * Xử lý đăng ký tài khoản (sẽ làm ở task 4.2)
     * Route: POST /register
     * 
     * @param \Illuminate\Http\Request $request Dữ liệu từ form đăng ký
     * @return \Illuminate\Http\RedirectResponse Redirect về trang trước với thông báo
     */
    public function register(Request $request)
    {
        // TODO: Task 4.2 - Validate from server sẽ làm ở đây
        // TODO: Task 4.3 - Bcrypt password và lưu user vào database
        
        // Tạm thời chỉ trả về thông báo thành công
        return back()->with('success', 'Đăng ký thành công!');
    }
}
