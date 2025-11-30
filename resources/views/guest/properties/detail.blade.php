@extends('layouts.app')

@section('title', $property->title . ' - Real Estate Pro')

@section('content')
<style>
    .detail-container {
        max-width: 1000px;
        margin: 2rem auto;
    }
    .property-header {
        margin-bottom: 2rem;
    }
    .property-header h1 {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    .property-location {
        color: #7f8c8d;
        font-size: 1.1rem;
    }
    .property-main-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .property-price-box {
        background: #e74c3c;
        color: white;
        padding: 1.5rem;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 2rem;
    }
    .property-price-box h2 {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    .property-details-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .detail-item {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 10px;
        text-align: center;
    }
    .detail-item-label {
        color: #7f8c8d;
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    .detail-item-value {
        font-size: 1.3rem;
        font-weight: bold;
        color: #2c3e50;
    }
    .property-description {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .property-description h3 {
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    .contact-form {
        background: #f8f9fa;
        padding: 2rem;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    .contact-form h3 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    .form-group {
        margin-bottom: 1rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: bold;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }
    .form-group textarea {
        min-height: 120px;
        resize: vertical;
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
        width: 100%;
    }
    .btn-primary:hover {
        background: #2980b9;
    }
    .related-properties {
        margin-top: 3rem;
    }
    .related-properties h3 {
        font-size: 1.8rem;
        color: #2c3e50;
        margin-bottom: 1.5rem;
    }
    .property-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
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
        height: 180px;
        object-fit: cover;
    }
    .property-info {
        padding: 1rem;
    }
    .property-title {
        font-size: 1.1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
        color: #2c3e50;
    }
    .property-price {
        color: #e74c3c;
        font-size: 1.2rem;
        font-weight: bold;
    }
    @media (max-width: 768px) {
        .property-main-image {
            height: 300px;
        }
        .property-details-grid {
            grid-template-columns: 1fr 1fr;
        }
        .property-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="detail-container">
    <!-- Property Header -->
    <div class="property-header">
        <h1>{{ $property->title }}</h1>
        <div class="property-location">📍 {{ $property->location }}</div>
    </div>

    <!-- Main Image -->
    <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/1000x500' }}" 
         alt="{{ $property->title }}" 
         class="property-main-image">

    <!-- Price Box -->
    <div class="property-price-box">
        <h2>{{ number_format($property->price) }} VNĐ</h2>
        @if($property->category == 'rent')
        <p>Giá thuê / tháng</p>
        @endif
    </div>

    <!-- Property Details -->
    <div class="property-details-grid">
        <div class="detail-item">
            <div class="detail-item-label">Loại hình</div>
            <div class="detail-item-value">{{ ucfirst($property->type) }}</div>
        </div>
        <div class="detail-item">
            <div class="detail-item-label">Phòng ngủ</div>
            <div class="detail-item-value">🛏️ {{ $property->bedrooms }}</div>
        </div>
        <div class="detail-item">
            <div class="detail-item-label">Phòng tắm</div>
            <div class="detail-item-value">🚿 {{ $property->bathrooms }}</div>
        </div>
        <div class="detail-item">
            <div class="detail-item-label">Diện tích</div>
            <div class="detail-item-value">📐 {{ $property->area }} m²</div>
        </div>
        <div class="detail-item">
            <div class="detail-item-label">Nội thất</div>
            <div class="detail-item-value">{{ $property->furnishing == 'furnished' ? '✅ Có' : '❌ Không' }}</div>
        </div>
        <div class="detail-item">
            <div class="detail-item-label">Danh mục</div>
            <div class="detail-item-value">{{ ucfirst($property->category) }}</div>
        </div>
    </div>

    <!-- Description -->
    <div class="property-description">
        <h3>📝 Mô tả chi tiết</h3>
        <p>{{ $property->description }}</p>
        
        @if($property->amenities)
        <h3 style="margin-top: 1.5rem;">✨ Tiện ích</h3>
        <p>{{ $property->amenities }}</p>
        @endif
    </div>

    <!-- Contact Form -->
    <div class="contact-form">
        <h3>📞 Liên hệ tư vấn</h3>
        <form action="{{ route('inquiry.send') }}" method="POST">
            @csrf
            <input type="hidden" name="property_id" value="{{ $property->property_id }}">
            
            <div class="form-group">
                <label>Họ tên *</label>
                <input type="text" name="name" required>
            </div>
            
            <div class="form-group">
                <label>Email *</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Tiêu đề *</label>
                <input type="text" name="title" required placeholder="Ví dụ: Tôi muốn xem nhà">
            </div>
            
            <div class="form-group">
                <label>Tin nhắn *</label>
                <textarea name="message" required placeholder="Nhập nội dung tin nhắn của bạn..."></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>
        </form>
    </div>
</div>

<!-- Related Properties -->
@if($relatedProperties->count() > 0)
<div class="related-properties">
    <div class="container">
        <h3>🏘️ Bất động sản liên quan</h3>
        <div class="property-grid">
            @foreach($relatedProperties as $related)
            <a href="{{ route('property.detail', $related->property_id) }}" style="text-decoration: none; color: inherit;">
                <div class="property-card">
                    <img src="{{ $related->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                         alt="{{ $related->title }}" 
                         class="property-image">
                    <div class="property-info">
                        <div class="property-title">{{ $related->title }}</div>
                        <div class="property-price">{{ number_format($related->price) }} VNĐ</div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endif

@endsection