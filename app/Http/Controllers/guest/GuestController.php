<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Properties;

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

    public function buy() // trang danh mục cho mua
    {
        return view('guest/categories/buy') -> with([
            'properties' => Properties::where('category', 'buy')->get()
        ]);
    }

    public function rent() // trang danh mục cho thuê
    {
        return view('guest/categories/rent') -> with([
            'properties' => Properties::where('category', 'rent')->get()
        ]);
    }

    public function featured() // trang danh mục nổi bật
    {
        return view('guest/categories/featured') -> with([
            'properties' => Properties::where('category', 'featured')->get()
        ]);
    }
}