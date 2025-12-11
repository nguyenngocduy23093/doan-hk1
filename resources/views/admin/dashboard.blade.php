@extends('admin.layout')
@section('title', 'Bảng điều khiển Bất Động Sản')

@section('content')

<style>
    .stat-card {
        border-radius: 14px;
        padding: 22px;
        background: linear-gradient(145deg, #ffffff, #f3f3f3);
        box-shadow: 3px 3px 12px rgba(0,0,0,0.12);
        transition: 0.25s ease-in-out;
    }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 6px 6px 16px rgba(0,0,0,0.18);
    }

    .icon-box {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(255,255,255,0.7);
        font-size: 20px;
        font-weight: bold;
    }

    .quick-btn {
        padding: 12px 18px;
        border-radius: 10px;
        font-weight: 500;
        transition: 0.2s;
    }

    .quick-btn i {
        font-size: 18px;
    }

    .quick-btn:hover {
        opacity: 0.9;
        transform: scale(1.04);
    }

    .section-title {
        font-weight: 700;
        letter-spacing: 0.3px;
    }

</style>

<div class="container-fluid">

    {{-- Greeting Section --}}
    <div class="d-flex justify-content-between align-items-center p-3 mb-4 bg-white shadow-sm rounded">
        <div>
            <h2 class="fw-bold mb-1">👋 Xin chào, {{ auth()->user()->name ?? 'Admin' }} </h2>
            <small class="text-muted">Chúc bạn một ngày làm việc hiệu quả!</small>
        </div>
        <a href="{{ url('/admin/logout') }}" class="btn btn-outline-danger px-4">Đăng xuất</a>
    </div>

    {{-- Statistics --}}
    <div class="row g-4">

        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted m-0">Tin đăng</h6>
                    <div class="icon-box text-primary">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                </div>
                <p class="fs-2 fw-extrabold text-primary mb-0">
                    {{ $totalListings ?? 0 }}
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted m-0">Khách hàng</h6>
                    <div class="icon-box text-success">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
                <p class="fs-2 fw-extrabold text-success mb-0">
                    {{ $totalCustomers ?? 0 }}
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted m-0">Dự án</h6>
                    <div class="icon-box text-warning">
                        <i class="bi bi-building"></i>
                    </div>
                </div>
                <p class="fs-2 fw-extrabold text-warning mb-0">
                    {{ $totalProjects ?? 0 }}
                </p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="text-muted m-0">Giao dịch thành công</h6>
                    <div class="icon-box text-danger">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
                <p class="fs-2 fw-extrabold text-danger mb-0">
                    {{ $successfulDeals ?? 0 }}
                </p>
            </div>
        </div>

    </div>

    <hr class="my-4">

    {{-- Quick Actions --}}
    <div>
        <h4 class="section-title mb-3">🚀 Chức năng nhanh</h4>

        <div class="d-flex flex-wrap gap-3">

            <a href="{{ url('/admin/listings') }}" class="btn btn-primary quick-btn">
                <i class="bi bi-journal-text me-1"></i> Tin đăng
            </a>

            <a href="{{ url('/admin/projects') }}" class="btn btn-success quick-btn">
                <i class="bi bi-building me-1"></i> Dự án
            </a>

            <a href="{{ url('/admin/customers') }}" class="btn btn-warning text-dark quick-btn">
                <i class="bi bi-person-lines-fill me-1"></i> Khách hàng
            </a>

            <a href="{{ url('/admin/transactions') }}" class="btn btn-danger quick-btn">
                <i class="bi bi-cash me-1"></i> Giao dịch
            </a>

            <a href="{{ url('/admin/reports') }}" class="btn btn-secondary quick-btn">
                <i class="bi bi-bar-chart me-1"></i> Báo cáo
            </a>

        </div>
    </div>

</div>
@endsection
