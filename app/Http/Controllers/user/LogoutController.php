<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        $request->session()->forget('user_verified');
        $request->session()->forget('user_id');
        $request->session()->forget('user_name');
        $request->session()->forget('user_email');
        return redirect('/');
    }
}
