<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class RegisterController extends Controller
{
    public function register() // trang đăng kí
    {
        return view('guest/register');
    }
}
