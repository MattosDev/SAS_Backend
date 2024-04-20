<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StoreController;

Route::post('/login', [LoginController::class, 'loginApi']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logoutApi']);
    Route::resource('books', BookController::class);
    Route::resource('stores', StoreController::class);
});
