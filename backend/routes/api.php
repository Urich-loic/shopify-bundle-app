<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BundleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/hello', fn() => response()->json(['message' => 'Hello Shopify App']));

Route::get('/auth/install', [AuthController::class, 'install']);
Route::get('/auth/callback', [AuthController::class, 'callback']);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/bundle', [BundleController::class, 'store']);
Route::get('/bundles', [BundleController::class, 'index']);
Route::get('/stats', [StatsController::class, 'index']);
