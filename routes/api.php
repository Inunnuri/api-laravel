<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Product\ProductController;

//menambah pengguna
Route::post('/register', [RegisterController::class, 'register']);
//untuk membuat token bagi user yang sudah ada
Route::post('/login', [LoginController::class, 'login']);
//menghapus token
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function(){
     //Product endpoints
     Route::get('/products', [ProductController::class, 'index']);
     Route::post('/products', [ProductController::class, 'store']);
     Route::post('/products/{id}', [ProductController::class, 'update']);
     Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});