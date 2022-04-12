<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('auth-user', [AuthController::class, 'user'])->name('auth.user');
    Route::get('update-status', [GeneralController::class, 'updateStatus'])->name('update.status');

    #region Category
    Route::apiResource('categories', CategoryController::class)->only('store', 'update', 'destroy');
    Route::controller(CategoryController::class)->prefix('categories')->as('categories.')->group(function () {
        Route::get('get-by-id/{id}', 'getById')->name('get_by_id');
        Route::get('get-all', 'getAll')->name('get_all');
        Route::get('get-by-pagination', 'getByPagination')->name('get_by_pagination');
        Route::get('get-by-status-and-ordered/{status}/{param?}', 'getByStatusAndOrdered')->name('get_by_status_order');
        Route::get('get-by-status-and-ordered-desc/{status}/{param?}', 'getByStatusAndOrderedDesc')->name('get_by_status_order_desc');
    });
    #endregion

    #region Blog
    Route::apiResource('blogs', BlogController::class)->only('store', 'update', 'destroy');
    Route::controller(BlogController::class)->prefix('blogs')->as('blogs.')->group(function () {
        Route::get('get-by-id/{id}', 'getById')->name('get_by_id');
        Route::get('get-all', 'getAll')->name('get_all');
        Route::get('get-by-pagination', 'getByPagination')->name('get_by_pagination');
        Route::get('get-by-ordered/{param?}', 'getByOrdered')->name('get_by_order');
        Route::get('get-by-ordered-desc/{param?}', 'getByOrderedDesc')->name('get_by_order_desc');
    });
    #endregion

});
