@extends('layouts.app')

@section('title', 'Về chúng tôi - Real Estate Pro')

@section('content')

{{-- 
    =========================================
    1. HEADER BANNER
    =========================================
--}}
<div class="relative w-full py-20 md:py-28 mb-16 -mt-6 group">
    {{-- Ảnh nền --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105"
         style="background-image: url('https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    </div>
    
    {{-- Overlay Gradient Đỏ --}}
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 via-red-700/85 to-red-500/70 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/20"></div>

    {{-- Nội dung Header --}}
    <div class="relative container mx-auto px-4 text-center text-white">
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 drop-shadow-xl tracking-tight">
            🏢 Về Real Estate Pro
        </h1>
        <p class="text-red-50 text-lg md:text-2xl font-medium max-w-3xl mx-auto opacity-95 leading-relaxed drop-shadow-md">
            Đối tác tin cậy trong hành trình tìm kiếm ngôi nhà mơ ước của bạn
        </p>
    </div>
</div>

<div class="container mx-auto px-4 pb-20 max-w-6xl">

    {{-- 
        =========================================
        2. CÂU CHUYỆN (Story Section)
        =========================================
    --}}
    <div class="bg-white rounded-3xl shadow-xl p-8 md:p-12 mb-16 border border-gray-100 relative overflow-hidden">
        {{-- Icon nền trang trí --}}
        <div class="absolute -right-10 -top-10 text-gray-50 opacity-50 pointer-events-none">
            <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 24 24"><path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>
        </div>

        <div class="relative z-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="bg-red-100 p-2 rounded-lg text-2xl">📖</span> 
                Câu chuyện của chúng tôi
            </h2>
            <div class="text-gray-600 space-y-6 leading-relaxed text-lg text-justify">
                <p>
                    Real Estate Pro được thành lập với sứ mệnh giúp mọi người tìm được ngôi nhà hoàn hảo. 
                    Chúng tôi hiểu rằng việc mua hoặc thuê nhà là một quyết định quan trọng trong cuộc đời, 
                    và chúng tôi cam kết đồng hành cùng bạn trong suốt hành trình đó.
                </p>
                <p>
                    Với đội ngũ chuyên viên tư vấn giàu kinh nghiệm và hệ thống công nghệ hiện đại, 
                    chúng tôi mang đến cho khách hàng trải nghiệm tìm kiếm bất động sản dễ dàng, 
                    nhanh chóng và đáng tin cậy nhất.
                </p>
            </div>
        </div>
    </div>

    {{-- 
        =========================================
        3. THỐNG KÊ (Stats Section - Đã Fix màu số)
        =========================================
    --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20">
        <!-- Card 1 -->
        <div class="bg-white p-8 rounded-3xl text-center shadow-lg border border-gray-100 hover:shadow-red-200/50 transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-center h-48">
            <div class="text-4xl md:text-5xl font-extrabold text-red-600 mb-2 group-hover:scale-110 transition-transform">10k+</div>
            <div class="text-gray-600 font-bold text-sm md:text-base uppercase tracking-wider">Bất động sản</div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-8 rounded-3xl text-center shadow-lg border border-gray-100 hover:shadow-red-200/50 transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-center h-48">
            <div class="text-4xl md:text-5xl font-extrabold text-red-600 mb-2 group-hover:scale-110 transition-transform">5k+</div>
            <div class="text-gray-600 font-bold text-sm md:text-base uppercase tracking-wider">Khách hàng</div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-8 rounded-3xl text-center shadow-lg border border-gray-100 hover:shadow-red-200/50 transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-center h-48">
            <div class="text-4xl md:text-5xl font-extrabold text-red-600 mb-2 group-hover:scale-110 transition-transform">50+</div>
            <div class="text-gray-600 font-bold text-sm md:text-base uppercase tracking-wider">Chuyên viên</div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-8 rounded-3xl text-center shadow-lg border border-gray-100 hover:shadow-red-200/50 transform hover:-translate-y-2 transition duration-300 group flex flex-col justify-center h-48">
            <div class="text-4xl md:text-5xl font-extrabold text-red-600 mb-2 group-hover:scale-110 transition-transform">10+</div>
            <div class="text-gray-600 font-bold text-sm md:text-base uppercase tracking-wider">Năm kinh nghiệm</div>
        </div>
    </div>

    {{-- 
        =========================================
        4. TẠI SAO CHỌN CHÚNG TÔI (Features Grid)
        =========================================
    --}}
    <div class="mb-20">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
            <span class="text-yellow-500">✨</span> Tại sao chọn chúng tôi?
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">🔍</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">Tìm kiếm dễ dàng</h3>
                <p class="text-gray-500">Hệ thống lọc thông minh giúp bạn tìm được BDS phù hợp nhanh chóng</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">✅</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">Thông tin chính xác</h3>
                <p class="text-gray-500">Tất cả thông tin được xác minh và cập nhật liên tục hàng ngày</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">💼</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">Tư vấn chuyên nghiệp</h3>
                <p class="text-gray-500">Đội ngũ chuyên viên giàu kinh nghiệm luôn sẵn sàng hỗ trợ bạn</p>
            </div>
            <!-- Card 4 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">🔒</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">An toàn & Bảo mật</h3>
                <p class="text-gray-500">Thông tin cá nhân và giao dịch được bảo mật tuyệt đối</p>
            </div>
            <!-- Card 5 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">⚡</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">Giao dịch nhanh</h3>
                <p class="text-gray-500">Quy trình đơn giản, thủ tục nhanh gọn, tiết kiệm thời gian</p>
            </div>
            <!-- Card 6 -->
            <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl transition duration-300 text-center group">
                <div class="text-5xl mb-6 transform group-hover:scale-110 transition duration-300">🎯</div>
                <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-red-600 transition">Giá cả hợp lý</h3>
                <p class="text-gray-500">Cam kết mang đến mức giá tốt nhất thị trường cho khách hàng</p>
            </div>
        </div>
    </div>

    {{-- 
        =========================================
        5. SỨ MỆNH (Mission Section)
        =========================================
    --}}
    <div class="bg-red-50 rounded-3xl p-8 md:p-16 border-l-8 border-red-600 shadow-lg relative overflow-hidden">
        <div class="relative z-10">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 flex items-center gap-3">
                <span class="bg-white p-2 rounded-lg text-2xl shadow-sm">🎯</span> 
                Sứ mệnh của chúng tôi
            </h2>
            <div class="text-gray-700 space-y-6 leading-relaxed text-lg md:text-xl font-light">
                <p>
                    Chúng tôi tin rằng mọi người đều xứng đáng có một ngôi nhà tuyệt vời. 
                    Sứ mệnh của Real Estate Pro là làm cho việc tìm kiếm và sở hữu bất động sản 
                    trở nên <span class="font-bold text-red-600">dễ dàng</span>, <span class="font-bold text-red-600">minh bạch</span> và <span class="font-bold text-red-600">đáng tin cậy</span> hơn bao giờ hết.
                </p>
                <p>
                    Chúng tôi không ngừng cải tiến dịch vụ, áp dụng công nghệ mới nhất để mang đến 
                    trải nghiệm tốt nhất cho khách hàng. Sự hài lòng của bạn chính là thành công của chúng tôi.
                </p>
            </div>
        </div>
        
        {{-- Trang trí nền --}}
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    </div>
</div>

@endsection