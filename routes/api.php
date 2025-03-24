<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\UserDashboardController;
use App\Http\Controllers\Api\UserShipmentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');












Route::post('/login', [AuthController::class, 'login'])->name('login.api');
Route::post('/register', [AuthController::class, 'register'])->name('register.api');

Route::post('/api/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');





Route::middleware(['auth:sanctum'])->prefix('/user')->group(function () {
    


    Route::get('/cities', [CityController::class, 'getCities']);
    
    // لوحة تحكم المستخدم
    Route::get('/dashboard/home', [UserDashboardController::class, 'index']);

    // تقارير المستخدم
    Route::get('/dashboard/reports', [UserDashboardController::class, 'reports']);

    // تتبع الشحنة
    // Route::get('/shipment-tracking', [UserShipmentTrackingController::class, 'track']);
    Route::post('/dashboard/shipment-tracking', [UserDashboardController::class, 'track']);

    // شحنات المستخدم
    Route::get('/dashboard/shipments', [UserShipmentApiController::class, 'index']);
    Route::post('/dashboard/shipments/create', [UserShipmentApiController::class, 'store']);
    Route::get('/dashboard/shipments/show/{id}', [UserShipmentApiController::class, 'show']);



});