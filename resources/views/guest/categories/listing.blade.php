@extends('layouts.app')

@section('title', ucfirst($category) . ' - Real Estate Pro')

@section('content')
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem;
        border-radius: 10px;
        margin: 2rem 0;
        text-align: center;
    }
    .page-header h1 {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }
    .property-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
        margin: 2rem 0;
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
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin: 2rem 0;
    }
    .pagination a, .pagination span {
        padding: 0.5rem 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
    }
    .pagination .active {
        background: #3498db;
        color: white;
        border-color: #3498db;
    }
    .no-results {
        text-align: center;
        padding: 3rem;
        color: #7f8c8d;
    }
    @media (max-width: 768px) {
        .property-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <h1>
        @if($category == 'buy')
            🏡 Bất động sản bán
        @elseif($category == 'rent')
            🏠 Bất động sản cho thuê
        @else
            🌟 Bất động sản nổi bật
        @endif
    </h1>
    <p>Tìm thấy {{ $properties->total() }} bất động sản</p>
</div>

<!-- Properties Grid -->
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
                <div class="property-price">
                    {{ number_format($property->price) }} VNĐ
                    @if($category == 'rent')/tháng @endif
                </div>
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
<div class="pagination">
    {{ $properties->links() }}
</div>
@else
<div class="no-results">
    <h2>Không tìm thấy bất động sản nào</h2>
    <p>Vui lòng thử lại sau hoặc tìm kiếm với điều kiện khác</p>
</div>
@endif

@endsection