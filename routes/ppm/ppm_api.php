<?php
use App\Http\Controllers\API\Frontend\ArticleController;
use App\Http\Controllers\Backend\FetchController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {

    Route::prefix('filter')->group(function () {
        // category
        Route::get('/changes', [FetchController::class, 'filter']);
    });

    Route::prefix('article')->group(function () {
        // article
        Route::get('/', [ArticleController::class, 'index']);
        Route::post('/store', [ArticleController::class, 'store']);
    });

});