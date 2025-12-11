<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Hiển thị trang login
    public function login()
    {
        return view('admin.login');
    }

    // Xử lý đăng nhập
    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {

            if (auth()->user()->role === 'admin') {

                return redirect()->route('admin.dashboard')
                    ->with('success', 'Đăng nhập thành công!');
            }

            Auth::logout();
            return back()->with('error', 'Tài khoản này không có quyền truy cập admin!');
        }

        return back()->with('error', 'Sai email hoặc mật khẩu!');
    }

    // Trang dashboard
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login')->with('success', 'Đã đăng xuất thành công!');
    }
}
