@extends('layouts.app')

@section('title', 'Liên hệ - Real Estate Pro')

@section('content')

{{-- 
    =========================================
    1. HEADER BANNER (Giao diện mới)
    =========================================
--}}
<div class="relative w-full py-20 md:py-28 mb-16 -mt-6 group">
    {{-- Ảnh nền --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105"
         style="background-image: url('https://images.unsplash.com/photo-1423666639041-f56000c27a9a?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80');">
    </div>
    
    {{-- Overlay Gradient Đỏ --}}
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 via-red-700/85 to-red-500/70 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/20"></div>

    {{-- Nội dung Header --}}
    <div class="relative container mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-xl tracking-tight flex items-center justify-center gap-3">
            <svg class="w-10 h-10 md:w-14 md:h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Liên hệ với chúng tôi
        </h1>
        <p class="text-red-50 text-lg md:text-2xl font-medium max-w-3xl mx-auto opacity-95 leading-relaxed drop-shadow-md">
            Chúng tôi luôn sẵn sàng hỗ trợ bạn tìm được ngôi nhà mơ ước
        </p>
    </div>
</div>

<div class="container mx-auto px-4 pb-20 max-w-6xl">
    
    {{-- 
        =========================================
        2. THÔNG TIN LIÊN HỆ (Cards Section)
        =========================================
    --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 -mt-24 relative z-10">
        <!-- Địa chỉ -->
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl hover:shadow-red-500/10 transform hover:-translate-y-2 transition duration-300 group">
            <div class="w-20 h-20 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-red-600 group-hover:text-white transition duration-300 shadow-inner">
                📍
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-3">Địa chỉ trụ sở</h3>
            <p class="text-gray-500 font-medium leading-relaxed">123 Đường ABC, Quận 1<br>TP. Hồ Chí Minh</p>
        </div>

        <!-- Email -->
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl hover:shadow-red-500/10 transform hover:-translate-y-2 transition duration-300 group">
            <div class="w-20 h-20 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-red-600 group-hover:text-white transition duration-300 shadow-inner">
                📧
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-3">Email hỗ trợ</h3>
            <p class="text-gray-500 font-medium leading-relaxed">info@realestatepro.com<br>support@realestatepro.com</p>
        </div>

        <!-- Điện thoại -->
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 text-center hover:shadow-2xl hover:shadow-red-500/10 transform hover:-translate-y-2 transition duration-300 group">
            <div class="w-20 h-20 bg-red-50 text-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-4xl group-hover:bg-red-600 group-hover:text-white transition duration-300 shadow-inner">
                📱
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-3">Hotline 24/7</h3>
            <p class="text-red-600 font-bold text-lg leading-relaxed">+84 123 456 789<br>+84 987 654 321</p>
        </div>
    </div>

    {{-- 
        =========================================
        3. FORM LIÊN HỆ (Form Section)
        =========================================
    --}}
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-8 md:p-12 rounded-3xl shadow-2xl border border-gray-100 relative overflow-hidden">
            {{-- Trang trí background form --}}
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-red-600 via-red-500 to-orange-400"></div>
            
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center flex items-center justify-center gap-3">
                <span class="bg-red-100 p-2 rounded-xl">✉️</span> Gửi tin nhắn cho chúng tôi
            </h2>
            
            <form action="{{ route('inquiry.send') }}" method="POST">
                @csrf
                
                @if(!session('user_verified'))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                    <!-- Họ tên -->
                    <div class="relative">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2 ml-1">Họ và tên <span class="text-red-500">*</span></label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               placeholder="Nhập họ tên của bạn"
                               class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-gray-700 font-medium">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="relative">
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2 ml-1">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               placeholder="example@email.com"
                               class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-gray-700 font-medium">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <!-- Nội dung -->
                <div class="mb-8 relative">
                    <label for="message" class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nội dung <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="5" required
                              placeholder="Nhập nội dung tin nhắn của bạn..."
                              class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all resize-none text-gray-700 font-medium">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-1 font-medium flex items-center"><svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button (Đã sửa background thành màu solid) -->
                <button type="submit" class="w-full bg-[#ea2b2b] hover:bg-[#d62525] text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-red-500/40 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    Gửi tin nhắn ngay
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
