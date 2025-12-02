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

    <header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
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

    <footer class="bg-white text-gray-800 border-t border-gray-200 py-8 mt-10">
        <div class="container mx-auto px-4 text-center">
            <p class="font-bold text-lg mb-2 text-bds-red">RealEstatePro</p>
            <p class="text-gray-500 text-sm">&copy; 2025 RealEstatePro. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>