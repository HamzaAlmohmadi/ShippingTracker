<?php

use App\Http\Controllers\Backend\DriverProfileController;
use Illuminate\Support\Facades\Route;


    Route::middleware('auth')->group(function () {



    Route::get('/dashboard/driver', function () {
        return view('driver.dashboard.Dashboard');
    })->name('dashboard.driver');

    
    Route::resource('profile',DriverProfileController::class);
    
        
    });