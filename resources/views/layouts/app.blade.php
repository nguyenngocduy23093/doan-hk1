<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstatePro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'bds-red': '#E03C31', // Màu đỏ đặc trưng
                        'bds-dark': '#1D2B3A' // Màu footer cũ
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
<body class="bg-gray-50">

    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 h-20 flex items-center justify-between">
            <a href="/" class="text-3xl font-bold text-bds-red">
                RealEstatePro
            </a>

            <nav class="hidden lg:flex gap-8 font-medium text-gray-700">
                <a href="/" class="hover:text-bds-red transition">Trang chủ</a>
                <a href="#" class="hover:text-bds-red transition">Mua</a>
                <a href="#" class="hover:text-bds-red transition">Thuê</a>
                <a href="#" class="hover:text-bds-red transition">Nổi bật</a>
                <a href="#" class="hover:text-bds-red transition">Tìm kiếm</a>
                <a href="#" class="hover:text-bds-red transition">Về chúng tôi</a>
                <a href="#" class="hover:text-bds-red transition">Liên hệ</a>
            </nav>

            <div class="flex items-center gap-4 font-medium text-gray-700">
                <a href="#" class="hover:text-bds-red transition">Đăng ký</a>
                <span class="text-gray-300">|</span>
                <a href="#" class="hover:text-bds-red transition">Đăng nhập</a>
            </div>
        </div>
    </header>

    <section class="bg-gradient-to-r from-bds-red to-[#FF6B6B] py-28 flex flex-col items-center justify-center text-center px-4">
        <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">Tìm ngôi nhà mơ ước của bạn</h1>
        <p class="text-white text-lg md:text-xl mb-10 opacity-90">Hàng ngàn bất động sản chất lượng đang chờ bạn khám phá</p>

        <div class="bg-white p-4 md:p-6 rounded-xl shadow-2xl w-full max-w-5xl">
            <form action="#" class="flex flex-col md:flex-row gap-4">
                <input type="text" placeholder="Nhập từ khóa..." class="flex-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-bds-red text-gray-800 placeholder-gray-400">
                
                <input type="text" placeholder="Chọn khu vực..." class="flex-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-bds-red text-gray-800 placeholder-gray-400">
                
                <button type="submit" class="bg-bds-red hover:bg-[#c4261d] text-white font-bold px-8 py-3 rounded-md transition whitespace-nowrap">
                    Tìm kiếm
                </button>
            </form>
        </div>
    </section>

    <footer class="bg-bds-dark text-white text-center py-6 mt-auto">
        <p>© 2025 RealEstatePro. All rights reserved.</p>
    </footer>

</body>
</html>