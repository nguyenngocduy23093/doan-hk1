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
            padding: 15px; /* Giảm padding body để tận dụng không gian trên mobile */
            position: relative;
            overflow: hidden;
        }

        /* --- TẠO HÌNH NỀN TÒA NHÀ MỜ --- */
        body::before {
            content: "";
            position: absolute;
            top: -20px; left: -20px; right: -20px; bottom: -20px;
            z-index: -1;
            background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(8px); 
        }
        
        body::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.1); 
            z-index: -1;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px; /* Bo góc nhỏ hơn xíu cho gọn */
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
            
            /* --- THAY ĐỔI KÍCH THƯỚC Ở ĐÂY --- */
            max-width: 400px; /* Thu nhỏ chiều rộng tối đa */
            width: 100%;      /* Chiếm hết chiều rộng cho phép */
            padding: 30px;    /* Giảm padding để form gọn hơn */
            
            position: relative;
            z-index: 1;
        }

        .register-header {
            text-align: center;
            margin-bottom: 20px; /* Giảm khoảng cách dưới tiêu đề */
        }
        .register-header h1 {
            color: #333;
            font-size: 24px; /* Giảm cỡ chữ tiêu đề */
            margin-bottom: 5px;
        }
        .register-header p {
            color: #666;
            font-size: 13px;
        }
        .form-group {
            margin-bottom: 15px; /* Giảm khoảng cách giữa các ô input */
        }
        .form-group label {
            display: block;
            color: #333;
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 13px; /* Chữ label nhỏ gọn hơn */
        }
        .form-group input {
            width: 100%;
            padding: 10px 12px; /* Ô input thấp hơn 1 chút */
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #E03C31;
            box-shadow: 0 0 0 3px rgba(224, 60, 49, 0.15);
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 11px; /* Chữ lỗi nhỏ lại */
            margin-top: 3px;
        }
        
        .btn-register {
            width: 100%;
            padding: 12px; /* Nút bấm gọn hơn */
            background: linear-gradient(135deg, #E03C31 0%, #B91C1C 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 5px;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(224, 60, 49, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            color: #666;
            font-size: 13px;
        }
        .login-link a {
            color: #E03C31;
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .back-home {
            text-align: center;
            margin-top: 10px;
        }
        .back-home a {
            color: #999;
            text-decoration: none;
            font-size: 12px;
        }
        .back-home a:hover {
            color: #E03C31;
        }

        /* --- Responsive cho màn hình điện thoại nhỏ (dưới 480px) --- */
        @media (max-width: 480px) {
            .register-container {
                padding: 20px; /* Padding nhỏ hơn nữa trên điện thoại */
                max-width: 100%; /* Full màn hình */
            }
            .register-header h1 {
                font-size: 22px;
            }
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
                <input type="password" id="password" name="password" placeholder="Mật khẩu (min 6 ký tự)" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác Nhận MK</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" required>
            </div>

            <button type="submit" class="btn-register">Đăng Ký</button>
        </form>

        <div class="login-link">
            Đã có tài khoản? <a href="/login">Đăng nhập</a>
        </div>

        <div class="back-home">
            <a href="/">← Trang chủ</a>
        </div>
    </div>
</body>
</html>