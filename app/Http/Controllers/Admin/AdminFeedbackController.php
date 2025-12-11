<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminFeedbackController extends Controller
{
    // Danh sách Feedback
    public function index()
    {
        $feedbacks = Feedback::orderBy('feedback_id', 'desc')->paginate(10);
        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Xem chi tiết
    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedback.show', compact('feedback'));
    }

    // Xóa feedback
    public function destroy($id)
    {
        Feedback::destroy($id);
        return redirect()->route('admin.feedback.index')->with('success','Feedback deleted successfully.');
    }
}
