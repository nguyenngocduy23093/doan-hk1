@extends('layouts.app')

@section('title', 'Tìm kiếm - Real Estate Pro')

@section('content')

{{-- 
    =========================================
    1. HEADER BANNER (Đồng bộ trang chủ)
    =========================================
--}}
<div class="relative w-full py-16 md:py-24 mb-12 -mt-6 group">
    {{-- Ảnh nền --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105"
         style="background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&auto=format&fit=crop&w=1973&q=80');">
    </div>
    
    {{-- Overlay Gradient Đỏ --}}
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 via-red-700/85 to-red-500/70 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/10"></div>

    {{-- Nội dung Header --}}
    <div class="relative container mx-auto px-4 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-4 drop-shadow-lg tracking-tight flex items-center justify-center gap-3">
            <svg class="w-10 h-10 text-red-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            Tìm kiếm bất động sản
        </h1>
        <p class="text-red-50 text-lg md:text-xl font-medium max-w-2xl mx-auto opacity-95">
            Sử dụng bộ lọc chuyên sâu bên dưới để tìm ngôi nhà mơ ước của bạn
        </p>
    </div>
</div>

<div class="container mx-auto px-4 pb-16">
    
    {{-- 
        =========================================
        2. FILTER BOX (Giao diện mới)
        =========================================
    --}}
    <div class="bg-white rounded-3xl shadow-xl p-6 md:p-8 mb-12 border border-gray-100 relative -mt-20 z-10">
        <form action="{{ route('search') }}" method="GET">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                
                <!-- Keyword -->
                <div class="col-span-1 md:col-span-4">
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Từ khóa tìm kiếm</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" name="keyword" value="{{ request('keyword') }}" 
                               placeholder="Nhập tên dự án, đường, quận huyện..." 
                               class="w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white transition-all text-gray-700 font-medium placeholder-gray-400">
                    </div>
                </div>

                <!-- Category -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Nhu cầu</label>
                    <select name="category" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white cursor-pointer text-gray-700">
                        <option value="">Tất cả nhu cầu</option>
                        <option value="buy" {{ request('category') == 'buy' ? 'selected' : '' }}>Mua bán</option>
                        <option value="rent" {{ request('category') == 'rent' ? 'selected' : '' }}>Cho thuê</option>
                        <option value="featured" {{ request('category') == 'featured' ? 'selected' : '' }}>Dự án nổi bật</option>
                    </select>
                </div>

                <!-- Type -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Loại hình</label>
                    <select name="type" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white cursor-pointer text-gray-700">
                        <option value="">Tất cả loại hình</option>
                        <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Căn hộ chung cư</option>
                        <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>Nhà riêng</option>
                        <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Biệt thự</option>
                        <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Đất nền</option>
                    </select>
                </div>

                <!-- Min Price -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Giá thấp nhất</label>
                    <div class="relative">
                        <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Ví dụ: 1 tỷ"
                               class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white text-gray-700">
                        <span class="absolute right-4 top-3.5 text-gray-400 text-sm font-medium">VNĐ</span>
                    </div>
                </div>

                <!-- Max Price -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Giá cao nhất</label>
                    <div class="relative">
                        <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Ví dụ: 5 tỷ"
                               class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white text-gray-700">
                        <span class="absolute right-4 top-3.5 text-gray-400 text-sm font-medium">VNĐ</span>
                    </div>
                </div>

                <!-- Bedrooms -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Phòng ngủ</label>
                    <select name="bedrooms" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white cursor-pointer text-gray-700">
                        <option value="">Bất kỳ</option>
                        <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+ Phòng ngủ</option>
                        <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+ Phòng ngủ</option>
                        <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+ Phòng ngủ</option>
                        <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>4+ Phòng ngủ</option>
                    </select>
                </div>

                <!-- Bathrooms -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Phòng tắm</label>
                    <select name="bathrooms" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white cursor-pointer text-gray-700">
                        <option value="">Bất kỳ</option>
                        <option value="1" {{ request('bathrooms') == '1' ? 'selected' : '' }}>1+ Phòng tắm</option>
                        <option value="2" {{ request('bathrooms') == '2' ? 'selected' : '' }}>2+ Phòng tắm</option>
                        <option value="3" {{ request('bathrooms') == '3' ? 'selected' : '' }}>3+ Phòng tắm</option>
                    </select>
                </div>

                <!-- Furnishing -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2 ml-1">Tình trạng nội thất</label>
                    <select name="furnishing" class="w-full px-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white cursor-pointer text-gray-700">
                        <option value="">Tất cả</option>
                        <option value="furnished" {{ request('furnishing') == 'furnished' ? 'selected' : '' }}>Đã có nội thất (Furnished)</option>
                        <option value="unfurnished" {{ request('furnishing') == 'unfurnished' ? 'selected' : '' }}>Nhà trống (Unfurnished)</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-100">
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3.5 px-8 rounded-xl shadow-lg hover:shadow-red-500/30 transition-all transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    Tìm kiếm ngay
                </button>
                <a href="{{ route('search') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-3.5 px-8 rounded-xl transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    Xóa bộ lọc
                </a>
            </div>
        </form>
    </div>

    {{-- 
        =========================================
        3. RESULTS SECTION (Kết quả tìm kiếm)
        =========================================
    --}}
    @if(isset($properties))
    <div class="flex flex-col md:flex-row justify-between items-center mb-8 pb-4 border-b border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            Kết quả tìm kiếm: 
            <span class="bg-red-100 text-red-600 px-3 py-1 rounded-lg text-lg">
                {{ $totalResults ?? $properties->total() }}
            </span>
            <span class="text-gray-500 text-base font-normal">bất động sản</span>
        </h2>

        <!-- Sort Box -->
        <div class="mt-4 md:mt-0">
             <form action="{{ route('search') }}" method="GET" class="inline-block">
                @foreach(request()->except('sort_by') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <select name="sort_by" onchange="this.form.submit()" class="pl-4 pr-10 py-2.5 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-500 cursor-pointer shadow-sm text-gray-700 font-medium hover:border-red-300 transition">
                    <option value="newest" {{ request('sort_by') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                    <option value="oldest" {{ request('sort_by') == 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                    <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                </select>
            </form>
        </div>
    </div>

    @if($properties->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-12">
        @foreach($properties as $property)
        <a href="{{ route('property.detail', $property->property_id) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-red-900/10 transition-all duration-300 border border-gray-100 hover:border-red-100 flex flex-col h-full">
            
            {{-- Image Container --}}
            <div class="relative h-60 overflow-hidden">
                <img src="{{ $property->main_image ?? 'https://via.placeholder.com/400x300' }}" 
                     alt="{{ $property->title }}" 
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                
                {{-- Badge --}}
                <div class="absolute top-3 left-3">
                    <span class="bg-black/60 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-sm">
                        {{ $property->category == 'rent' ? 'CHO THUÊ' : 'ĐANG BÁN' }}
                    </span>
                </div>

                {{-- Hover Overlay --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            </div>

            {{-- Content --}}
            <div class="p-5 flex flex-col flex-grow">
                <h3 class="font-bold text-gray-900 text-lg line-clamp-2 mb-3 group-hover:text-red-600 transition-colors min-h-[3.5rem]">
                    {{ $property->title }}
                </h3>
                
                <div class="flex items-center text-gray-500 text-sm mb-4">
                    <svg class="w-4 h-4 mr-1 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="truncate">{{ $property->location }}</span>
                </div>

                <div class="mt-auto pt-4 border-t border-gray-100">
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-red-600 font-extrabold text-xl">
                            {{ number_format($property->price) }} 
                            <span class="text-sm font-medium text-gray-500">VNĐ</span>
                        </span>
                    </div>
                    <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                        <div class="flex gap-3">
                            <span class="flex items-center bg-gray-50 px-2 py-1 rounded" title="Phòng ngủ">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                {{ $property->bedrooms }}
                            </span>
                            <span class="flex items-center bg-gray-50 px-2 py-1 rounded" title="Phòng tắm">
                                <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                {{ $property->bathrooms }}
                            </span>
                        </div>
                        <span class="flex items-center text-gray-500">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                            {{ $property->area }} m²
                        </span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <!-- Pagination -->
    <style>
        .pagination { display: flex; justify-content: center; gap: 6px; }
        .pagination li a, .pagination li span { padding: 10px 16px; border: 1px solid #e5e7eb; border-radius: 8px; color: #374151; background: white; text-decoration: none; font-weight: 500; transition: all 0.2s; }
        .pagination li a:hover { border-color: #ef4444; color: #ef4444; background-color: #fef2f2; }
        .pagination .active span, .pagination .active a { background-color: #ef4444; color: white; border-color: #ef4444; box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.4); }
        .pagination svg { width: 20px; }
    </style>
    
    <div class="flex justify-center pb-12">
        {{ $properties->appends(request()->query())->links() }}
    </div>

    @else
    {{-- Empty State (Đã Fix căn giữa) --}}
    <div class="w-full flex flex-col items-center justify-center py-20 bg-gray-50 rounded-3xl border border-gray-100 shadow-inner mb-12 text-center">
        <div class="w-24 h-24 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-4xl mb-6 animate-bounce mx-auto">
            🏠❓
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Không tìm thấy bất động sản nào</h2>
        <p class="text-gray-500 mb-8 text-center max-w-md mx-auto">Chúng tôi không tìm thấy kết quả nào phù hợp với bộ lọc của bạn. Hãy thử điều chỉnh hoặc xóa bộ lọc.</p>
        <a href="{{ route('search') }}" class="inline-flex items-center px-8 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition shadow-lg hover:shadow-red-500/30 mx-auto">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
            Xóa bộ lọc tìm kiếm
        </a>
    </div>
    @endif
    @endif
</div>

@endsection
