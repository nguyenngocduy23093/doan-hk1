<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RealEstatePro - Bất động sản uy tín</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://source.unsplash.com/1600x900/?house');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .property-card img {
            height: 200px;
            object-fit: cover;
        }
        .price-tag {
            color: #d9534f;
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">RealEstatePro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mua nhà</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thuê nhà</a></li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about-us') }}">Về chúng tôi</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero-section">
        <div class="container">
            <h1 class="display-4 fw-bold">Tìm Ngôi Nhà Mơ Ước Của Bạn</h1>
            <p class="lead">Hàng ngàn bất động sản đang chờ bạn khám phá</p>
            
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <form class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Nhập tên dự án, khu vực...">
                        <button class="btn btn-primary" type="button">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <div class="container py-5">
        <h2 class="text-center mb-4">Bất Động Sản Nổi Bật</h2>
        
        <div class="row g-4">
            @foreach($properties as $property)
            <div class="col-md-4">
                <div class="card property-card h-100 shadow-sm">
                    <img src="{{ $property->main_image_url }}" class="card-img-top" alt="{{ $property->title }}">
                    
                    <div class="card-body">
                        <span class="badge bg-{{ $property->category ? 'success' : 'info' }} mb-2">
                            {{ $property->type == 'buy' ? 'Cần Bán' : 'Cho Thuê' }}
                        </span>

                        <h5 class="card-title text-truncate" title="{{ $property->title }}">{{ $property->title }}</h5>
                        <p class="card-text text-muted small"><i class="bi bi-geo-alt"></i> {{ $property->location }}</p>
                        
                        <div class="d-flex justify-content-between mb-3 text-secondary small">
                            <span>🛌 {{ $property->bedrooms }} PN</span>
                            <span>🚿 {{ $property->bathrooms }} WC</span>
                            <span>📐 {{ $property->area }} m²</span>
                        </div>

                        <p class="price-tag mb-0">
                            {{ number_format($property->price) }} VNĐ
                        </p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="#" class="btn btn-outline-primary w-100">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 RealEstatePro.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>