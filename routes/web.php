<?php

use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShipmentAssignmentController;
use App\Http\Controllers\Backend\TruckController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('frontend.home.index');
})->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});






Route::middleware('auth')->group(function () {


        Route::get('/reports', function () {
            return view('admin.reports.index');
        })->name('reports');



    
});



require __DIR__.'/auth.php';
