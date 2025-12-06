<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Hàm 1: Hiện form
    public function index()
    {
        return view('guest.feedback');
    }

    // Hàm 2: Xử lý gửi (Sửa lại đoạn này, đừng để 2 hàm index)
    public function store(Request $request)
    {
        // Code xử lý đơn giản
        return redirect()->back()->with('success', 'Cảm ơn bạn đã gửi góp ý!');
    }
}