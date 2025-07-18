<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});