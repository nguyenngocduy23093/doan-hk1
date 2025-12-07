<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\AboutController;
use App\Http\Controllers\guest\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\guest\SearchController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\user\SettingsController;
use App\Http\Controllers\guest\PropertyController;
use App\Http\Controllers\guest\RegisterController;
use App\Http\Controllers\guest\FeedbackController;

// --- GUEST ROUTES (Khách vãng lai) ---
Route::get('/', [HomeController::class, 'index'])->name('home'); // Trang chủ
Route::get('/search', [SearchController::class, 'search'])->name('search'); // Tìm kiếm
Route::get('/about_us', [AboutController::class, 'index'])->name('about'); // Giới thiệu
Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // Liên hệ

// Danh mục bất động sản
Route::get('/buy', [PropertyController::class, 'listing'])->defaults('category', 'buy')->name('buy');
Route::get('/rent', [PropertyController::class, 'listing'])->defaults('category', 'rent')->name('rent');
Route::get('/featured', [PropertyController::class, 'listing'])->defaults('category', 'featured')->name('featured');
Route::get('/property/{id}', [PropertyController::class, 'detail'])->name('property.detail'); // Chi tiết BĐS

// --- AUTHENTICATION (Đăng ký / Đăng nhập) ---
Route::group(['middleware' => 'loggedinMiddleware'], function () {
    // Register
    Route::group(['prefix' => 'register'], function () {
        Route::get('/', [RegisterController::class, 'index'])->name('register');
        Route::post('/creating', [RegisterController::class, 'creating'])->name('register.create');
    });

    // Login
    Route::group(['prefix' => 'login'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/checking', [LoginController::class, 'checking'])->name('login.check');
    });
});

// Xử lý gửi liên hệ (Inquiry)
Route::post('inquiry/sending', [ContactController::class, 'sendInquiry'])->name('inquiry.send');


// --- USER ROUTES (Dành cho người dùng ĐÃ ĐĂNG NHẬP) ---
Route::middleware(['userMiddleware'])->group(function () { 
    
    // --- PHẦN FEEDBACK (Đã sửa lại chuẩn) ---
    // Sử dụng FeedbackController mà bạn vừa tạo
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
    
    Route::get('/logout', [LogoutController::class, 'index'])->name('logout'); // Đăng xuất

    // Settings (Cài đặt tài khoản)
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        
        // --- PHẦN ĐỔI MẬT KHẨU ---
        Route::get('/change_password', [SettingsController::class, 'changePassword'])->name('settings.change_password'); 
        Route::post('/update_new_password', [SettingsController::class, 'updatePassword'])->name('settings.update_password');
        
        // Cập nhật thông tin cá nhân
        Route::post('/updating', [SettingsController::class, 'updateProfile'])->name('settings.update_profile');

        // (Đã xóa phần Feedback cũ ở đây để tránh lỗi trùng lặp)
    });

});


// --- ADMIN ROUTES (Dành cho Admin) ---
Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'], function () {
    Route::get('/logout'); 

    // Dashboard
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/'); 

        // Quản lý Users
        Route::group(['prefix' => 'users'], function () {
            Route::get('/');
            Route::get('/{id}');
            Route::get('/{id}/edit');
            Route::get('/add');
            Route::post('/updating');
            Route::post('/creating');
            Route::post('/delete');
        });

        // Quản lý Properties
        Route::group(['prefix' => 'properties'], function () {
            Route::get('/');
            Route::get('/{id}');
            Route::get('/{id}/edit');
            Route::get('/add');
            Route::post('/updating');
            Route::post('/creating');
            Route::post('/delete');
        });

        // Quản lý Inquiries & Feedback
        Route::group(['prefix' => 'inquiries'], function () {
            Route::get('/');
            Route::get('/{id}');
            Route::post('/delete');
        });
        Route::group(['prefix' => 'feedback'], function () {
            Route::get('/');
            Route::get('/{id}');
            Route::post('/delete');
        });
    });
});

// PREVENT 404 ERROR
Route::fallback(function () {
    return redirect('/');
});