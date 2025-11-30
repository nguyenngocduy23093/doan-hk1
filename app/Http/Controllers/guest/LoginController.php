<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class LoginController extends Controller
{
    public function login() // trang đăng nhập
    {
        return view('guest/login');
    }
}
