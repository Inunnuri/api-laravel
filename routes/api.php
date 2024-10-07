<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//menambah pengguna
Route::post('/register', [RegisterController::class, 'register']);


//untuk membuat token
Route::post('/login', [LoginController::class, 'login']);
//menghapus token
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function(){
    // Task endpoints
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);

     // Product endpoints
    //  Route::get('/products', [ProductController::class, 'index']);
    //  Route::post('/products', [ProductController::class, 'store']);
    //  Route::put('/products/{id}', [ProductController::class, 'update']);
    //  Route::delete('/products/{id}', [ProductController::class, 'destroy']);


});