<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Real Estate Pro')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bds-red': '#E03C31',
                        'bds-red-hover': '#c4261d',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <header class="bg-white shadow-sm sticky top-0 z-[9999] border-b border-gray-100">
        <div class="container mx-auto px-4 h-20 flex items-center justify-between">
            <nav class="flex items-center w-full justify-between">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-bds-red no-underline flex items-center gap-2">
                    RealEstatePro
                </a>

                <ul class="hidden lg:flex gap-6 text-sm font-medium text-gray-700">
                    <li><a href="{{ route('home') }}" class="hover:text-bds-red transition">Trang chủ</a></li>
                    <li><a href="{{ route('buy') }}" class="hover:text-bds-red transition">Mua</a></li>
                    <li><a href="{{ route('rent') }}" class="hover:text-bds-red transition">Thuê</a></li>
                    <li><a href="{{ route('featured') }}" class="hover:text-bds-red transition">Nổi bật</a></li>
                    <li><a href="{{ route('search') }}" class="hover:text-bds-red transition">Tìm kiếm</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-bds-red transition">Về chúng tôi</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-bds-red transition">Liên hệ</a></li>
                    
                    @if(session('user_verified'))
                        <li class="flex items-center gap-2 border-l pl-4 ml-2">
                            <span class="text-gray-400 font-normal">Chào,</span>
                            <a href="/settings" class="text-bds-red font-bold">{{ session('user_name') }}</a>
                        </li>
                        <li><a href="/logout" class="text-gray-500 hover:text-black">Đăng xuất</a></li>
                    @else
                        <li class="border-l pl-4 ml-2"><a href="{{ route('register') }}" class="hover:text-bds-red">Đăng ký</a></li>
                        <li><a href="/login" class="px-4 py-2 bg-white border border-gray-300 rounded hover:bg-gray-50 transition">Đăng nhập</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    <main class="flex-grow">
        <div class="container mx-auto px-4 mt-4">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">{{ session('error') }}</div>
            @endif
        </div>

        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-200 mt-16">
        <!-- Tìm kiếm theo từ khóa -->
        <div class="bg-gray-50 py-8">
            <div class="container mx-auto px-4">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Tìm kiếm theo từ khóa</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('search') }}?keyword=chung cư" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Bán căn hộ chung cư</a>
                    <a href="{{ route('search') }}?type=villa" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Bán nhà biệt thự, liền kề</a>
                    <a href="{{ route('search') }}?type=house" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Bán nhà mặt phố</a>
                    <a href="{{ route('search') }}?type=land" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Bán đất nền dự án</a>
                    <a href="{{ route('rent') }}" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Cho thuê căn hộ chung cư</a>
                    <a href="{{ route('rent') }}?type=house" class="px-4 py-2 bg-white border border-gray-300 rounded-full text-sm text-gray-700 hover:border-bds-red hover:text-bds-red transition">Cho thuê nhà riêng</a>
                </div>
            </div>
        </div>

        <!-- Main Footer -->
        <div class="bg-gray-800 text-gray-300 py-12">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                    <!-- Cột 1: Logo & Thông tin công ty -->
                    <div>
                        <h3 class="text-2xl font-bold text-white mb-4">RealEstatePro</h3>
                        <p class="text-sm mb-4">Nền tảng bất động sản hàng đầu Việt Nam</p>
                        <div class="space-y-2 text-sm">
                            <p>📍 123 Đường ABC, Quận 1, TP.HCM</p>
                            <p>📞 Hotline: <a href="tel:1900123456" class="text-bds-red hover:underline">1900 123 456</a></p>
                            <p>✉️ Email: <a href="mailto:info@realestatepro.com" class="text-bds-red hover:underline">info@realestatepro.com</a></p>
                        </div>
                    </div>

                    <!-- Cột 2: Hướng dẫn -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Hướng dẫn</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('about') }}" class="hover:text-white transition">Về chúng tôi</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-white transition">Liên hệ</a></li>
                            <li><a href="#" class="hover:text-white transition">Câu hỏi thường gặp</a></li>
                            <li><a href="#" class="hover:text-white transition">Góp ý báo lỗi</a></li>
                            <li><a href="#" class="hover:text-white transition">Sitemap</a></li>
                        </ul>
                    </div>

                    <!-- Cột 3: Quy định -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Quy định</h4>
                        <ul class="space-y-2 text-sm">
                            <li><a href="#" class="hover:text-white transition">Quy định đăng tin</a></li>
                            <li><a href="#" class="hover:text-white transition">Quy chế hoạt động</a></li>
                            <li><a href="#" class="hover:text-white transition">Điều khoản thỏa thuận</a></li>
                            <li><a href="#" class="hover:text-white transition">Chính sách bảo mật</a></li>
                            <li><a href="#" class="hover:text-white transition">Giải quyết khiếu nại</a></li>
                        </ul>
                    </div>

                    <!-- Cột 4: Đăng ký nhận tin -->
                    <div>
                        <h4 class="text-white font-bold mb-4">Đăng ký nhận tin</h4>
                        <p class="text-sm mb-4">Nhận thông tin mới nhất về bất động sản</p>
                        <form class="flex gap-2">
                            <input type="email" placeholder="Nhập email của bạn" class="flex-1 px-3 py-2 rounded text-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-bds-red">
                            <button type="submit" class="bg-bds-red hover:bg-bds-red-hover text-white px-4 py-2 rounded transition">
                                →
                            </button>
                        </form>
                        <div class="mt-6">
                            <p class="text-sm mb-2">Kết nối với chúng tôi</p>
                            <div class="flex gap-3">
                                <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition">f</a>
                                <a href="#" class="w-8 h-8 bg-blue-400 rounded-full flex items-center justify-center hover:bg-blue-500 transition">t</a>
                                <a href="#" class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition">y</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="bg-gray-900 text-gray-400 py-4">
            <div class="container mx-auto px-4 text-center text-sm">
                <p>&copy; 2025 RealEstatePro. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>