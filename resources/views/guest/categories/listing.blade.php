@extends('layouts.app')

@section('title', ucfirst($category) . ' - Real Estate Pro')

@section('content')

{{-- Custom CSS cho Pagination --}}
<style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 3rem;
        margin-bottom: 4rem;
    }
    .pagination li a, .pagination li span {
        padding: 0.5rem 1rem;
        border: 1px solid #e5e7eb;
        border-radius: 0.75rem;
        color: #374151;
        text-decoration: none;
        background: white;
        transition: all 0.2s;
        font-weight: 500;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    .pagination li a:hover {
        border-color: #ef4444;
        color: #ef4444;
        background-color: #fef2f2;
    }
    .pagination .active span, .pagination .active a {
        background-color: #ef4444;
        border-color: #ef4444;
        color: white;
        box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.4);
    }
    .pagination svg { width: 20px; }
</style>

{{-- 
    =========================================
    1. HEADER SECTION
    =========================================
--}}
<div class="relative w-full py-16 md:py-20 mb-12 rounded-3xl overflow-hidden shadow-xl mt-6 group">
    {{-- Ảnh nền Header --}}
    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-1000 group-hover:scale-105"
         style="background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
    </div>

    {{-- Overlay Gradient Đỏ --}}
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/95 via-red-700/85 to-red-500/70 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-black/10"></div>

    {{-- Nội dung Header --}}
    <div class="relative container mx-auto px-4 text-center text-white">
        <h1 class="text-3xl md:text-5xl font-extrabold mb-3 drop-shadow-lg tracking-tight">
            @if($category == 'buy')
                🏡 Bất động sản <span class="text-red-200">Bán</span>
            @elseif($category == 'rent')
                🏠 Bất động sản <span class="text-blue-200">Cho thuê</span>
            @else
                🌟 Bất động sản <span class="text-yellow-200">Nổi bật</span>
            @endif
        </h1>
        <div class="inline-flex items-center justify-center px-4 py-1.5 rounded-full bg-white/20 backdrop-blur-md border border-white/30 text-sm md:text-base">
            <span>Tìm thấy <span class="font-bold text-white">{{ $properties->total() }}</span> kết quả phù hợp</span>
        </div>
    </div>
</div>

{{-- 
    =========================================
    2. DANH SÁCH BẤT ĐỘNG SẢN
    =========================================
--}}
<div class="container mx-auto px-4">
    @if($properties->count() > 0)
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-12">
        @foreach($properties as $property)
        <a href="{{ route('property.detail', $property->property_id) }}" class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-red-900/10 transition-all duration-300 border border-gray-100 hover:border-red-100 flex flex-col h-full">
            
            {{-- Image Container --}}
            <div class="relative h-60 overflow-hidden">
                <img 
                            src="{{ $property->main_image ? asset('storage/' . $property->main_image) : 'https://via.placeholder.com/400x300' }}"
                            alt="{{ $property->title }}"
                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                        />
                     alt="{{ $property->title }}" 
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                
                <div class="absolute top-3 left-3">
                     @if($category == 'rent')
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">CHO THUÊ</span>
                     @elseif($category == 'buy')
                        <span class="bg-green-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">ĐANG BÁN</span>
                     @else
                        <span class="bg-red-600 text-white text-xs font-bold px-3 py-1.5 rounded-lg shadow-md">NỔI BẬT</span>
                     @endif
                </div>

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
                            <span class="text-sm font-medium text-gray-500">VNĐ @if($category == 'rent')/tháng @endif</span>
                        </span>
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

    <div class="pagination-wrapper flex justify-center pb-12">
        {{ $properties->links() }}
    </div>

    @else
    {{-- Empty State (Đã FIX LỖI CĂN GIỮA) --}}
    {{-- Thêm w-full và text-center vào container cha, mx-auto vào các phần tử con --}}
    <div class="w-full flex flex-col items-center justify-center py-20 bg-gray-50 rounded-3xl border border-gray-100 shadow-inner mb-12 text-center">
        <div class="w-24 h-24 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-4xl mb-6 animate-bounce mx-auto">
            🏠❓
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2">Không tìm thấy bất động sản nào</h2>
        <p class="text-gray-500 mb-8 text-center max-w-md mx-auto">Rất tiếc, hiện tại chưa có dữ liệu cho mục này. Vui lòng thử lại sau hoặc tìm kiếm với điều kiện khác.</p>
        <a href="{{ route('home') }}" class="inline-flex items-center px-8 py-3 bg-red-600 text-white font-bold rounded-xl hover:bg-red-700 transition shadow-lg hover:shadow-red-500/30 mx-auto">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Về trang chủ
        </a>
    </div>
    @endif
</div>

@endsection
