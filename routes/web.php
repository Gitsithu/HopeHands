<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.pages.main.main'); // Load main.blade.php
});

Route::get('/donators', function () {
    $donators = []; // Your donators data
    return view('frontend.pages.main.donators', compact('donators'));
})->name('donators');

Route::get('/receivers', function () {
    $receivers = []; // Your receivers data
    return view('frontend.pages.main.receivers', compact('receivers'));
})->name('receivers');

Route::get('/donators', [App\Http\Controllers\DonatorController::class, 'donators'])->name('donators');