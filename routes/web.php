<?php
use App\Http\Controllers\DonatorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('donators');
});

Route::get('/donator', function () {
    $donators = []; // Your donators data
    return view('frontend.pages.main.donators', compact('donators'));
})->name('donators');

Route::get('/receivers', function () {
    $receivers = []; // Your receivers data
    return view('frontend.pages.main.receivers', compact('receivers'));
})->name('receivers');

Route::get('/articles', function () {
    $receivers = []; // Your receivers data
    return view('frontend.pages.main.articles');
})->name('articles');

Route::get('/donators', [DonatorController::class, 'donators'])->name('donators');
Route::prefix('admin')->group(function () {

    Route::get('login', function () {
        return view('backend.pages.auth.login');
    })->name('admin.login');

    Route::get('dashboard', function () {
        return view('backend.pages.dashboard.dashboard');
    })->name('admin.dashboard');
});