<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/// Guest
use App\Http\Controllers\guest\GuestController;
use App\Http\Controllers\guest\LoginController;
use App\Http\Controllers\guest\RegisterController;
use App\Http\Controllers\guest\CategoriesController;

/// User
/// Admin

// Routes
Route::group(['prefix' => ''], function () {
    //// Guest
    Route::get('/', [GuestController::class, 'home']); // trang chủ (home)
    Route::get('/search'); // trang tìm kiếm (search bar)
    Route::get('/about_us', [GuestController::class, 'about_us']); // trang về chúng tôi (about us)
    Route::get('/contact', [GuestController::class, 'contact']); // trang contact
    Route::get('/buy', [CategoriesController::class, 'buy']); // trang danh mục cho mua (category = buy)
    Route::get('/rent', [CategoriesController::class, 'rent']); // trang danh mục cho thuê (category = rent)
    Route::get('/featured', [CategoriesController::class, 'featured']); // trang danh mục nổi bật (category = rent)
    Route::get('/property/{id}'); // trang chi tiết BDS
    
    // Register
    Route::group(['prefix' => 'register', 'middleware' => 'loggedinMiddleware'], function () {
        Route::get('/', [RegisterController::class, 'register']); // trang điền form
        Route::post('/creating'); // check và tạo account mới
    });

    // Log in
    Route::group(['prefix' => 'login', 'middleware' => 'loggedinMiddleware'], function () {
        Route::get('/', [LoginController::class, 'login']); // trang điền form
        
        Route::post('/checking'); // check và redirect tới trang chủ
    });

    // POST METHOD
    Route::post('inquiry/sending'); // check và gửi lên database
    Route::post('searching'); // check và đưa kết quả
    
    //// User (Logged In/Đã Đăng Nhập) 

    Route::post('/logout')->middleware('userMiddleware'); // đăng xuất user
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