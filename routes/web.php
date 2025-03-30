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
Route::prefix('admin')->group(function () {

    Route::get('login', function () {
        return view('backend.pages.auth.login');
    })->name('admin.login');

    Route::get('dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('admin.dashboard');
});
