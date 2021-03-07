<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TimeLineController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'api'], function() {
    Route::get('/me', [AuthController::class, 'user']);
    Route::get('/timeline', [TimeLineController::class, 'index']);
});
