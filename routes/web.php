<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PropertyController; // Gọi Controller vừa tạo

// xóa cái này ko sao nha :P
Route::get('/', [TestController::class, 'index'])
->middleware('testMiddleware');
