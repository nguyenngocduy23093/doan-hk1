@extends('layouts.app')

@section('title', 'Trang chủ - Real Estate Pro')

@section('content')
<style>
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 0;
        text-align: center;
        border-radius: 10px;
        margin: 2rem 0;
    }
    .hero h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    .search-box {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        margin-top: 2rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .search-form {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    .search-form input, .search-form select {
        flex: 1;
        min-width: 200px;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }
    .btn {
        padding: 0.8rem 2rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s;
    }
    .btn-primary {
        background: #3498db;
        color: white;
    }
    .btn-primary:hover {
        background: #2980b9;
    }
    .section-title {
        font-size: 2rem;
        margin: 3rem 0 1.5rem;
        color: #2c3e50;
    }
    .property-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    .property-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }
    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    }
    .property-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .property-info {
        padding: 1.5rem;
    }
    .property-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #2c3e50;
    }
    .property-price {
        color: #e74c3c;
        font-size: 1.3rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }
    .property-location {
        color: #7f8c8d;
        margin-bottom: 0.5rem;
    }
    .property-details {
        display: flex;
        gap: 1rem;
        color: #7f8c8d;
        font-size: 0.9rem;
    }
    .view-all {
        text-align: center;
        margin: 2rem 0;
    }
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 1.8rem;
        }
        .search-form {
            flex-direction: column;
        }
        .property-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero">
    <h1>Tìm ngôi nhà mơ ước của bạn</h1>
    <p>Hàng ngàn bất động sản chất lượng đang chờ bạn khám phá</p>
    
    <!-- Search Box -->
    <div class="search-box">
        <form action="{{ route('search') }}" method="GET" class="search-form">
            <input type="text" name="keyword" placeholder="Tìm kiếm theo tên hoặc địa điểm...">
            <select name="category">
                <option value="">Tất cả danh mục</option>
                <option value="buy">Mua</option>
                <option value="rent">Thuê</option>
                <option value="featured">Nổi bật</option>
            </select>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>
    </div>
</div>

<!-- Featured Properties -->
@if($featuredProperties->count() > 0)
<h2 class="section-title">🌟 Bất động sản nổi bật</h2>
<div class="property-grid">
    @foreach($featuredProperties as $property)
    <a href="{{ route('property.detail', $property->property_id) }}" style="text-decoration: none; color: inherit;">
        <div class="property-card">
            <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                 alt="{{ $property->title }}" 
                 class="property-image">
            <div class="property-info">
                <div class="property-title">{{ $property->title }}</div>
                <div class="property-price">{{ number_format($property->price) }} VNĐ</div>
                <div class="property-location">📍 {{ $property->location }}</div>
                <div class="property-details">
                    <span>🛏️ {{ $property->bedrooms }} PN</span>
                    <span>🚿 {{ $property->bathrooms }} PT</span>
                    <span>📐 {{ $property->area }} m²</span>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="view-all">
    <a href="{{ route('featured') }}" class="btn btn-primary">Xem tất cả nổi bật</a>
</div>
@endif

<!-- Properties for Rent -->
@if($rentProperties->count() > 0)
<h2 class="section-title">🏠 Bất động sản cho thuê</h2>
<div class="property-grid">
    @foreach($rentProperties as $property)
    <a href="{{ route('property.detail', $property->property_id) }}" style="text-decoration: none; color: inherit;">
        <div class="property-card">
            <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                 alt="{{ $property->title }}" 
                 class="property-image">
            <div class="property-info">
                <div class="property-title">{{ $property->title }}</div>
                <div class="property-price">{{ number_format($property->price) }} VNĐ/tháng</div>
                <div class="property-location">📍 {{ $property->location }}</div>
                <div class="property-details">
                    <span>🛏️ {{ $property->bedrooms }} PN</span>
                    <span>🚿 {{ $property->bathrooms }} PT</span>
                    <span>📐 {{ $property->area }} m²</span>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="view-all">
    <a href="{{ route('rent') }}" class="btn btn-primary">Xem tất cả cho thuê</a>
</div>
@endif

<!-- Properties for Sale -->
@if($buyProperties->count() > 0)
<h2 class="section-title">🏡 Bất động sản bán</h2>
<div class="property-grid">
    @foreach($buyProperties as $property)
    <a href="{{ route('property.detail', $property->property_id) }}" style="text-decoration: none; color: inherit;">
        <div class="property-card">
            <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                 alt="{{ $property->title }}" 
                 class="property-image">
            <div class="property-info">
                <div class="property-title">{{ $property->title }}</div>
                <div class="property-price">{{ number_format($property->price) }} VNĐ</div>
                <div class="property-location">📍 {{ $property->location }}</div>
                <div class="property-details">
                    <span>🛏️ {{ $property->bedrooms }} PN</span>
                    <span>🚿 {{ $property->bathrooms }} PT</span>
                    <span>📐 {{ $property->area }} m²</span>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="view-all">
    <a href="{{ route('buy') }}" class="btn btn-primary">Xem tất cả bán</a>
</div>
@endif

@endsection