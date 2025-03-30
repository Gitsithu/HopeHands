<?php

use App\Http\Controllers\API\Frontend\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('test-api', function () {
    return 'test-api';
});

Route::post('donator/register', [AuthUserController::class, 'register'])->name('donator.register');

Route::prefix('donator')->group(function () {
    //
});