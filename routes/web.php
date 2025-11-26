<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;

// xóa cái này ko sao nha :P
Route::get('', [TestController::class, 'index'])
->middleware('testMiddleware');

// Authentication Routes - Task 4.1: Client-side validation
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);