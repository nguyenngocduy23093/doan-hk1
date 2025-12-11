@extends('admin.layouts.master')

@section('title', 'Thêm người dùng')

@section('content')

<div class="container mt-4">

```
<h3 class="mb-3 fw-bold">Thêm người dùng mới</h3>

<div class="card shadow-sm p-4">
    <form action="{{ url('admin/dashboard/users/creating') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Vai trò</label>
            <select name="role" class="form-select">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <button class="btn btn-primary">Tạo mới</button>
        <a href="{{ url('admin/dashboard/users') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
```

</div>
@endsection
