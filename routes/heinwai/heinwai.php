<?php

use Illuminate\Support\Facades\Route;

Route::get('test', function () {
    return 'test';
})->name('test');

Route::prefix('donators')->group(function () {
    Route::get('create', function () {
        return view('frontend.pages.auth.register');
    })->name('donator.create');

    Route::get('login', function () {
        return view('frontend.pages.auth.login');
    })->name('donator.login');

});