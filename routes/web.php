<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeStoreController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard/time', function () {
    return view('dashboard.add-time-form');
});

Route::post('/dashboard/time/store', TimeStoreController::class);
