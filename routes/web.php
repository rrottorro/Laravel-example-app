<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\UserController::class, 'index']);

Route::get('/register', [App\Http\Controllers\UserController::class, 'create']);

Route::post('/register', [App\Http\Controllers\UserController::class, 'store']);
