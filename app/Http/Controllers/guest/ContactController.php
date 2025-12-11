<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Inquiries;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Hiển thị trang contact
     */
    public function index()
    {
        return view('guest.contact');
    }

    /**
     * Xử lý gửi form inquiry (liên hệ)
     * 
     * Cách hoạt động:
     * 1. Validate dữ liệu từ form
     * 2. Lưu inquiry vào database
     * 3. Redirect về trang contact với thông báo thành công
     */
    public function sendInquiry(Request $request)
    {
        // Validate dữ liệu đầu vào
        // required = bắt buộc phải nhập
        // string = phải là chuỗi
        // max:255 = tối đa 255 ký tự
        // email = phải đúng định dạng email

        if($request -> session() -> has('user_verified')) {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
                'property_id' => 'nullable|exists:properties,property_id', // nullable = không bắt buộc, exists = phải tồn tại trong bảng properties
            ]);  

            // Tạo inquiry mới trong database
            // create() = tạo record mới và lưu vào database
            Inquiries::create([
                'name' => $request -> session() -> get('user_name'),
                'email' => $request -> session() -> get('user_email'),
                'message' => $validated['message'],
                'property_id' => $validated['property_id'] ?? null, // ?? null = nếu không có thì để null
                'created_at' => now(), // Thời gian hiện tại
            ]);
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'title' => 'required|string|max:255',
                'message' => 'required|string|max:1000',
                'property_id' => 'nullable|exists:properties,property_id', // nullable = không bắt buộc, exists = phải tồn tại trong bảng properties
            ]);  

            // Tạo inquiry mới trong database
            // create() = tạo record mới và lưu vào database
            Inquiries::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'title' => $validated['title'],
                'message' => $validated['message'],
                'property_id' => $validated['property_id'] ?? null, // ?? null = nếu không có thì để null
                'created_at' => now(), // Thời gian hiện tại
            ]);              
        }

        // Redirect về trang contact với thông báo thành công
        // with('success', ...) = flash message, hiển thị 1 lần rồi mất
        return redirect()->route('contact')->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi sớm nhất.');
    }
}
