@extends('layouts.app')

@section('title', 'Liên hệ - Real Estate Pro')

@section('content')
<style>
    .contact-page {
        max-width: 800px;
        margin: 2rem auto;
    }
    .contact-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 3rem 2rem;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 2rem;
    }
    .contact-header h1 {
        font-size: 2.5rem;
        margin-bottom: 1rem;
    }
    .contact-info {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }
    .info-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        text-align: center;
    }
    .info-card-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
    .info-card h3 {
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }
    .info-card p {
        color: #7f8c8d;
    }
    .contact-form {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .contact-form h2 {
        color: #2c3e50;
        margin-bottom: 1.5rem;
        text-align: center;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: #2c3e50;
        font-weight: bold;
    }
    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        font-family: Arial, sans-serif;
    }
    .form-group textarea {
        min-height: 150px;
        resize: vertical;
    }
    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #3498db;
    }
    .error-message {
        color: #e74c3c;
        font-size: 0.9rem;
        margin-top: 0.3rem;
    }
    .btn {
        padding: 1rem 2rem;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        transition: all 0.3s;
        width: 100%;
    }
    .btn-primary {
        background: #3498db;
        color: white;
    }
    .btn-primary:hover {
        background: #2980b9;
    }
    @media (max-width: 768px) {
        .contact-header h1 {
            font-size: 2rem;
        }
        .contact-info {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="contact-page">
    <!-- Contact Header -->
    <div class="contact-header">
        <h1>📞 Liên hệ với chúng tôi</h1>
        <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn tìm được ngôi nhà mơ ước</p>
    </div>

    <!-- Contact Info -->
    <div class="contact-info">
        <div class="info-card">
            <div class="info-card-icon">📍</div>
            <h3>Địa chỉ</h3>
            <p>123 Đường ABC, Quận 1<br>TP. Hồ Chí Minh</p>
        </div>
        <div class="info-card">
            <div class="info-card-icon">📧</div>
            <h3>Email</h3>
            <p>info@realestatepro.com<br>support@realestatepro.com</p>
        </div>
        <div class="info-card">
            <div class="info-card-icon">📱</div>
            <h3>Điện thoại</h3>
            <p>+84 123 456 789<br>+84 987 654 321</p>
        </div>
    </div>
</div>

@endsection