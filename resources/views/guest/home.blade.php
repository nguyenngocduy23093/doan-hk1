@extends('layouts.app')

@section('title', 'Trang chủ - Real Estate Pro')

@section('content')

<div class="relative w-full bg-gradient-to-r from-bds-red to-[#ff5e57] -mt-4 pb-16 pt-12 mb-12">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Tìm ngôi nhà mơ ước của bạn</h1>
        <p class="text-white text-lg opacity-90 mb-8">Hàng ngàn bất động sản chất lượng đang chờ bạn khám phá</p>
        
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-4xl mx-auto transform translate-y-4">
            <form action="{{ route('search') }}" method="GET" class="flex flex-col md:flex-row gap-3">
                
                <div class="flex-grow">
                    <input type="text" name="keyword" 
                           placeholder="Tìm kiếm theo tên hoặc địa điểm..." 
                           class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red focus:ring-1 focus:ring-bds-red text-gray-700">
                </div>

                <div class="md:w-1/4">
                    <select name="category" class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-bds-red text-gray-700 bg-white">
                        <option value="">Tất cả danh mục</option>
                        <option value="buy">Mua</option>
                        <option value="rent">Thuê</option>
                        <option value="featured">Nổi bật</option>
                    </select>
                </div>

                <button type="submit" class="bg-bds-red hover:bg-bds-red-hover text-white font-bold px-8 py-3 rounded transition shadow-md whitespace-nowrap">
                    Tìm kiếm
                </button>
            </form>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 pt-8">

    @if($featuredProperties->count() > 0)
    <div class="mb-12">
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-2xl font-bold text-gray-800">🌟 Bất động sản nổi bật</h2>
            <a href="{{ route('featured') }}" class="text-bds-red font-medium hover:underline text-sm">Xem tất cả</a>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($featuredProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="relative h-48 bg-gray-200 overflow-hidden">
                    <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" 
                         alt="{{ $property->title }}" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 line-clamp-2 mb-2 h-12 group-hover:text-bds-red transition">
                        {{ $property->title }}
                    </h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-bds-red font-bold text-lg">{{ number_format($property->price) }} VNĐ</span>
                        <span class="text-xs text-gray-500">{{ $property->area }} m²</span>
                    </div>
                    <div class="text-gray-500 text-sm mb-3 truncate">📍 {{ $property->location }}</div>
                    <div class="flex gap-3 text-xs text-gray-500 border-t pt-3">
                        <span>🛏️ {{ $property->bedrooms }} PN</span>
                        <span>🚿 {{ $property->bathrooms }} PT</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    @if($rentProperties->count() > 0)
    <div class="mb-12">
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-2xl font-bold text-gray-800">🏠 Bất động sản cho thuê</h2>
            <a href="{{ route('rent') }}" class="text-bds-red font-medium hover:underline text-sm">Xem tất cả</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($rentProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="relative h-48 bg-gray-200 overflow-hidden">
                    <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 line-clamp-2 mb-2 h-12 group-hover:text-bds-red transition">{{ $property->title }}</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-bds-red font-bold text-lg">{{ number_format($property->price) }} VNĐ</span>
                        <span class="text-xs text-gray-500">{{ $property->area }} m²</span>
                    </div>
                    <div class="text-gray-500 text-sm mb-3 truncate">📍 {{ $property->location }}</div>
                    <div class="flex gap-3 text-xs text-gray-500 border-t pt-3">
                        <span>🛏️ {{ $property->bedrooms }} PN</span>
                        <span>🚿 {{ $property->bathrooms }} PT</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

    @if($buyProperties->count() > 0)
    <div class="mb-16">
        <div class="flex justify-between items-end mb-6">
            <h2 class="text-2xl font-bold text-gray-800">🏡 Bất động sản bán</h2>
            <a href="{{ route('buy') }}" class="text-bds-red font-medium hover:underline text-sm">Xem tất cả</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($buyProperties as $property)
            <a href="{{ route('property.detail', $property->property_id) }}" class="group block bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                <div class="relative h-48 bg-gray-200 overflow-hidden">
                    <img src="{{ $property->image_main_url ?? 'https://via.placeholder.com/400x300' }}" alt="{{ $property->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-900 line-clamp-2 mb-2 h-12 group-hover:text-bds-red transition">{{ $property->title }}</h3>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-bds-red font-bold text-lg">{{ number_format($property->price) }} VNĐ</span>
                        <span class="text-xs text-gray-500">{{ $property->area }} m²</span>
                    </div>
                    <div class="text-gray-500 text-sm mb-3 truncate">📍 {{ $property->location }}</div>
                    <div class="flex gap-3 text-xs text-gray-500 border-t pt-3">
                        <span>🛏️ {{ $property->bedrooms }} PN</span>
                        <span>🚿 {{ $property->bathrooms }} PT</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endif

</div>

@endsection