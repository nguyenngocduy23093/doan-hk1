@extends('layouts.app') 

@section('content')

<style>
    .password-container {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: 1px solid #e0e0e0;
    }

    .form-title {
        text-align: center;
        margin-bottom: 30px;
        color: #333;
        font-weight: bold;
        font-size: 24px;
        text-transform: uppercase;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #555;
    }

    .form-input {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }

    .form-input:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        background-color: #d9534f;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-submit:hover {
        background-color: #c9302c;
    }

    .alert-msg {
        padding: 15px;
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }
    
    .error-msg {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }
</style>

<div class="password-container">
    <h2 class="form-title">Đổi Mật Khẩu</h2>

    {{-- Hiển thị thông báo thành công --}}
    @if (session('status'))
        <div class="alert-msg">
            {{ session('status') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert-msg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('settings.update_password') }}" method="POST">
        @csrf

        {{-- Mật khẩu cũ --}}
        <div class="form-group">
            <label class="form-label">Mật khẩu hiện tại</label>
            <input type="password" name="old_password" class="form-input" placeholder="Nhập mật khẩu đang dùng..." required>
            @error('old_password')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        {{-- Mật khẩu mới --}}
        <div class="form-group">
            <label class="form-label">Mật khẩu mới</label>
            <input type="password" name="new_password" class="form-input" placeholder="Nhập mật khẩu mới (tối thiểu 6 ký tự)..." required>
            @error('new_password')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        {{-- Nhập lại mật khẩu --}}
        <div class="form-group">
            <label class="form-label">Xác nhận mật khẩu mới</label>
            <input type="password" name="new_password_confirmation" class="form-input" placeholder="Nhập lại mật khẩu mới..." required>
        </div>

        <button type="submit" class="btn-submit">Lưu thay đổi</button>
    </form>
</div>
@endsection
