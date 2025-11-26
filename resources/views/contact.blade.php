<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - RealEstatePro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">RealEstatePro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Trang chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Mua nhà</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Thuê nhà</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('contact') }}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="bg-light py-5 text-center">
        <div class="container">
            <h1 class="display-5 fw-bold">Liên Hệ Với Chúng Tôi</h1>
            <p class="lead text-muted">Chúng tôi luôn sẵn sàng hỗ trợ bạn tìm kiếm ngôi nhà mơ ước.</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5">
            
            <div class="col-md-5">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Thông tin văn phòng</h3>
                        
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 text-primary">
                                <i class="bi bi-geo-alt-fill fs-3"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="fw-bold">Địa chỉ văn phòng</h5>
                                <p class="text-muted mb-0">
                                    Tòa nhà RealEstatePro, 123 Đường Nguyễn Văn Linh,<br>
                                    Quận 7, TP. Hồ Chí Minh, Việt Nam.
                                </p>
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0 text-primary">
                                <i class="bi bi-envelope-fill fs-3"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="fw-bold">Email hỗ trợ</h5>
                                <p class="text-muted mb-0">support@realestatepro.vn</p>
                                <p class="text-muted">sales@realestatepro.vn</p>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="flex-shrink-0 text-primary">
                                <i class="bi bi-telephone-fill fs-3"></i>
                            </div>
                            <div class="ms-3">
                                <h5 class="fw-bold">Hotline</h5>
                                <p class="text-muted mb-0">1900 123 456</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-2">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6696584237106!2d106.6648800746587!3d10.75992005949576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f9023a3a85d%3A0x96d9b7990f669215!2sHo%20Chi%20Minh%20City!5e0!3m2!1sen!2s!4v1700000000000!5m2!1sen!2s" 
                            width="100%" 
                            height="450" 
                            style="border:0; border-radius: 8px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 RealEstatePro. Đồ án môn học.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>