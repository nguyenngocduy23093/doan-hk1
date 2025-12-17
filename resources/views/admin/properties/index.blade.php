@extends('admin.layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Danh sách bất động sản</h2>

    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary mb-3">
        + Thêm bất động sản
    </a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th width="60">ID</th>
                <th width="120">Ảnh chính</th>
                <th>Tiêu đề</th>
                <th width="150">Giá</th>
                <th width="120">Danh mục</th>
                <th width="120">Loại</th>
                <th width="160">Hành động</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($properties as $p)
            <tr>
                <td>{{ $p->property_id }}</td>

                <td>
                    @if($p->main_image)
                        <img src="{{ asset('storage/' . $p->main_image) }}"
                             width="100" class="rounded border">
                    @else
                        <span class="text-muted">Không có ảnh</span>
                    @endif
                </td>

                <td>{{ $p->title }}</td>

                <td>{{ number_format($p->price, 0, ',', '.') }} đ</td>

                <td>{{ $p->category }}</td>

                <td>
                    @if($p->category == 'buy')
                        <span class="badge text-bg-success">Mua</span>
                    @else
                        <span class="badge text-bg-info">Thuê</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.properties.edit', $p->property_id) }}"
                       class="btn btn-warning btn-sm">
                        Sửa
                    </a>

                    <form action="{{ route('admin.properties.delete') }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $p->property_id }}">
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Bạn có chắc muốn xoá?')">
                            Xoá
                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Chưa có bất động sản nào
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
