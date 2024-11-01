<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;

//menambah pengguna
Route::post('/register', [RegisterController::class, 'register']);
//untuk membuat token bagi user yang sudah ada
Route::post('/login', [LoginController::class, 'login']);
//menghapus token
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function(){
     //Product endpoints
     Route::apiResource('products', ProductController::class);
});