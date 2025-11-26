<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController; // Gọi Controller vừa tạo

// xóa cái này ko sao nha :P
Route::get('', [TestController::class, 'index'])
->middleware('testMiddleware');

// Authentication Routes - Task 4.1: Client-side validation
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Khi vào trang chủ '/', gọi hàm index của PropertyController
Route::get('/', [PropertyController::class, 'index'])->name('home');

// Đường dẫn đến trang liên hệ
Route::get('/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('contact');

// Đường dẫn đến trang About Us
Route::get('/about-us', function () {
    return view('about'); // Đảm bảo bạn đã tạo file about.blade.php chứa code mình gửi lúc nãy
});