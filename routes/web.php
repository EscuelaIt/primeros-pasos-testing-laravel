<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TimeStoreController;
use App\Http\Controllers\TimeCreateCustomController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::get('/dashboard/time', function () {
    return view('dashboard.add-time-form');
});

Route::post('/dashboard/time/store', TimeStoreController::class);
Route::get('/dashboard/time/create-custom', TimeCreateCustomController::class);

Route::get('/carrito', [CartController::class, 'show']);

Route::get('/restringida', function() {
    abort(403);
});
