@extends('layouts.app')

@section('title', ucfirst($category) . ' - Real Estate Pro')

@section('content')

<style>
    .pagination {
        display: flex;
        justify-content: center;
        gap: 0.5rem;
        margin-top: 3rem;
        margin-bottom: 3rem;
    }
    /* Chỉnh màu mặc định của link phân trang */
    .pagination li a, .pagination li span {
        padding: 0.5rem 1rem;
        border: 1px solid #e5e7eb; /* gray-200 */
        border-radius: 0.375rem; /* rounded-md */
        color: #374151; /* gray-700 */
        text-decoration: none;
        background: white;
        transition: all 0.2s;
    }
    /* Hover */
    .pagination li a:hover {
        border-color: #E03C31;
        color: #E03C31;
    }
    /* Active (Trang hiện tại) - Đổi sang màu Đỏ */
    .pagination .active span, .pagination .active a {
        background-color: #E03C31;
        border-color: #E03C31;
        color: white;
    }
    /* Ẩn bớt mũi tên xấu của Laravel default nếu có */
    .pagination svg { width: 20px; }
</style>

<div class="bg-gradient-to-r from-bds-red to-[#ff5e57] text-white py-12 rounded-lg text-center shadow-lg mb-8 mt-6">
    <h1 class="text-3xl md:text-4xl font-bold mb-2">
        @if($category == 'buy')
            🏡 Bất động sản bán
        @elseif($category == 'rent')
            🏠 Bất động sản cho thuê
        @else
            🌟 Bất động sản nổi bật
        @endif
    </h1>
    <p class="text-white/90 text-lg">Tìm thấy <span class="font-bold">{{ $properties->total() }}</span> bất động sản phù hợp</p>
</div>

@if($properties->count() > 0)
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-12">
    @foreach($properties as $property)
    <a href="{{ route('property.detail', $property->property_id) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-xl transition duration-300">
        
        <div class="relative h-56 overflow-hidden bg-gray-200">
            <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                 alt="{{ $property->title }}" 
                 class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            <div class="absolute bottom-0 left-0 bg-gradient-to-t from-black/70 to-transparent w-full p-3 pt-8">
                 <span class="text-white font-bold text-lg">
                    {{ number_format($property->price) }} VNĐ
                    @if($category == 'rent')<span class="text-sm font-normal">/tháng</span>@endif
                 </span>
            </div>
        </div>

        <div class="p-4">
            <h3 class="font-semibold text-gray-900 line-clamp-2 mb-2 h-12 group-hover:text-bds-red transition">
                {{ $property->title }}
            </h3>
            
            <div class="text-gray-500 text-sm mb-3 flex items-center gap-1 truncate">
                <svg class="w-4 h-4 text-gray-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                {{ $property->location }}
            </div>

            <div class="flex items-center gap-4 text-xs text-gray-500 border-t pt-3">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    {{ $property->bedrooms }} PN
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                    {{ $property->bathrooms }} PT
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"></path></svg>
                    {{ $property->area }} m²
                </span>
            </div>
        </div>
    </a>
    @endforeach
</div>

<div class="pagination-wrapper flex justify-center">
    {{ $properties->links() }}
</div>

@else
<div class="text-center py-16 bg-white rounded-lg border border-gray-100 shadow-sm">
    <div class="text-6xl mb-4">🏠❓</div>
    <h2 class="text-xl font-bold text-gray-800 mb-2">Không tìm thấy bất động sản nào</h2>
    <p class="text-gray-500">Vui lòng thử lại sau hoặc tìm kiếm với điều kiện khác</p>
    <a href="{{ route('home') }}" class="inline-block mt-4 px-6 py-2 bg-bds-red text-white font-bold rounded hover:bg-red-700 transition">
        Về trang chủ
    </a>
</div>
@endif

@endsection