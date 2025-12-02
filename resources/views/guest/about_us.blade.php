@extends('layouts.app')

@section('title', 'Về chúng tôi - Real Estate Pro')

@section('content')
<style>
    .about-page {
        max-width: 1000px;
        margin: 2rem auto;
    }
    .about-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 2rem;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 3rem;
    }
    .about-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    .about-section {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .about-section h2 {
        color: #2c3e50;
        margin-bottom: 1rem;
        font-size: 1.8rem;
    }
    .about-section p {
        color: #555;
        line-height: 1.8;
        margin-bottom: 1rem;
    }
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    .feature-card {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
        transition: transform 0.3s;
    }
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .feature-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .feature-card h3 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    .feature-card p {
        color: #7f8c8d;
        font-size: 0.95rem;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
    }
    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        text-align: center;
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .stat-label {
        font-size: 1rem;
        opacity: 0.9;
    }
</style>

<div class="about-page">
    <!-- Header -->
    <div class="about-header">
        <h1>🏢 Về Real Estate Pro</h1>
        <p>Đối tác tin cậy trong hành trình tìm kiếm ngôi nhà mơ ước của bạn</p>
    </div>

    <!-- About Section -->
    <div class="about-section">
        <h2>📖 Câu chuyện của chúng tôi</h2>
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

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">10,000+</div>
            <div class="stat-label">Bất động sản</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">5,000+</div>
            <div class="stat-label">Khách hàng hài lòng</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">50+</div>
            <div class="stat-label">Chuyên viên tư vấn</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">10+</div>
            <div class="stat-label">Năm kinh nghiệm</div>
        </div>
    </div>

    <!-- Features -->
    <div class="about-section">
        <h2>✨ Tại sao chọn chúng tôi?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔍</div>
                <h3>Tìm kiếm dễ dàng</h3>
                <p>Hệ thống lọc thông minh giúp bạn tìm được BDS phù hợp nhanh chóng</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✅</div>
                <h3>Thông tin chính xác</h3>
                <p>Tất cả thông tin được xác minh và cập nhật liên tục</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💼</div>
                <h3>Tư vấn chuyên nghiệp</h3>
                <p>Đội ngũ chuyên viên giàu kinh nghiệm luôn sẵn sàng hỗ trợ</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🔒</div>
                <h3>An toàn & Bảo mật</h3>
                <p>Thông tin cá nhân được bảo mật tuyệt đối</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Giao dịch nhanh chóng</h3>
                <p>Quy trình đơn giản, tiết kiệm thời gian</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Giá cả hợp lý</h3>
                <p>Cam kết giá tốt nhất thị trường</p>
            </div>
        </div>
    </div>

    <!-- Mission -->
    <div class="about-section">
        <h2>🎯 Sứ mệnh của chúng tôi</h2>
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

@endsection