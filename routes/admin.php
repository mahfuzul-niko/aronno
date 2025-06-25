<?php

use App\Http\Controllers\Admin\PagesController;
use Illuminate\Support\Facades\Route;




Route::middleware(['role:admin'])->prefix('admin')->group(function () {


    Route::get('/dashboard', function () {
        dd('admin dashboard');
    });
    
});