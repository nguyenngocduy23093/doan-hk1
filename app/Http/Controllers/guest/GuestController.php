<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home() // trang chủ
    {
        return view('guest/home');
    }

    public function about_us() // trang về chúng tôi
    {
        return view('guest/about_us');
    }

    public function contact() // trang liên hệ
    {
        return view('guest/contact');
    }
}