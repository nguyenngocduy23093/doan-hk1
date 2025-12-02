<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Hiển thị trang About Us
     */
    public function index()
    {
        return view('guest.about_us');
    }
}
