@extends('layouts.app')

@section('title', 'Tìm kiếm - Real Estate Pro')

@section('content')
<style>
    .search-page {
        margin: 2rem 0;
    }
    .search-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .search-header h1 {
        font-size: 2rem;
        margin-bottom: 1rem;
    }
    .filter-box {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .filter-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1rem;
    }
    .form-group {
        display: flex;
        flex-direction: column;
    }
    .form-group label {
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #2c3e50;
    }
    .form-group input, .form-group select {
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
    .btn-secondary {
        background: #95a5a6;
        color: white;
    }
    .btn-secondary:hover {
        background: #7f8c8d;
    }
    .filter-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }
    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .results-count {
        font-size: 1.2rem;
        color: #2c3e50;
    }
    .sort-box select {
        padding: 0.5rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .property-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
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
    .no-results {
        text-align: center;
        padding: 3rem;
        color: #7f8c8d;
    }
    @media (max-width: 768px) {
        .filter-grid {
            grid-template-columns: 1fr;
        }
        .property-grid {
            grid-template-columns: 1fr;
        }
        .results-header {
            flex-direction: column;
            gap: 1rem;
        }
    }
</style>

<div class="search-page">
    <!-- Search Header -->
    <div class="search-header">
        <h1>🔍 Tìm kiếm bất động sản</h1>
        <p>Sử dụng bộ lọc bên dưới để tìm bất động sản phù hợp</p>
    </div>

    <!-- Filter Box -->
    <div class="filter-box">
        <form action="{{ route('search') }}" method="GET">
            <div class="filter-grid">
                <!-- Keyword -->
                <div class="form-group">
                    <label>Từ khóa</label>
                    <input type="text" name="keyword" value="{{ request('keyword') }}" 
                           placeholder="Tên hoặc địa điểm...">
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="category">
                        <option value="">Tất cả</option>
                        <option value="buy" {{ request('category') == 'buy' ? 'selected' : '' }}>Mua</option>
                        <option value="rent" {{ request('category') == 'rent' ? 'selected' : '' }}>Thuê</option>
                        <option value="featured" {{ request('category') == 'featured' ? 'selected' : '' }}>Nổi bật</option>
                    </select>
                </div>

                <!-- Type -->
                <div class="form-group">
                    <label>Loại hình</label>
                    <select name="type">
                        <option value="">Tất cả</option>
                        <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Căn hộ</option>
                        <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>Nhà</option>
                        <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Biệt thự</option>
                        <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Đất</option>
                    </select>
                </div>

                <!-- Min Price -->
                <div class="form-group">
                    <label>Giá tối thiểu</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" 
                           placeholder="VNĐ">
                </div>

                <!-- Max Price -->
                <div class="form-group">
                    <label>Giá tối đa</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" 
                           placeholder="VNĐ">
                </div>

                <!-- Bedrooms -->
                <div class="form-group">
                    <label>Phòng ngủ</label>
                    <select name="bedrooms">
                        <option value="">Tất cả</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                        <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>4+</option>
                    </select>
                </div>

                <!-- Bathrooms -->
                <div class="form-group">
                    <label>Phòng tắm</label>
                    <select name="bathrooms">
                        <option value="">Tất cả</option>
                        <option value="1" {{ request('bathrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bathrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bathrooms') == '3' ? 'selected' : '' }}>3+</option>
                    </select>
                </div>

                <!-- Furnishing -->
                <div class="form-group">
                    <label>Nội thất</label>
                    <select name="furnishing">
                        <option value="">Tất cả</option>
                        <option value="furnished" {{ request('furnishing') == 'furnished' ? 'selected' : '' }}>Có</option>
                        <option value="unfurnished" {{ request('furnishing') == 'unfurnished' ? 'selected' : '' }}>Không</option>
                    </select>
                </div>
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn btn-primary">🔍 Tìm kiếm</button>
                <a href="{{ route('search') }}" class="btn btn-secondary">🔄 Xóa bộ lọc</a>
            </div>
        </form>
    </div>

    <!-- Results -->
    @if(isset($properties))
    <div class="results-header">
        <div class="results-count">
            Tìm thấy <strong>{{ $totalResults }}</strong> kết quả
        </div>
        <div class="sort-box">
            <form action="{{ route('search') }}" method="GET">
                @foreach(request()->except('sort_by') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <select name="sort_by" onchange="this.form.submit()">
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá thấp → cao</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá cao → thấp</option>
                </select>
            </form>
        </div>
    </div>

    @if($properties->count() > 0)
    <div class="property-grid">
        @foreach($properties as $property)
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

    <!-- Pagination -->
    <div style="display: flex; justify-content: center;">
        {{ $properties->links() }}
    </div>
    @else
    <div class="no-results">
        <h2>😔 Không tìm thấy kết quả</h2>
        <p>Vui lòng thử lại với điều kiện tìm kiếm khác</p>
    </div>
    @endif
    @endif
</div>

@endsection