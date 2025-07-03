<?php

use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoomController;
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
    Route::group(['controller' => CategoryController::class, 'as' => 'category.'], function () {
        Route::get('/categories', 'index')->name('index');
        Route::post('/category/store', 'storeCategory')->name('store');
        Route::post('/category/update/{category}', 'updateCategory')->name('update');
        Route::delete('/category/delete/{category}', 'deleteCategory')->name('delete');
    });

    Route::group(['controller' => CategoryController::class, 'as' => 'feature.'], function () {
        Route::get('/features', 'features')->name('index');
        Route::post('/feature/store', 'storeFeature')->name('store');
        Route::post('/feature/update/{feature}', 'updateFeature')->name('update');
        Route::delete('/feature/delete/{feature}', 'deleteFeature')->name('delete');
    });

    Route::group(['controller' => RoomController::class, 'as' => 'room.'], function () {
        Route::get('/rooms', 'rooms')->name('index');
        Route::get('/room/create', 'create')->name('create');
        Route::post('/room/store', 'store')->name('store');
        Route::get('/room/view/{room:slug}', 'view')->name('view');
        Route::get('/room/edit/{room:slug}', 'edit')->name('edit');
        Route::post('/room/update/{room}', 'update')->name('update');
        Route::delete('/room/delete/{room}', 'delete')->name('delete');
    });
    Route::group(['controller' => BookingController::class, 'as' => 'booking.'], function () {
        Route::get('/booking', 'booking')->name('index');
        Route::post('/booking/checkout', 'checkout')->name('checkout');
        Route::get('/booking/checkout/page', 'checkoutPage')->name('checkout.page');
        Route::post('/booking/store', 'store')->name('store');
        Route::get('/booking/view/{booking:slug}', 'view')->name('view');
        Route::get('/booking/edit/{booking:slug}', 'edit')->name('edit');
        Route::post('/booking/update/{booking}', 'update')->name('update');
        Route::delete('/booking/delete/{booking}', 'delete')->name('delete');
        
        Route::post('/booking/make-available/{room}', 'makeAvailable')->name('make-available');
        Route::post('/booking/store', 'store')->name('store');
        Route::get('/booking/list', 'list')->name('list');

    });


});