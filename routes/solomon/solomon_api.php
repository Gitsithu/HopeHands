<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthUserController;
use App\Http\Controllers\Backend\Admin\RoleController;
use App\Http\Controllers\Backend\Admin\TermController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\Admin\CurrencyController;
use App\Http\Controllers\Backend\Admin\PermissionController;
use App\Http\Controllers\Backend\Admin\UserProfitController;
use App\Http\Controllers\Backend\Admin\WithdrawalController;
use App\Http\Controllers\Backend\Admin\ContactFormController;
use App\Http\Controllers\Backend\Admin\TransactionController;
use App\Http\Controllers\Backend\Admin\ProfitSettingController;
use App\Http\Controllers\Backend\Admin\PublicContentController;
use App\Http\Controllers\Backend\Admin\CurrencyConversionController;
use App\Http\Controllers\Backend\DivisionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin')->group(function () {
    Route::prefix('division')->group(function () {
        // Role
        Route::get('/', [DivisionController::class, 'index']);
        Route::post('store', [DivisionController::class, 'store']);
        Route::post('update/{id}', [DivisionController::class, 'update']);
        Route::delete('delete/{id}', [DivisionController::class, 'delete']);
    });
});
