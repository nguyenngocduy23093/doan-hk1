@extends('admin.layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-3">Sửa bất động sản #{{ $property->property_id }}</h2>

    <form action="{{ route('admin.properties.update', $property->property_id) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">

                <label class="mt-2">Tiêu đề</label>
                <input type="text" name="title" value="{{ $property->title }}" class="form-control" required>

                <label class="mt-3">Giá</label>
                <input type="number" name="price" value="{{ $property->price }}" class="form-control" required>

                <label class="mt-3">Ảnh chính hiện tại</label><br>
                @if($property->main_image)
                    <img src="{{ asset('storage/' . $property->main_image) }}"
                         width="150" class="rounded mb-2 border">
                @else
                    <p class="text-muted">Không có ảnh</p>
                @endif

                <label class="mt-2">Chọn ảnh chính mới</label>
                <input type="file" name="main_image" class="form-control">

                <label class="mt-3">Upload thêm ảnh gallery</label>
                <input type="file" name="images[]" class="form-control" multiple>

                <label class="mt-3">Địa điểm</label>
                <input type="text" name="location" value="{{ $property->location }}" class="form-control">

                <label class="mt-3">Loại</label>
                <select name="type" class="form-control">
                    <option value="house" {{ $property->type == 'house' ? 'selected' : '' }}>House</option>
                    <option value="apartment" {{ $property->type == 'apartment' ? 'selected' : '' }}>Apartment</option>
                </select>

                <label class="mt-3">Danh mục</label>
                <select name="category" class="form-control">
                    <option value="buy" {{ $property->category == 'buy' ? 'selected' : '' }}>Buy</option>
                    <option value="rent" {{ $property->category == 'rent' ? 'selected' : '' }}>Rent</option>
                    <option value="featured" {{ $property->category == 'featured' ? 'selected' : '' }}>Featured</option>
                </select>

            </div>

            <div class="col-md-6">

                <label class="mt-2">Phòng ngủ</label>
                <input type="number" name="bedrooms" value="{{ $property->bedrooms }}" class="form-control">

                <label class="mt-3">Phòng tắm</label>
                <input type="number" name="bathrooms" value="{{ $property->bathrooms }}" class="form-control">

                <label class="mt-3">Diện tích (m²)</label>
                <input type="number" name="area" value="{{ $property->area }}" class="form-control">

                <label class="mt-3">Nội thất</label>
                <input type="text" name="furnished" value="{{ $property->furnished }}" class="form-control">

                <label class="mt-3">Tiện ích</label>
                <textarea name="amenities" class="form-control" rows="4">{{ $property->amenities }}</textarea>

                <label class="mt-3">GPS</label>
                <input type="text" name="gps" value="{{ $property->gps }}" class="form-control">

            </div>
        </div>

        <button class="btn btn-success mt-4">Cập nhật</button>
        <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary mt-4">Quay lại</a>
    </form>

    <hr class="my-5">

    <h4>Ảnh gallery hiện tại</h4>

    <div class="row mt-3">
        @foreach($images as $img)
            <div class="col-md-2 mb-3 text-center">

                <img src="{{ asset('storage/' . $img->image_path) }}"
                     class="img-thumbnail mb-2"
                     style="height:120px; object-fit:cover;">

                <form action="{{ route('admin.properties.gallery.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" name="image_id" value="{{ $img->id }}">
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Xóa ảnh này?')">
                        Xóa
                    </button>
                </form>

            </div>
        @endforeach
    </div>

</div>
@endsection
