<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller
{
    public function index() // trang đăng nhập
    {
        return view('guest.login');
    }

    public function checking(Request $request)
    {
        $data = $request->post();

        $validated = $request->validate([
        'email' => 'required',
        'password'      => 'required',
        ]);
        
        // Detect if input is email or username
        $input = $validated['email'];

        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return redirect('login')->withErrors([
                'email' => 'Sai email',
            ]);
        }

        $user = Users::where('email', $input)->first();


        // Check if user exists and validate password
        if (!$user || !password_verify($data['password'], $user->password)) {
            return redirect('login')->withErrors([
                'password' => 'Sai mật khẩu hoặc email ko tồn tại',
            ]);
        }

        // Save user session
        $request->session()->put('user_verified', true);
        $request->session()->put('user_id', $user->user_id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_email', $user->email);

        return redirect('/')->with('success', 'Đăng nhập thành công');
    }   
}
