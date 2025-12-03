<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký - RealEstatePro</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative; /* Cần thiết cho lớp nền giả */
            overflow: hidden;   /* Ẩn phần rìa bị mờ */
        }

        /* --- TẠO HÌNH NỀN TÒA NHÀ MỜ --- */
        body::before {
            content: "";
            position: absolute;
            /* Mở rộng lớp nền để tránh bị hụt viền khi blur */
            top: -20px; left: -20px; right: -20px; bottom: -20px;
            z-index: -1;
            
            /* Link ảnh tòa nhà */
            background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            
            /* Làm mờ hình nền */
            filter: blur(8px); 
        }
        
        /* Lớp phủ màu tối nhẹ để tăng độ tương phản */
        body::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.1); 
            z-index: -1;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95); /* Nền trắng hơi trong suốt */
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            max-width: 450px;
            width: 100%;
            padding: 40px;
            position: relative;
            z-index: 1;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-header h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .register-header p {
            color: #666;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        /* --- HIỆU ỨNG FOCUS MÀU ĐỎ --- */
        .form-group input:focus {
            outline: none;
            border-color: #E03C31; /* Viền màu đỏ */
            box-shadow: 0 0 0 3px rgba(224, 60, 49, 0.15); /* Bóng đỏ nhạt */
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        
        /* --- NÚT ĐĂNG KÝ MÀU ĐỎ --- */
        .btn-register {
            width: 100%;
            padding: 14px;
            /* Gradient đỏ */
            background: linear-gradient(135deg, #E03C31 0%, #B91C1C 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(224, 60, 49, 0.3); /* Bóng hover đỏ */
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
        .login-link a {
            color: #E03C31; /* Link màu đỏ */
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .back-home {
            text-align: center;
            margin-top: 15px;
        }
        .back-home a {
            color: #999;
            text-decoration: none;
            font-size: 13px;
        }
        .back-home a:hover {
            color: #E03C31; /* Hover màu đỏ */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1>🏠 Đăng Ký</h1>
            <p>Tạo tài khoản mới để bắt đầu</p>
        </div>

        <form action="/register/creating" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu (tối thiểu 6 ký tự)" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác Nhận Mật Khẩu</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
            </div>

            <button type="submit" class="btn-register">Đăng Ký</button>
        </form>

        <div class="login-link">
            Đã có tài khoản? <a href="/login">Đăng nhập ngay</a>
        </div>

        <div class="back-home">
            <a href="/">← Quay về trang chủ</a>
        </div>
    </div>
</body>
</html>