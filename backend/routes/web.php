<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/install', [AuthController::class, 'install']);
Route::get('/auth/callback', [AuthController::class, 'callback']);
