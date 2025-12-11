@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Thêm bất động sản mới</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.properties.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="mt-3">

        @csrf

        <div class="row">
            <div class="col-md-6">

                <label>Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>

                <label class="mt-3">Giá</label>
                <input type="number" name="price" class="form-control" required>

                <label class="mt-3">Ảnh chính</label>
                <input type="file" name="main_image" class="form-control">

                <label class="mt-3">Ảnh gallery (nhiều ảnh)</label>
                <input type="file" name="images[]" class="form-control" multiple>

                <label class="mt-3">Địa điểm</label>
                <input type="text" name="location" class="form-control">

                <label class="mt-3">Loại</label>
                <select name="type" class="form-control">
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                </select>

                <label class="mt-3">Danh mục</label>
                <select name="category" class="form-control">
                    <option value="buy">Buy</option>
                    <option value="rent">Rent</option>
                    <option value="featured">Featured</option>
                </select>

            </div>

            <div class="col-md-6">

                <label>Phòng ngủ</label>
                <input type="number" name="bedrooms" class="form-control">

                <label class="mt-3">Phòng tắm</label>
                <input type="number" name="bathrooms" class="form-control">

                <label class="mt-3">Diện tích (m²)</label>
                <input type="number" name="area" class="form-control">

                <label class="mt-3">Nội thất</label>
                <input type="text" name="furnished" class="form-control">

                <label class="mt-3">Tiện ích</label>
                <textarea name="amenities" class="form-control" rows="4"></textarea>

                <label class="mt-3">GPS</label>
                <input type="text" name="gps" class="form-control">

            </div>
        </div>

        <button class="btn btn-success mt-4 px-4">Lưu</button>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary mt-4">Quay lại</a>
    </form>
</div>
@endsection
