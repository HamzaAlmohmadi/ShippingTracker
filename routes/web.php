<?php

use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShipmentAssignmentController;
use App\Http\Controllers\Backend\TruckController;
use App\Http\Controllers\frontend\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ShipmentTrackingController;
use App\Http\Controllers\frontend\UserShipmentController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;




Route::get('/',[HomeController::class, 'index'])->name('home');



Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/services',[HomeController::class, 'services'])->name('services');
Route::get('/testimonials',[HomeController::class, 'testimonials'])->name('testimonials');
Route::get('/pricing',[HomeController::class, 'pricing'])->name('pricing');
Route::get('/hero',[HomeController::class, 'hero'])->name('hero');
Route::get('/features',[HomeController::class, 'features'])->name('features');
Route::get('/featured',[HomeController::class, 'featured'])->name('featured');
Route::get('/faq',[HomeController::class, 'faq'])->name('faq');
Route::get('/contact',[HomeController::class, 'contact'])->name('contact');

Route::get('/get-a-quote',[HomeController::class, 'get_a_quote'])->name('get-a-quote');
Route::get('/hipment-tracking',[HomeController::class, 'track'])->name('shipment-tracking');





//         Route::get('/dashboard/shipment-tracking', [DashboardController::class, 'track'])->name('shipment-tracking.index');






// Route::get('/dashboard/product-traking', [DashboardController::class, 'show'])->name('product-traking.index');



Route::group(['middleware' =>['auth',], 'prefix' => 'user', 'as' => 'user.'], function(){
    // لوحة تحكم المستخدم
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // تقارير المستخدم
    Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->name('dashboard.reports');

    // تتبع الشحنة
    Route::get('/dashboard/shipment-tracking', [ShipmentTrackingController::class, 'track'])->name('shipment-tracking.track');


    // شحنات المستخدم
    Route::get('/shipments', [UserShipmentController::class, 'index'])->name('shipments.index');
    Route::get('/shipments/create', [UserShipmentController::class, 'create'])->name('shipments.create');
    Route::post('/shipments/store', [UserShipmentController::class, 'store'])->name('shipments.store');
    Route::get('/shipments/show/{id}', [UserShipmentController::class, 'show'])->name('shipments.show');
});


require __DIR__.'/auth.php';














