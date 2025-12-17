@extends('admin.layouts.master')

@section('title', 'User Management')

@section('content')

<div class="container-fluid mt-4">

```
<h3 class="mb-3 fw-bold">Quản lý người dùng</h3>

<a href="{{ url('admin/dashboard/users/add') }}" class="btn btn-success mb-3">
    + Thêm người dùng
</a>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-bordered mb-0 align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="60">ID</th>
                    <th width="80">Avatar</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th width="100">Vai trò</th>
                    <th width="200">Hành động</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $u)
                <tr>
                    <td>{{ $u->user_id }}</td>

                    <td>
                        <img src="{{ $u->avatar ? asset('uploads/avatars/'.$u->avatar) : asset('images/default-avatar.png') }}"
                             width="45" height="45" class="rounded-circle object-fit-cover">
                    </td>

                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>

                    <td>
                        @if($u->role == "admin")
                            <span class="badge bg-primary">Admin</span>
                        @else
                            <span class="badge bg-secondary">User</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ url('admin/dashboard/users/'.$u->user_id.'/edit') }}" 
                           class="btn btn-warning btn-sm">
                            Sửa
                        </a>

                        <form action="{{ url('admin/dashboard/users/delete') }}" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $u->user_id }}">
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Xóa người dùng?')">
                                Xóa
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
```

</div>
@endsection
