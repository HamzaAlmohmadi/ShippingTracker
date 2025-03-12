<?php

use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShipmentAssignmentController;
use App\Http\Controllers\Backend\TruckController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::middleware('auth')->group(function () {


    Route::get('/dashboard/user', function () {
        return view('user.index');
    })->name('user.dashboard');






        Route::get('/reports', function () {
            return view('admin.reports.index');
        })->name('reports');



    
});



require __DIR__.'/auth.php';
