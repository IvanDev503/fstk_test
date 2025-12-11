<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::post('/validate-user', [ValidationController::class, 'validateUser']);
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
});
