@extends('layouts.app')

@section('title', $property->title . ' - Real Estate Pro')

@section('content')
<style>
    .detail-wrapper {
        max-width: 1400px;
        margin: 2rem auto;
        padding: 0 20px;
    }
    .detail-layout {
        display: grid;
        grid-template-columns: 1fr 400px;
        gap: 2rem;
    }
    /* LEFT COLUMN - Main Content */
    .detail-main {
        min-width: 0;
    }
    .property-title {
        font-size: 2rem;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    .property-location {
        color: #7f8c8d;
        font-size: 1.1rem;
        margin-bottom: 1rem;
    }
    .property-price {
        font-size: 2rem;
        color: #e74c3c;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }
    /* Image Gallery */
    .image-gallery {
        margin-bottom: 2rem;
    }
    .main-image-container {
        position: relative;
        margin-bottom: 1rem;
    }
    .main-image {
        width: 100%;
        height: 500px;
        object-fit: cover;
        border-radius: 10px;
    }
    .image-thumbnails {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 1rem;
    }
    .thumbnail {
        height: 120px;
        object-fit: cover;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s;
    }
    .thumbnail:hover {
        transform: scale(1.05);
    }

    /* Overview Section */
    .overview-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .overview-item {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 2rem 1.5rem;
        border-radius: 15px;
        text-align: center;
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .overview-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(102, 126, 234, 0.4);
    }
    .overview-icon {
        font-size: 2.5rem;
        margin-bottom: 0.8rem;
        display: block;
    }
    .overview-label {
        color: rgba(255,255,255,0.9);
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .overview-value {
        font-size: 1.8rem;
        font-weight: bold;
        color: white;
    }
    .description-box {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 2rem;
    }
    .description-box h3 {
        color: #2c3e50;
        margin-bottom: 1rem;
    }
    .description-box p {
        line-height: 1.8;
        color: #555;
    }
    /* RIGHT COLUMN - Contact Form (Sticky) */
    .detail-sidebar {
        position: sticky;
        top: 100px;
        height: fit-content;
    }
    .contact-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }
    .contact-card h3 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        font-size: 1.3rem;
    }
    .contact-info-text {
        background: #e3f2fd;
        padding: 1rem;
        border-radius: 5px;
        margin-bottom: 1.5rem;
        font-size: 0.9rem;
        color: #555;
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
    @media (max-width: 1024px) {
        .detail-layout {
            grid-template-columns: 1fr;
        }
        .detail-sidebar {
            position: static;
        }
        .overview-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 768px) {
        .main-image {
            height: 300px;
        }
        .image-thumbnails {
            grid-template-columns: repeat(3, 1fr);
        }
        .overview-grid {
            grid-template-columns: 1fr;
        }
        .tab-buttons {
            overflow-x: auto;
        }
    }
</style>


<div class="detail-wrapper">
    <!-- Breadcrumb -->
    <div style="padding: 1rem 0; color: #7f8c8d; font-size: 0.9rem;">
        <a href="{{ route('home') }}" style="color: #3498db; text-decoration: none;">Trang chủ</a>
        <span> / </span>
        <a href="{{ route($property->category) }}" style="color: #3498db; text-decoration: none;">
            @if($property->category == 'buy') Nhà đất bán
            @elseif($property->category == 'rent') Nhà đất cho thuê
            @else Dự án
            @endif
        </a>
        <span> / </span>
        <span>{{ $property->title }}</span>
    </div>

    <div class="detail-layout">
        <!-- LEFT COLUMN - Main Content -->
        <div class="detail-main">
            <!-- Header -->
            <h1 class="property-title">{{ $property->title }}</h1>
            <div class="property-location">📍 {{ $property->location }}</div>
            <div class="property-price">
                {{ number_format($property->price) }} VNĐ
                @if($property->category == 'rent') / tháng @endif
            </div>

            <!-- Image Gallery -->
            <div class="image-gallery">
                <div class="main-image-container">
                    <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/1000x500' }}" 
                         alt="{{ $property->title }}" 
                         class="main-image"
                         id="mainImage">
                </div>
                <div class="image-thumbnails">
                    @php
                        // Lấy số thứ tự property từ image_main_url (ví dụ: /images/1.1.jpg -> 1)
                        $imagePrefix = '';
                        if($property->image_main_url) {
                            preg_match('/\/images\/(\d+)\./', $property->image_main_url, $matches);
                            $imagePrefix = $matches[1] ?? '1';
                        }
                    @endphp
                    
                    @for($i = 1; $i <= 6; $i++)
                        <img src="/images/{{ $imagePrefix }}.{{ $i }}.jpg" 
                             class="thumbnail" 
                             onclick="changeMainImage('/images/{{ $imagePrefix }}.{{ $i }}.jpg')"
                             onerror="this.src='https://via.placeholder.com/300x200'">
                    @endfor
                </div>
            </div>

            <script>
            function changeMainImage(src) {
                document.getElementById('mainImage').src = src;
            }
            </script>

            <!-- Thông tin nhanh -->
            <div style="display: flex; gap: 2rem; margin-bottom: 2rem; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1.5rem;">🛏️</span>
                    <span><strong>{{ $property->bedrooms }}</strong> Phòng ngủ</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1.5rem;">🚿</span>
                    <span><strong>{{ $property->bathrooms }}</strong> Phòng tắm</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="font-size: 1.5rem;">📐</span>
                    <span><strong>{{ $property->area }}</strong> m²</span>
                </div>
            </div>

            <!-- Tổng quan -->
            <div class="section-title" style="font-size: 1.8rem; color: #2c3e50; margin: 2rem 0 1.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem;">
                📋 Thông tin chi tiết
            </div>
            <div>
                <table style="width: 100%; border-collapse: collapse; background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 10px; overflow: hidden;">
                    <tr style="background: #f8f9fa;">
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0; font-weight: bold; width: 30%;">🏠 Loại hình</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0;">
                            @if($property->type == 'apartment') Căn hộ/Chung cư
                            @elseif($property->type == 'house') Nhà riêng
                            @elseif($property->type == 'villa') Biệt thự
                            @elseif($property->type == 'land') Đất nền
                            @else {{ ucfirst($property->type) }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0; font-weight: bold;">📐 Diện tích</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0;">{{ $property->area }} m²</td>
                    </tr>
                    <tr style="background: #f8f9fa;">
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0; font-weight: bold;">🛏️ Số phòng ngủ</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0;">{{ $property->bedrooms }} phòng</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0; font-weight: bold;">🚿 Số phòng tắm</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0;">{{ $property->bathrooms }} phòng</td>
                    </tr>
                    <tr style="background: #f8f9fa;">
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0; font-weight: bold;">🪑 Nội thất</td>
                        <td style="padding: 1rem; border-bottom: 1px solid #e0e0e0;">
                            {{ $property->furnishing == 'furnished' ? 'Đầy đủ nội thất' : 'Bàn giao thô' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; font-weight: bold;">⭐ Danh mục</td>
                        <td style="padding: 1rem;">
                            @if($property->category == 'buy') Nhà đất bán
                            @elseif($property->category == 'rent') Nhà đất cho thuê
                            @elseif($property->category == 'featured') Dự án nổi bật
                            @else {{ ucfirst($property->category) }}
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="overview-grid" style="display: none;">
                    <div class="overview-item">
                        <span class="overview-icon">🏠</span>
                        <div class="overview-label">Loại hình</div>
                        <div class="overview-value">
                            @if($property->type == 'apartment') Căn hộ
                            @elseif($property->type == 'house') Nhà
                            @elseif($property->type == 'villa') Biệt thự
                            @elseif($property->type == 'land') Đất
                            @else {{ ucfirst($property->type) }}
                            @endif
                        </div>
                    </div>
                    <div class="overview-item">
                        <span class="overview-icon">🛏️</span>
                        <div class="overview-label">Phòng ngủ</div>
                        <div class="overview-value">{{ $property->bedrooms }} phòng</div>
                    </div>
                    <div class="overview-item">
                        <span class="overview-icon">🚿</span>
                        <div class="overview-label">Phòng tắm</div>
                        <div class="overview-value">{{ $property->bathrooms }} phòng</div>
                    </div>
                    <div class="overview-item">
                        <span class="overview-icon">📐</span>
                        <div class="overview-label">Diện tích</div>
                        <div class="overview-value">{{ $property->area }} m²</div>
                    </div>
                    <div class="overview-item">
                        <span class="overview-icon">🪑</span>
                        <div class="overview-label">Nội thất</div>
                        <div class="overview-value">{{ $property->furnishing == 'furnished' ? 'Đầy đủ' : 'Trống' }}</div>
                    </div>
                    <div class="overview-item">
                        <span class="overview-icon">⭐</span>
                        <div class="overview-label">Danh mục</div>
                        <div class="overview-value">
                            @if($property->category == 'buy') Bán
                            @elseif($property->category == 'rent') Cho thuê
                            @elseif($property->category == 'featured') Nổi bật
                            @else {{ ucfirst($property->category) }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <!-- Mặt bằng -->
            <div class="section-title" style="font-size: 1.8rem; color: #2c3e50; margin: 3rem 0 1.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem;">
                🏗️ Mặt Bằng - Thiết Kế
            </div>
            <div>
                <div class="description-box">
                    <h3>🏗️ Mặt Bằng - Thiết Kế</h3>
                    
                    <h4 style="margin-top: 1.5rem; color: #2c3e50;">Khu nhà ở thấp tầng (Green Little Town)</h4>
                    <ul style="line-height: 2; color: #555; margin-left: 1.5rem;">
                        <li><strong>Sản phẩm:</strong> Biệt thự, nhà phố thương mại, liền kề</li>
                        <li><strong>Xây dựng:</strong> 06 tầng, có thang máy</li>
                        <li><strong>Số lượng:</strong> 17 căn biệt thự, 21 căn nhà phố thương mại, 96 căn liền kề</li>
                        <li><strong>Diện tích sàn phẩm:</strong> 80m2-90m2-100m2</li>
                    </ul>

                    <h4 style="margin-top: 1.5rem; color: #2c3e50;">Khu căn hộ cao tầng (Green Vista)</h4>
                    <ul style="line-height: 2; color: #555; margin-left: 1.5rem;">
                        <li><strong>Diện tích đất:</strong> 2.280,1m2</li>
                        <li><strong>Chiều cao:</strong> 15 tầng nổi + 03 tầng hầm</li>
                        <li><strong>Số lượng căn hộ:</strong> 110 căn</li>
                        <li><strong>Diện tích căn hộ:</strong> 48.83m2 - 77.47m2 (2-3PN)</li>
                    </ul>

                    <div style="margin-top: 2rem; padding: 2rem; background: #2c5f4f; border-radius: 10px; color: white;">
                        <h4 style="color: #ffd700; margin-bottom: 1rem;">MẶT BẰNG TỔNG THỂ</h4>
                        <ul style="line-height: 2;">
                            <li>7 phân khu</li>
                            <li>Quy mô 168 căn hộ thấp tầng, 01 khối cao tầng</li>
                            <li>Tiện ích: Công viên cây xanh, trung tâm thương mại, trường mầm non, bể bơi 4 mùa</li>
                            <li>Mật tiền rộng từ 4.6 – 7m</li>
                            <li>Đường nội khu rộng từ 11.5 – 15m</li>
                            <li>Đường QH rộng 25 – 30m</li>
                        </ul>
                    </div>

                    <div style="margin-top: 2rem;">
                        <img src="https://via.placeholder.com/800x600?text=Mặt+Bằng+Tổng+Thể" 
                             style="width: 100%; border-radius: 10px;" 
                             alt="Mặt bằng tổng thể">
                        <p style="text-align: center; color: #7f8c8d; margin-top: 0.5rem; font-size: 0.9rem;">
                            Mặt bằng tổng thể dự án
                        </p>
                    </div>
                </div>
            </div>

            <!-- Tiện ích -->
            <div class="section-title" style="font-size: 1.8rem; color: #2c3e50; margin: 3rem 0 1.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem;">
                ✨ Tiện Ích
            </div>
            <div>
                <div class="description-box">
                    <h3>✨ Tiện Ích</h3>
                    <p style="margin-bottom: 1.5rem;">Dự án được đầu tư hệ thống tiện ích nội khu đa dạng:</p>
                    
                    <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏢 Trung tâm thương mại</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏋️ Khu tập gym ngoài trời</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏊 Công viên trung tâm</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🎾 Khu thể thao đa năng</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🌳 Vườn xanh & vườn thiền</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🎪 Khu vui chơi trẻ em</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏪 Chợ thủ công</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏃 Khu nướng BBQ</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🛒 Siêu thị mini</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>☕ Câu lạc bộ coffee</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏋️ Phòng tập gym & yoga</strong>
                        </div>
                        <div style="background: #f8f9fa; padding: 1rem; border-radius: 8px;">
                            <strong>🏊 Bể bơi 4 mùa</strong>
                        </div>
                    </div>

                    @if($property->amenities)
                    <div style="margin-top: 2rem; padding: 1.5rem; background: #e3f2fd; border-radius: 8px;">
                        <strong>📝 Tiện ích của BDS này:</strong>
                        <p style="margin-top: 0.5rem;">{{ $property->amenities }}</p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Mô tả -->
            <div class="section-title" style="font-size: 1.8rem; color: #2c3e50; margin: 3rem 0 1.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem;">
                📝 Mô Tả Chi Tiết
            </div>
            <div>
                <div class="description-box">
                    <h3>📝 Mô tả chi tiết</h3>
                    <p>{{ $property->description }}</p>
                </div>
            </div>

            <!-- Vị trí -->
            <div class="section-title" style="font-size: 1.8rem; color: #2c3e50; margin: 3rem 0 1.5rem; border-bottom: 3px solid #3498db; padding-bottom: 0.5rem;">
                📍 Vị Trí
            </div>
            <div>
                <div class="description-box">
                    <h3>📍 Vị trí</h3>
                    <p><strong>Địa chỉ:</strong> {{ $property->location }}</p>
                    @if($property->gps)
                    <p><strong>Tọa độ GPS:</strong> {{ $property->gps }}</p>
                    <div style="margin-top: 1rem; padding: 2rem; background: #f0f0f0; border-radius: 5px; text-align: center;">
                        <p>🗺️ Google Maps sẽ được hiển thị ở đây</p>
                        <small>(Cần API key để hiển thị bản đồ)</small>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN - Contact Form (Sticky) -->
        <div class="detail-sidebar">
            <div class="contact-card">
                @if(session('user_verified'))
                <!-- Đã đăng nhập - Hiện button mở modal -->
                <div style="text-align: center; padding: 1rem 0;">
                    <h3 style="font-size: 1.5rem; color: #2c3e50; margin-bottom: 1rem;">Liên hệ tư vấn miễn phí</h3>
                    <p style="color: #7f8c8d; margin-bottom: 1.5rem;">
                        Chúng tôi sẽ kết nối bạn với những môi giới/ chủ đầu tư của dự án
                    </p>
                    <button onclick="openContactModal()" class="btn btn-primary" style="background: #E03C31; width: 100%; padding: 1rem; font-size: 1.1rem; border: none; border-radius: 5px; color: white; cursor: pointer;">
                        📞 Yêu cầu liên hệ
                    </button>
                </div>

                <!-- Modal -->
                <div id="contactModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center;">
                    <div style="background: white; border-radius: 10px; max-width: 500px; width: 90%; max-height: 90vh; overflow-y: auto; position: relative;">
                        <!-- Header -->
                        <div style="padding: 1.5rem; border-bottom: 1px solid #e0e0e0; display: flex; justify-content: space-between; align-items: center;">
                            <h3 style="margin: 0; font-size: 1.3rem; color: #2c3e50;">Yêu cầu liên hệ</h3>
                            <button onclick="closeContactModal()" style="background: none; border: none; font-size: 1.5rem; color: #999; cursor: pointer; padding: 0; width: 30px; height: 30px;">✕</button>
                        </div>
                        
                        <!-- Body -->
                        <div style="padding: 1.5rem;">
                            <p style="color: #7f8c8d; margin-bottom: 1.5rem;">
                                Chúng tôi sẽ kết nối bạn với những môi giới/ chủ đầu tư của dự án
                            </p>
                            
                            <form action="{{ route('inquiry.send') }}" method="POST">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->property_id }}">
                                
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <label style="display: block; margin-bottom: 0.5rem; color: #2c3e50; font-weight: 600;">Họ tên *</label>
                                    <input type="text" name="name" value="{{ session('user_name') }}" required placeholder="Nhập họ tên" 
                                           style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>
                                
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <label style="display: block; margin-bottom: 0.5rem; color: #2c3e50; font-weight: 600;">Số điện thoại *</label>
                                    <input type="tel" name="phone" required placeholder="Nhập số điện thoại" 
                                           style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
                                </div>
                                
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <label style="display: block; margin-bottom: 0.5rem; color: #2c3e50; font-weight: 600;">Nội dung</label>
                                    <textarea name="message" placeholder="Tôi quan tâm đến dự án này" 
                                              style="width: 100%; padding: 0.8rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; min-height: 100px; resize: vertical;">Tôi quan tâm đến dự án này</textarea>
                                </div>
                                
                                <input type="hidden" name="title" value="Yêu cầu liên hệ từ {{ $property->title }}">
                                
                                <p style="font-size: 0.85rem; color: #7f8c8d; margin-bottom: 1rem;">
                                    Bằng việc gửi thông tin, bạn đồng ý với <a href="#" style="color: #E03C31;">chính sách bảo mật</a> và cho phép Batdongsan.com.vn thu thập, xử lý, chia sẻ thông tin này tới môi giới/ chủ đầu tư để liên lạc với bạn.
                                </p>
                                
                                <button type="submit" style="width: 100%; padding: 1rem; background: #E03C31; color: white; border: none; border-radius: 5px; font-size: 1.1rem; font-weight: bold; cursor: pointer;">
                                    Gửi thông tin
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <script>
                function openContactModal() {
                    document.getElementById('contactModal').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                }
                function closeContactModal() {
                    document.getElementById('contactModal').style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
                // Click outside to close
                document.getElementById('contactModal').addEventListener('click', function(e) {
                    if (e.target === this) {
                        closeContactModal();
                    }
                });
                </script>
                </div>
                @else
                <!-- Chưa đăng nhập - Hiện button redirect -->
                <div style="text-align: center; padding: 1rem 0;">
                    <h3 style="font-size: 1.5rem; color: #2c3e50; margin-bottom: 1rem;">Liên hệ tư vấn miễn phí</h3>
                    <p style="color: #7f8c8d; margin-bottom: 1.5rem;">
                        Hãy để lại thông tin của bạn để nhận tư vấn và các cập nhật mới nhất của dự án này
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-primary" style="background: #17a2b8; width: 100%; padding: 1rem; font-size: 1.1rem; display: block; text-decoration: none; color: white;">
                        ✉️ Đăng ký để liên hệ
                    </a>
                    <p style="margin-top: 1rem; font-size: 0.9rem; color: #7f8c8d;">
                        Đã có tài khoản? <a href="/login" style="color: #3498db;">Đăng nhập ngay</a>
                    </p>
                </div>
                @endif
            </div>
        </div>
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