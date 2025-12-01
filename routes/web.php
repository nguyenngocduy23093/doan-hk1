<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\guest\HomeController;
use App\Http\Controllers\guest\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Http\Controllers\guest\SearchController;
use App\Http\Controllers\guest\ContactController;
use App\Http\Controllers\guest\PropertyController;
use App\Http\Controllers\guest\RegisterController;

// KO ĐC XÓA CÁI NÀY
Route::get('/test', [TestController::class, 'index'])
->middleware(['testMiddleware', 'loggedinMiddleware']);

// Routes
Route::group(['prefix' => ''], function () {
    //// Guest
    Route::get('/', [HomeController::class, 'index'])->name('home'); // trang chủ (home)
    Route::get('/search', [SearchController::class, 'search'])->name('search'); // tìm kiếm (search bar)
    Route::get('/about_us'); // trang về chúng tôi (about us)
    Route::get('/contact', [ContactController::class, 'index'])->name('contact'); // trang contact
    Route::get('/buy', [PropertyController::class, 'listing'])->defaults('category', 'buy')->name('buy'); // trang danh mục cho mua (category = buy)
    Route::get('/rent', [PropertyController::class, 'listing'])->defaults('category', 'rent')->name('rent'); // trang danh mục cho thuê (category = rent)
    Route::get('/featured', [PropertyController::class, 'listing'])->defaults('category', 'featured')->name('featured'); // trang danh mục (category = featured)
    Route::get('/property/{id}', [PropertyController::class, 'detail'])->name('property.detail'); // trang chi tiết BDS

    
    // Register
    Route::group(['prefix' => 'register', 'middleware' => 'loggedinMiddleware'], function () {
        Route::get('/', [RegisterController::class, 'index'])->name('register'); // trang điền form
        Route::post('/creating', [RegisterController::class, 'creating'])->name('register.create'); // check và tạo account mới
    });

    // Log in
    Route::group(['prefix' => 'login', 'middleware' => 'loggedinMiddleware'], function () {
        Route::get('/', [LoginController::class, 'index']); // trang điền form
        
        Route::post('/checking', [LoginController::class, 'checking']); // check và redirect tới trang chủ
    });

    // Inquiry
    Route::post('inquiry/sending', [ContactController::class, 'sendInquiry'])->name('inquiry.send'); // check và gửi lên database
    
    //// User (Logged In/Đã Đăng Nhập) 

    Route::get('/logout', [LogoutController::class, 'index'])->middleware('userMiddleware'); // đăng xuất user
    // Settings
    Route::group(['prefix' => 'settings', 'middleware' => 'userMiddleware'], function () {
        Route::get('/'); // trang settings
        Route::get('/change_password'); // trang thay đổi mật khẩu

        Route::post('/update_new_password'); // thay đổi password (mật khẩu)
        Route::post('/updating'); // thay đổi (tên, hình đại diện, v.v)
    });

    // Feedback
    Route::group(['prefix' => 'feedback', 'middleware' => 'userMiddleware'], function () {
        Route::get('/'); // trang điền form
        Route::post('/sending'); // check và gửi form
    });

    //// Admin (role = admin)
    Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'], function () {
      Route::get('/logout'); // đăng xuất admin

      // Dashboard
      Route::group(['prefix' => 'dashboard'], function () {
          Route::get('/'); // trang chủ của admin

          // Quản lý Users
          Route::group(['prefix' => 'users'], function () {
            Route::get('/'); // trang chủ của users

            Route::get('/{id}'); // trang detail
            Route::get('/{id}/edit'); // trang edit
            Route::get('/add'); // trang add

            Route::post('/updating'); // post cho edit
            Route::post('/creating'); // post cho add
            Route::post('/delete'); // xóa
          });

          // Quản lý Properties (BDS)
          Route::group(['prefix' => 'properties'], function () {
            Route::get('/'); // trang chủ của properties

            Route::get('/{id}'); // trang detail
            Route::get('/{id}/edit'); // trang edit
            Route::get('/add'); // trang add

            Route::post('/updating'); // post cho edit
            Route::post('/creating'); // post cho add
            Route::post('/delete'); // xóa 
          });

          // Quản lý Inquiries
          Route::group(['prefix' => 'inquiries'], function () {
            Route::get('/'); // trang chủ của inquiries

            Route::get('/{id}'); // trang detail

            Route::post('/delete'); // xóa 
          });

          // Quản lý Feedback (Nhận Xét)
          Route::group(['prefix' => 'feedback'], function () {
            Route::get('/'); // trang chủ của feedback

            Route::get('/{id}'); // trang detail

            Route::post('/delete'); // xóa 
          });
      });
    });
});


// PREVENT 404 ERROR
Route::fallback(function () {
    return redirect('/');
});