<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;

class PropertyController extends Controller
{
    // Hàm hiển thị trang chủ (Bạn đã có)
    public function index()
    {
        $properties = Properties::all();
        return view('welcome', compact('properties'));
    }

    // --- ĐÂY LÀ ĐOẠN BẠN ĐANG THIẾU ---
    // Hàm hiển thị trang liên hệ
    public function contact()
    {
        return view('contact');
    }
}