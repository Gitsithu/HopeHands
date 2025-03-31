<?php
use App\Http\Controllers\Backend\FetchController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {

    Route::prefix('filter')->group(function () {
        // category
        Route::get('/changes', [FetchController::class, 'filter']);
    });

});