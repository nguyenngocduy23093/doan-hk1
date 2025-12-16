@extends('layouts.app')

@section('title', 'Trang chủ - Real Estate Pro')

@section('content')

{{-- 
    =========================================
    1. HERO SECTION & SEARCH
    =========================================
--}}
{{-- Đã thêm class 'overflow-hidden' vào dòng dưới để cắt bỏ phần ảnh thừa khi phóng to --}}
<div class="relative w-full h-[550px] -mt-4 mb-24 group overflow-hidden">
    {{-- Ảnh nền Banner --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105" 
         style="background-image: url('https://images.unsplash.com/photo-1600596542815-e32cb141d3d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80');">
    </div>

    {{-- Lớp phủ màu Đỏ Gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/90 via-red-700/80 to-red-500/60 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/20"></div>

    {{-- Nội dung chính Banner --}}
    <div class="relative container mx-auto px-4 h-full flex flex-col justify-center items-center text-center pt-10">
        <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 drop-shadow-lg tracking-tight">
            Tìm ngôi nhà <span class="text-red-200">mơ ước</span> của bạn
        </h1>
        <p class="text-red-50 text-lg md:text-xl opacity-95 mb-10 font-light max-w-2xl mx-auto drop-shadow-md">
            Hàng ngàn bất động sản chất lượng, pháp lý minh bạch đang chờ bạn khám phá ngay hôm nay
        </p>

        {{-- Form Tìm kiếm --}}
        <div class="w-full max-w-5xl bg-white/95 backdrop-blur-sm p-4 md:p-6 rounded-2xl shadow-2xl transform translate-y-8 md:translate-y-12 border border-white/20">
            <form action="{{ route('search') }}" method="GET" class="flex flex-col md:flex-row gap-4 items-center">
                
                {{-- Input Từ khóa --}}
                <div class="flex-grow w-full md:w-auto relative group/input">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400 group-focus-within/input:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="keyword" 
                           placeholder="Nhập tên dự án, đường, quận..." 
                           class="w-full pl-11 pr-4 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent text-gray-700 font-medium transition-all shadow-inner">
                </div>

                {{-- Select Danh mục --}}
                <div class="w-full md:w-1/4 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <select name="category" class="w-full pl-11 pr-8 py-4 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-500 text-gray-700 font-medium appearance-none cursor-pointer hover:bg-white transition-colors shadow-inner">
                        <option value="">Tất cả loại hình</option>
                        <option value="buy">Mua Bán</option>
                        <option value="rent">Cho Thuê</option>
                        <option value="featured">Dự án Nổi bật</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                {{-- Button Submit --}}
                <button type="submit" class="w-full md:w-auto bg-[#ea2b2b] hover:bg-[#d62525] text-white font-bold px-8 py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-red-500/40 hover:-translate-y-0.5 flex items-center justify-center gap-2">
                    <span>Tìm Kiếm</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 pb-16 space-y-20">

    {{-- 
        =========================================
        2. BẤT ĐỘNG SẢN NỔI BẬT
        =========================================
    --}}
    @if($featuredProperties->count() > 0)
    <section>
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4 border-b border-gray-100 pb-4">
            <div>
                <span class="text-red-500 font-bold tracking-wider uppercase text-sm">Lựa chọn tốt nhất</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">🌟 Bất động sản nổi bật</h2>
            </div>
            <a href="{{ route('featured') }}" class="group flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors bg-red-50 px-4 py-2 rounded-full">
                Xem tất cả
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($featuredProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-red-900/10 transition-all duration-300 border border-gray-100 hover:border-red-100 flex flex-col h-full">
                {{-- Image Container --}}
                <div class="relative h-60 overflow-hidden">
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-gradient-to-r from-red-600 to-orange-500 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md flex items-center gap-1">
                            🔥 HOT
                        </span>
                    </div>
                    <img src="{{ $property->main_image ?? 'https://via.placeholder.com/400x300' }}" 
                         alt="{{ $property->title }}" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
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
                            <span class="text-red-600 font-extrabold text-xl">{{ number_format($property->price) }} <span class="text-sm font-medium text-gray-500">VNĐ</span></span>
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
    </section>
    @endif

    {{-- 
        =========================================
        3. BẤT ĐỘNG SẢN CHO THUÊ
        =========================================
    --}}
    @if($rentProperties->count() > 0)
    <section>
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4 border-b border-gray-100 pb-4">
            <div>
                 <span class="text-blue-500 font-bold tracking-wider uppercase text-sm">Tiện nghi & Hiện đại</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">🏠 Bất động sản cho thuê</h2>
            </div>
            <a href="{{ route('rent') }}" class="group flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors bg-red-50 px-4 py-2 rounded-full">
                Xem tất cả
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($rentProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-300 border border-gray-100 hover:border-blue-100 flex flex-col h-full">
                <div class="relative h-60 overflow-hidden">
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">CHO THUÊ</span>
                    </div>
                    <img src="{{ $property->main_image ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $property->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-900 text-lg line-clamp-2 mb-3 group-hover:text-blue-600 transition-colors min-h-[3.5rem]">{{ $property->title }}</h3>
                     <div class="flex items-center text-gray-500 text-sm mb-4">
                        <svg class="w-4 h-4 mr-1 text-blue-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="truncate">{{ $property->location }}</span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-blue-600 font-extrabold text-xl">{{ number_format($property->price) }} <span class="text-sm font-medium text-gray-500">VNĐ/tháng</span></span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                            <div class="flex gap-3">
                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    {{ $property->bedrooms }}
                                </span>
                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded">
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
    </section>
    @endif

    {{-- 
        =========================================
        4. BẤT ĐỘNG SẢN BÁN
        =========================================
    --}}
    @if($buyProperties->count() > 0)
    <section>
        <div class="flex flex-col md:flex-row justify-between items-end mb-8 gap-4 border-b border-gray-100 pb-4">
            <div>
                 <span class="text-green-600 font-bold tracking-wider uppercase text-sm">Đầu tư sinh lời</span>
                <h2 class="text-3xl font-bold text-gray-800 mt-1">🏡 Bất động sản bán</h2>
            </div>
            <a href="{{ route('buy') }}" class="group flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors bg-red-50 px-4 py-2 rounded-full">
                Xem tất cả
                <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
            </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            @foreach($buyProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-green-900/10 transition-all duration-300 border border-gray-100 hover:border-green-100 flex flex-col h-full">
                <div class="relative h-60 overflow-hidden">
                    <div class="absolute top-3 left-3 z-10">
                        <span class="bg-green-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">ĐANG BÁN</span>
                    </div>
                    <img src="{{ $property->main_image ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $property->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h3 class="font-bold text-gray-900 text-lg line-clamp-2 mb-3 group-hover:text-green-600 transition-colors min-h-[3.5rem]">{{ $property->title }}</h3>
                     <div class="flex items-center text-gray-500 text-sm mb-4">
                        <svg class="w-4 h-4 mr-1 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span class="truncate">{{ $property->location }}</span>
                    </div>
                    <div class="mt-auto pt-4 border-t border-gray-100">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-red-600 font-extrabold text-xl">{{ number_format($property->price) }} <span class="text-sm font-medium text-gray-500">VNĐ</span></span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600 font-medium">
                            <div class="flex gap-3">
                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    {{ $property->bedrooms }}
                                </span>
                                <span class="flex items-center bg-gray-50 px-2 py-1 rounded">
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
    </section>
    @endif

</div>

@endsection