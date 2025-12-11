@extends('admin.layouts.master')

@section('title', 'Sửa người dùng')

@section('content')

<div class="container mt-4">

    <h3 class="mb-3 fw-bold">Sửa thông tin người dùng</h3>

    <div class="card shadow-sm p-4">

        {{-- FORM UPDATE USER --}}
        <form action="{{ route('admin.users.update', $user->user_id) }}"
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            
            {{-- Hidden ID --}}
            <input type="hidden" name="user_id" value="{{ $user->user_id }}">

            {{-- Tên --}}
            <div class="mb-3">
                <label class="form-label">Tên</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $user->name }}" required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                       value="{{ $user->email }}" required>
            </div>

            {{-- Mật khẩu --}}
            <div class="mb-3">
                <label class="form-label">Mật khẩu (để trống nếu không đổi)</label>
                <input type="password" name="password" class="form-control">
            </div>

            {{-- Avatar --}}
            <div class="mb-3">
                <label class="form-label">Avatar</label><br>

                <img src="{{ $user->avatar 
                        ? asset('uploads/avatars/' . $user->avatar) 
                        : asset('images/default-avatar.png') }}"
                     width="70"
                     class="rounded mb-2">

                <input type="file" name="avatar" class="form-control">
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label class="form-label">Vai trò</label>
                <select name="role" class="form-select">
                    <option value="0" @selected($user->role == 0)>User</option>
                    <option value="1" @selected($user->role == 1)>Admin</option>
                </select>
            </div>

            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay lại</a>

        </form>

    </div>

</div>
@endsection
