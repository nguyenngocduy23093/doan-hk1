@extends('layouts.app')

@section('title', 'Tìm kiếm - Real Estate Pro')

@section('content')

<!-- 1. SEARCH HEADER (Gradient Đỏ) -->
<div class="bg-gradient-to-r from-bds-red to-[#ff5e57] text-white py-10 mb-8 -mt-6">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl font-bold mb-2 flex items-center justify-center gap-2">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            Tìm kiếm bất động sản
        </h1>
        <p class="opacity-90">Sử dụng bộ lọc bên dưới để tìm bất động sản phù hợp</p>
    </div>
</div>

<div class="container mx-auto px-4 pb-16">
    
    <!-- 2. FILTER BOX (Bộ lọc màu trắng, nổi bật) -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-10 border border-gray-100">
        <form action="{{ route('search') }}" method="GET">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                
                <!-- Keyword -->
                <div class="col-span-1 md:col-span-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Từ khóa</label>
                    <input type="text" name="keyword" value="{{ request('keyword') }}" 
                           placeholder="Nhập tên dự án, đường, quận huyện..." 
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red transition text-gray-700">
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Danh mục</label>
                    <select name="category" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red bg-white text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="buy" {{ request('category') == 'buy' ? 'selected' : '' }}>Mua</option>
                        <option value="rent" {{ request('category') == 'rent' ? 'selected' : '' }}>Thuê</option>
                        <option value="featured" {{ request('category') == 'featured' ? 'selected' : '' }}>Nổi bật</option>
                    </select>
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Loại hình</label>
                    <select name="type" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red bg-white text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Căn hộ</option>
                        <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>Nhà</option>
                        <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Biệt thự</option>
                        <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Đất</option>
                    </select>
                </div>

                <!-- Min Price -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Giá tối thiểu</label>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="VNĐ"
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red text-gray-700">
                </div>

                <!-- Max Price -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Giá tối đa</label>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="VNĐ"
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red text-gray-700">
                </div>

                <!-- Bedrooms -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phòng ngủ</label>
                    <select name="bedrooms" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red bg-white text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                        <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>4+</option>
                    </select>
                </div>

                <!-- Bathrooms -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phòng tắm</label>
                    <select name="bathrooms" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red bg-white text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="1" {{ request('bathrooms') == '1' ? 'selected' : '' }}>1+</option>
                        <option value="2" {{ request('bathrooms') == '2' ? 'selected' : '' }}>2+</option>
                        <option value="3" {{ request('bathrooms') == '3' ? 'selected' : '' }}>3+</option>
                    </select>
                </div>

                <!-- Furnishing -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nội thất</label>
                    <select name="furnishing" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red bg-white text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="furnished" {{ request('furnishing') == 'furnished' ? 'selected' : '' }}>Có nội thất</option>
                        <option value="unfurnished" {{ request('furnishing') == 'unfurnished' ? 'selected' : '' }}>Không nội thất</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-bds-red hover:bg-[#c4261d] text-white font-bold py-3 px-8 rounded shadow transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Tìm kiếm
                </button>
                <a href="{{ route('search') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 px-6 rounded transition flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Xóa bộ lọc
                </a>
            </div>
        </form>
    </div>

    <!-- 3. RESULTS (Kết quả tìm kiếm) -->
    @if(isset($properties))
    <div class="flex flex-col md:flex-row justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-gray-800">
            Tìm thấy <span class="text-bds-red">{{ $totalResults ?? $properties->total() }}</span> kết quả
        </h2>

        <!-- Sort Box -->
        <div class="mt-2 md:mt-0">
             <form action="{{ route('search') }}" method="GET" class="inline-block">
                @foreach(request()->except('sort_by') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <select name="sort_by" onchange="this.form.submit()" class="border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:border-bds-red bg-white text-gray-700 cursor-pointer">
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá thấp → cao</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá cao → thấp</option>
                </select>
            </form>
        </div>
    </div>

    @if($properties->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">
        @foreach($properties as $property)
        <a href="{{ route('property.detail', $property->property_id) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
            <div class="relative h-48 bg-gray-200 overflow-hidden">
                <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                     alt="{{ $property->title }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute bottom-2 left-2 bg-black/60 text-white text-xs px-2 py-1 rounded">
                    {{ $property->category == 'rent' ? 'Cho thuê' : 'Bán' }}
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 line-clamp-2 mb-2 h-12 group-hover:text-bds-red transition">
                    {{ $property->title }}
                </h3>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-bds-red font-bold text-lg">
                        {{ number_format($property->price) }} VNĐ
                    </span>
                </div>
                <div class="text-gray-500 text-sm mb-3 truncate">📍 {{ $property->location }}</div>
                <div class="flex gap-4 text-xs text-gray-500 border-t pt-3">
                    <span class="flex items-center gap-1">🛏️ {{ $property->bedrooms }}</span>
                    <span class="flex items-center gap-1">🚿 {{ $property->bathrooms }}</span>
                    <span class="flex items-center gap-1">📐 {{ $property->area }} m²</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Pagination CSS Customization -->
    <style>
        .pagination { display: flex; justify-content: center; gap: 5px; }
        .pagination li a, .pagination li span { padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; color: #374151; background: white; text-decoration: none; }
        .pagination .active span { background-color: #E03C31; color: white; border-color: #E03C31; }
        .pagination li a:hover { border-color: #E03C31; color: #E03C31; }
    </style>
    
    <div class="flex justify-center">
        {{ $properties->appends(request()->query())->links() }}
    </div>

    @else
    <div class="text-center py-12 bg-gray-50 rounded-lg border border-dashed border-gray-300">
        <div class="text-5xl mb-4">🏠❓</div>
        <h2 class="text-xl font-bold text-gray-700 mb-2">Không tìm thấy kết quả</h2>
        <p class="text-gray-500">Vui lòng thử lại với điều kiện tìm kiếm khác</p>
    </div>
    @endif
    @endif
</div>

@endsection