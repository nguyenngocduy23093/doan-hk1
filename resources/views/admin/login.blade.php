<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1501183638710-841dd1904471?auto=format&fit=crop&w=1500&q=80')
                no-repeat center/cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(2px);
        }

        .login-box {
            background: rgba(255,255,255,0.92);
            padding: 30px;
            border-radius: 12px;
            width: 380px;
            box-shadow: 0px 6px 20px rgba(0,0,0,0.15);
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h3>Admin Login</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('admin.login.check') }}" method="post">
        @csrf
        
        <div class="mb-3">
            <label>Email admin</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Đăng nhập</button>
    </form>
</div>

</body>
</html>
