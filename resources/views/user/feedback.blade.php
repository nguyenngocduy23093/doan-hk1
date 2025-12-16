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

        <form action="{{ route('feedback.store') }}" method="POST" class="space-y-6" id="feedbackForm">
            @csrf

            {{-- Đánh giá sao (Thay thế cho Tiêu đề) --}}
            <div>
                <label class="block mb-2 text-gray-700 font-medium">Đánh giá trải nghiệm</label>
                
                <div class="flex items-center gap-1" id="star-container">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" onclick="setRating({{ $i }})" class="focus:outline-none transition transform hover:scale-110">
                            <svg id="star-{{ $i }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-gray-300 cursor-pointer star-icon">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    @endfor
                </div>
                {{-- Input ẩn để lưu giá trị sao gửi lên server --}}
                <input type="hidden" name="rating" id="rating_value" required>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">Vui lòng chọn số sao đánh giá.</p>
                @enderror
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

{{-- Script xử lý hiệu ứng chọn sao --}}
<script>
    function setRating(value) {
        // Cập nhật giá trị vào input ẩn
        document.getElementById('rating_value').value = value;
        
        // Đổi màu các ngôi sao
        for (let i = 1; i <= 5; i++) {
            let star = document.getElementById('star-' + i);
            if (i <= value) {
                // Sao được chọn: Màu vàng
                star.classList.remove('text-gray-300');
                star.classList.add('text-yellow-400');
            } else {
                // Sao không chọn: Màu xám
                star.classList.remove('text-yellow-400');
                star.classList.add('text-gray-300');
            }
        }
    }
</script>
@endsection