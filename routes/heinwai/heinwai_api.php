<?php

use App\Http\Controllers\API\Frontend\AuthUserController;
use Illuminate\Support\Facades\Route;

Route::get('test-api', function () {
    return 'test-api';
});

Route::post('admin/donator/register', [AuthUserController::class, 'register']);
Route::post('admin/donator/login', [AuthUserController::class, 'login']);

Route::prefix('admin/donator')->group(function () {
    //
    Route::post('logout', [AuthUserController::class, 'logout'])->middleware('authCustom');
    Route::post('remark', [AuthUserController::class, 'remark'])->middleware('authCustom');

    Route::get('/', [AuthUserController::class, 'lists']);
});