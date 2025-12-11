<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;            
use App\Models\Feedback;
use App\Models\Inquiry;
use App\Models\Properties;
use App\Models\Inquiries;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Đếm số user
        $totalUsers = User::count();

        // Đếm số property
        $totalProperties = Properties::count();

        // Đếm feedback
        $totalFeedback = Feedback::count();

        // Đếm inquiry
        $totalInquiry = Inquiries::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProperties',
            'totalFeedback',
            'totalInquiry'
        ));
    }
}
