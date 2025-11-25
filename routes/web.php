<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// xóa cái này ko sao nha :P
Route::get('', [TestController::class, 'index'])
->middleware('testMiddleware');