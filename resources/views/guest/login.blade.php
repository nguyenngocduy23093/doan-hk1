<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập - RealEstatePro</title>
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
            position: relative; /* Để căn chỉnh lớp nền giả */
            overflow: hidden;   /* Ẩn phần rìa bị mờ */
        }

        /* --- TẠO HÌNH NỀN TÒA NHÀ MỜ --- */
        body::before {
            content: "";
            position: absolute;
            top: -20px; left: -20px; right: -20px; bottom: -20px; /* Mở rộng ra để khi blur không bị hụt viền */
            z-index: -1;
            
            /* Link ảnh tòa nhà (đẹp, hiện đại) */
            background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            
            /* Làm mờ và phủ thêm lớp màu đỏ nhẹ */
            filter: blur(8px); 
        }
        
        /* Lớp phủ màu tối nhẹ để chữ dễ đọc hơn nếu ảnh quá sáng */
        body::after {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.1); 
            z-index: -1;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95); /* Nền trắng hơi trong suốt nhẹ */
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
            border-color: #E03C31; /* Màu đỏ */
            box-shadow: 0 0 0 3px rgba(224, 60, 49, 0.15); /* Bóng đỏ nhạt */
        }
        
        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }

        /* --- NÚT BẤM MÀU ĐỎ --- */
        .btn-login {
            width: 100%;
            padding: 14px;
            /* Gradient đỏ sang trọng */
            background: linear-gradient(135deg, #E03C31 0%, #B91C1C 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(224, 60, 49, 0.3);
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
            <h1>🏠 Đăng Nhập</h1>
        </div>

        <form action="/login/checking" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="name" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Mật Khẩu</label>
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-login">Đăng Nhập</button>
        </form>

        <div class="back-home">
            <a href="/">← Quay về trang chủ</a>
        </div>
    </div>
</body>
</html>
