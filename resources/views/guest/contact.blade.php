@extends('layouts.app')

@section('title', 'Liên hệ - Real Estate Pro')

@section('content')

<div class="container mx-auto px-4 py-8 max-w-5xl">
    
    <!-- 1. HEADER (Gradient Đỏ) -->
    <div class="bg-gradient-to-r from-bds-red to-[#ff5e57] text-white py-12 px-4 rounded-2xl text-center shadow-xl mb-12">
        <h1 class="text-3xl md:text-4xl font-bold mb-3 flex justify-center items-center gap-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            Liên hệ với chúng tôi
        </h1>
        <p class="text-lg opacity-90">Chúng tôi luôn sẵn sàng hỗ trợ bạn tìm được ngôi nhà mơ ước</p>
    </div>

    <!-- 2. THÔNG TIN LIÊN HỆ (Grid Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Địa chỉ -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
            <div class="w-16 h-16 bg-red-100 text-bds-red rounded-full flex items-center justify-center mx-auto mb-4 text-3xl group-hover:bg-bds-red group-hover:text-white transition">
                📍
            </div>
            <h3 class="font-bold text-gray-800 text-lg mb-2">Địa chỉ</h3>
            <p class="text-gray-600">123 Đường ABC, Quận 1<br>TP. Hồ Chí Minh</p>
        </div>

        <!-- Email -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
            <div class="w-16 h-16 bg-red-100 text-bds-red rounded-full flex items-center justify-center mx-auto mb-4 text-3xl group-hover:bg-bds-red group-hover:text-white transition">
                📧
            </div>
            <h3 class="font-bold text-gray-800 text-lg mb-2">Email</h3>
            <p class="text-gray-600">info@realestatepro.com<br>support@realestatepro.com</p>
        </div>

        <!-- Điện thoại -->
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100 text-center hover:shadow-lg transition group">
            <div class="w-16 h-16 bg-red-100 text-bds-red rounded-full flex items-center justify-center mx-auto mb-4 text-3xl group-hover:bg-bds-red group-hover:text-white transition">
                📱
            </div>
            <h3 class="font-bold text-gray-800 text-lg mb-2">Điện thoại</h3>
            <p class="text-gray-600 font-semibold">+84 123 456 789<br>+84 987 654 321</p>
        </div>
    </div>

    <!-- 3. FORM LIÊN HỆ -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-white p-8 rounded-xl shadow-lg border-t-4 border-bds-red">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">✉️ Gửi tin nhắn cho chúng tôi</h2>
            
            <form action="{{ route('inquiry.send') }}" method="POST">
                @csrf
                
                @if(!session('user_verified'))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <!-- Họ tên -->
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Họ và tên <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               placeholder="Nhập họ tên của bạn"
                               class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red transition">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               placeholder="example@email.com"
                               class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red transition">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <!-- Tiêu đề -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Tiêu đề <span class="text-red-500">*</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required
                           placeholder="Tiêu đề tin nhắn"
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red transition">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nội dung -->
                <div class="mb-6">
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Nội dung <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="5" required
                              placeholder="Nhập nội dung tin nhắn của bạn..."
                              class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red transition resize-none">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-bds-red hover:bg-[#c4261d] text-white font-bold py-3 px-6 rounded shadow-md transition duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Gửi tin nhắn
                </button>
            </form>
        </div>
    </div>
</div>

@endsection