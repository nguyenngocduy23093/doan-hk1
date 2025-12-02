@extends('layouts.app')

@section('title', 'Trang chủ - Real Estate Pro')

@section('content')
<div class="max-w-4xl mx-auto mt-10">

    {{-- Page Header --}}
    <h1 class="text-3xl font-bold text-gray-800 mb-8">
        Cài đặt tài khoản
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- Left Panel: Navigation --}}
        <aside class="bg-white shadow rounded-lg divide-y divide-gray-200">
            <a href="/settings/change_password" 
               class="block px-5 py-4 hover:bg-gray-50 flex items-center gap-3 transition">
                🔒 <span>Đổi mật khẩu</span>
            </a>

            <a href="/feedback" 
               class="block px-5 py-4 hover:bg-gray-50 flex items-center gap-3 transition">
                💬 <span>Feedback</span>
            </a>

            <a href="/logout" 
               class="block px-5 py-4 hover:bg-red-50 text-red-600 font-semibold flex items-center gap-3 transition">
                🚪 <span>Đăng xuất</span>
            </a>
        </aside>

        {{-- Right Panel: Update Username --}}
        <main class="md:col-span-2">

            {{-- Feedback Messages --}}
            @if(session('success'))
                <div class="p-4 mb-4 bg-green-100 text-green-700 border border-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-4 bg-red-100 text-red-700 border border-red-300 rounded-lg">
                    @foreach($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Card --}}
            <div class="bg-white p-8 shadow rounded-xl">
                <h2 class="text-xl font-semibold mb-6 text-gray-800">
                    Cập nhật tên người dùng
                </h2>

                <form action="/settings/updating" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block mb-1 text-gray-700 font-medium">Tên người dùng</label>
                        <input 
                            type="text" 
                            name="user_name"
                            value="{{ old('user_name', session('user_name')) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none transition"
                            required
                        >
                    </div>

                    <button 
                        type="submit"
                        class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 shadow transition">
                        Lưu thay đổi
                    </button>
                </form>
            </div>

        </main>
    </div>
</div>
@endsection