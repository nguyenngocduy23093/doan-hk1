<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        // Log out the user using Laravel's Auth system
        Auth::logout();

        // Clear the session data (optional, since logout clears session automatically)
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage or another route
        return redirect('/');
    }
}