<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {

    Route::get('login', function () {
        return view('backend.pages.auth.login');
    })->name('admin.login');

    Route::get('dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('admin.dashboard');
});