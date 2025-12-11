<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiries;
use Illuminate\Http\Request;

class AdminInquiryController extends Controller
{
    // Danh sách inquiry
    public function index()
    {
        $inquiries = Inquiries::orderBy('inquiry_id', 'DESC')->get();
        return view('admin.inquiries.index', compact('inquiries'));
    }

    // Xem 1 inquiry
    public function show($id)
    {
        $inquiry = Inquiries::findOrFail($id);
        return view('admin.inquiries.show', compact('inquiry'));
    }

    // Xóa inquiry
    public function destroy(Request $request)
    {
        Inquiries::where('inquiry_id', $request->inquiry_id)->delete();
        return redirect()->route('admin.inquiries.index')
                         ->with('success', 'Inquiry deleted successfully!');
    }
}
