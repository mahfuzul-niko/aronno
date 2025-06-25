<?php

use App\Http\Controllers\Admin\PagesController;
use Illuminate\Support\Facades\Route;




Route::middleware(['role:admin'])->prefix('admin')->group(function () {



    Route::group(['controller' => PagesController::class,], function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
    });
});