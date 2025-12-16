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
use App\Http\Controllers\user\FeedbackController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPropertyController;
use App\Http\Controllers\Admin\AdminInquiryController;
use App\Http\Controllers\Admin\AdminFeedbackController;


/* ===========================
    GUEST ROUTES
=========================== */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/about_us', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::get('/buy', [PropertyController::class, 'listing'])->defaults('category', 'buy')->name('buy');
Route::get('/rent', [PropertyController::class, 'listing'])->defaults('category', 'rent')->name('rent');
Route::get('/featured', [PropertyController::class, 'listing'])->defaults('category', 'featured')->name('featured');

Route::get('/property/{id}', [PropertyController::class, 'detail'])->name('property.detail');

Route::post('inquiry/sending', [ContactController::class, 'sendInquiry'])->name('inquiry.send');


/* ===========================
    AUTH ROUTES
=========================== */

Route::group(['middleware' => 'loggedinMiddleware'], function () {

    // Register
    Route::prefix('register')->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name('register');
        Route::post('/creating', [RegisterController::class, 'creating'])->name('register.create');
    });

    // Login
    Route::prefix('login')->group(function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/checking', [LoginController::class, 'checking'])->name('login.check');
    });
});


/* ===========================
    USER ROUTES
=========================== */

Route::middleware(['userMiddleware'])->group(function () {

    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    Route::get('/logout', [LogoutController::class, 'index'])->name('logout');

    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('/change_password', [SettingsController::class, 'changePassword'])->name('settings.change_password');
        Route::post('/update_new_password', [SettingsController::class, 'updatePassword'])->name('settings.update_password');
        Route::post('/updating', [SettingsController::class, 'updateProfile'])->name('settings.update_profile');
    });
});


/* ===========================
    ADMIN ROUTES
=========================== */

Route::group(['prefix' => 'admin', 'middleware' => 'adminMiddleware'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Logout Admin
    Route::get('/logout', function () {
        return redirect('/');
    })->name('admin.logout');


    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


    /* =======================
            USERS
    ======================= */
    Route::prefix('dashboard/users')->group(function () {

        Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/add', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/creating', [AdminUserController::class, 'store'])->name('admin.users.store');

        Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');

        // ⭐ UPDATE – POST + {id}
        Route::post('/updating/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');

        // ⭐ DELETE – POST
        Route::post('/delete', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
    });


    /* =======================
          PROPERTIES
    ======================= */
    Route::prefix('dashboard/properties')->group(function () {

    // LIST
    Route::get('/', [AdminPropertyController::class, 'index'])
        ->name('admin.properties.index');

    // CREATE
    Route::get('/add', [AdminPropertyController::class, 'create'])
        ->name('admin.properties.create');

    // STORE (POST)
    Route::post('/creating', [AdminPropertyController::class, 'store'])
        ->name('admin.properties.store');

    // EDIT VIEW
    Route::get('/{id}/edit', [AdminPropertyController::class, 'edit'])
        ->name('admin.properties.edit');

    // UPDATE (PUT)
    Route::put('/updating/{id}', [AdminPropertyController::class, 'update'])
        ->name('admin.properties.update');

    // DELETE (POST)
    Route::post('/delete', [AdminPropertyController::class, 'destroy'])
        ->name('admin.properties.delete');
});



    /* =======================
          INQUIRIES
    ======================= */
    Route::prefix('dashboard/inquiries')->group(function () {

        Route::get('/', [AdminInquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::get('/{id}', [AdminInquiryController::class, 'show'])->name('admin.inquiries.show');
        Route::post('/delete', [AdminInquiryController::class, 'destroy'])->name('admin.inquiries.delete');
    });


    /* =======================
            FEEDBACK
    ======================= */
    Route::prefix('dashboard/feedback')->group(function () {

        Route::get('/', [AdminFeedbackController::class, 'index'])->name('admin.feedback.index');
        Route::get('/{id}', [AdminFeedbackController::class, 'show'])->name('admin.feedback.show');
        Route::post('/delete', [AdminFeedbackController::class, 'destroy'])->name('admin.feedback.delete');
    });

});

// PREVENT 404 ERROR NOT FOUND
Route::fallback(function () {
    return redirect('');
});