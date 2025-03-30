<?php

use App\Http\Controllers\API\Frontend\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('test-api', function () {
    return 'test-api';
});

Route::post('donator/register', [AuthUserController::class, 'register']);
Route::post('donator/login', [AuthUserController::class, 'login']);

Route::prefix('donator')->group(function () {
    //
    Route::post('logout', [AuthUserController::class, 'logout'])->middleware('authCustom');
    Route::post('remark', [AuthUserController::class, 'remark'])->middleware('authCustom');

    Route::get('/', [AuthUserController::class, 'lists']);
});