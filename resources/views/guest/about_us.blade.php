@extends('layouts.app')

@section('title', 'Về chúng tôi - Real Estate Pro')

@section('content')

<div class="container mx-auto px-4 py-8 max-w-5xl">
    
    <!-- 1. HEADER (Gradient Đỏ) -->
    <div class="bg-gradient-to-r from-bds-red to-[#ff5e57] text-white py-16 px-4 rounded-2xl text-center shadow-xl mb-12">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow-md">🏢 Về Real Estate Pro</h1>
        <p class="text-lg md:text-xl opacity-90 font-medium">Đối tác tin cậy trong hành trình tìm kiếm ngôi nhà mơ ước của bạn</p>
    </div>

    <!-- 2. CÂU CHUYỆN (White Box) -->
    <div class="bg-white p-8 md:p-10 rounded-xl shadow-lg border border-gray-100 mb-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <span class="text-bds-red">📖</span> Câu chuyện của chúng tôi
        </h2>
        <div class="text-gray-600 space-y-4 leading-relaxed text-lg">
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

    <!-- 3. THỐNG KÊ (Stats Cards - Đỏ nổi bật) -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
        <div class="bg-gradient-to-br from-bds-red to-[#ff5e57] text-white p-6 rounded-xl text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
            <div class="text-3xl md:text-4xl font-bold mb-1">10k+</div>
            <div class="text-sm md:text-base opacity-90">Bất động sản</div>
        </div>
        <div class="bg-gradient-to-br from-bds-red to-[#ff5e57] text-white p-6 rounded-xl text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
            <div class="text-3xl md:text-4xl font-bold mb-1">5k+</div>
            <div class="text-sm md:text-base opacity-90">Khách hàng</div>
        </div>
        <div class="bg-gradient-to-br from-bds-red to-[#ff5e57] text-white p-6 rounded-xl text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
            <div class="text-3xl md:text-4xl font-bold mb-1">50+</div>
            <div class="text-sm md:text-base opacity-90">Chuyên viên</div>
        </div>
        <div class="bg-gradient-to-br from-bds-red to-[#ff5e57] text-white p-6 rounded-xl text-center shadow-lg transform hover:-translate-y-1 transition duration-300">
            <div class="text-3xl md:text-4xl font-bold mb-1">10+</div>
            <div class="text-sm md:text-base opacity-90">Năm kinh nghiệm</div>
        </div>
    </div>

    <!-- 4. TẠI SAO CHỌN CHÚNG TÔI (Grid Features) -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
            <span class="text-bds-red">✨</span> Tại sao chọn chúng tôi?
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">🔍</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">Tìm kiếm dễ dàng</h3>
                <p class="text-gray-500">Hệ thống lọc thông minh giúp bạn tìm được BDS phù hợp nhanh chóng</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">✅</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">Thông tin chính xác</h3>
                <p class="text-gray-500">Tất cả thông tin được xác minh và cập nhật liên tục hàng ngày</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">💼</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">Tư vấn chuyên nghiệp</h3>
                <p class="text-gray-500">Đội ngũ chuyên viên giàu kinh nghiệm luôn sẵn sàng hỗ trợ bạn</p>
            </div>
            <!-- Card 4 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">🔒</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">An toàn & Bảo mật</h3>
                <p class="text-gray-500">Thông tin cá nhân và giao dịch được bảo mật tuyệt đối</p>
            </div>
            <!-- Card 5 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">⚡</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">Giao dịch nhanh</h3>
                <p class="text-gray-500">Quy trình đơn giản, thủ tục nhanh gọn, tiết kiệm thời gian</p>
            </div>
            <!-- Card 6 -->
            <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-md hover:shadow-xl transition duration-300 text-center group">
                <div class="text-4xl mb-4 transform group-hover:scale-110 transition">🎯</div>
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-bds-red transition">Giá cả hợp lý</h3>
                <p class="text-gray-500">Cam kết mang đến mức giá tốt nhất thị trường cho khách hàng</p>
            </div>
        </div>
    </div>

    <!-- 5. SỨ MỆNH (White Box) -->
    <div class="bg-white p-8 md:p-10 rounded-xl shadow-lg border-l-4 border-bds-red">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <span class="text-bds-red">🎯</span> Sứ mệnh của chúng tôi
        </h2>
        <div class="text-gray-600 space-y-4 leading-relaxed text-lg">
            <p>
                Chúng tôi tin rằng mọi người đều xứng đáng có một ngôi nhà tuyệt vời. 
                Sứ mệnh của Real Estate Pro là làm cho việc tìm kiếm và sở hữu bất động sản 
                trở nên dễ dàng, minh bạch và đáng tin cậy hơn bao giờ hết.
            </p>
            <p>
                Chúng tôi không ngừng cải tiến dịch vụ, áp dụng công nghệ mới nhất để mang đến 
                trải nghiệm tốt nhất cho khách hàng. Sự hài lòng của bạn chính là thành công của chúng tôi.
            </p>
        </div>
    </div>
</div>

@endsection