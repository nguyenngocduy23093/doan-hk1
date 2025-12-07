@extends('layouts.app')

@section('title', 'Gửi Feedback - Real Estate Pro')

@section('content')
<div class="max-w-2xl mx-auto mt-10">

    <div class="bg-white p-8 shadow rounded-xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            💬 Gửi ý kiến đóng góp
        </h2>

        {{-- Hiển thị thông báo thành công nếu có --}}
        @if(session('success'))
            <div class="p-4 mb-4 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Tiêu đề --}}
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Tiêu đề</label>
                <input 
                    type="text" 
                    name="title"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                    placeholder="Ví dụ: Giao diện web bị lỗi..."
                    required
                >
            </div>

            {{-- Nội dung --}}
            <div>
                <label class="block mb-1 text-gray-700 font-medium">Nội dung chi tiết</label>
                <textarea 
                    name="content" 
                    rows="5"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                    placeholder="Mô tả chi tiết vấn đề hoặc ý kiến của bạn..."
                    required
                ></textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center gap-4">
                <button 
                    type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow transition">
                    Gửi Feedback
                </button>
                
                <a href="/settings" class="text-gray-600 hover:text-gray-800 font-medium">
                    Quay lại
                </a>
            </div>
        </form>
    </div>
</div>
@endsection