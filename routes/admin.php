<?php

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;




Route::middleware(['role:admin'])->prefix('admin')->group(function () {
    Route::group(['controller' => PagesController::class,], function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});
Route::middleware(['role:agent,admin'])->prefix('agent')->group(function () {
    Route::group(['controller' => PagesController::class,], function () {
        Route::get('/dashboard', 'agentdashboard')->name('agent.dashboard');
    });
});
Route::middleware(['role:agent,admin'])->prefix('admin')->group(function () {
    Route::group(['controller' => PagesController::class,], function () {
        Route::get('/profile', 'profile')->name('profile');
    });
    Route::group([ 'controller' => CategoryController::class,'as' => 'category.'], function () {
        Route::get('/categories', 'index')->name('index');
        Route::post('/category/store', 'storeCategory')->name('store');
        Route::post('/category/update/{category}', 'updateCategory')->name('update');
        Route::delete('/category/delete/{category}', 'deleteCategory')->name('delete');
    });

    Route::group([ 'controller' => CategoryController::class,'as' => 'feature.'], function () {
        Route::get('/features', 'features')->name('index');
        Route::post('/feature/store', 'storeFeature')->name('store');
        Route::post('/feature/update/{feature}', 'updateFeature')->name('update');
        Route::delete('/feature/delete/{feature}', 'deleteFeature')->name('delete');
    });


});