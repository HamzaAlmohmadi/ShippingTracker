
<?php

use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShipmentAssignmentController;
use App\Http\Controllers\Backend\ShipmentController;
use App\Http\Controllers\Backend\ShipmentManagementController;
use App\Http\Controllers\Backend\TruckController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');





    Route::get('/shipments', function () {
        return view('livewire.show_from');
    })->name('shipments');






Route::get('/shipment', [ShipmentController::class, 'index'])->name('shipment.index');
Route::get('/shipment/create', [ShipmentController::class, 'create'])->name('shipment.create');
Route::post('/shipment/store', [ShipmentController::class, 'store'])->name('shipment.store');
Route::get('/shipment/edit/{id}', [ShipmentController::class, 'edit'])->name('shipment.edit');
Route::post('/shipment/update/{id}', [ShipmentController::class, 'update'])->name('shipment.update');
Route::delete('/shipment/destroy/{id}', [ShipmentController::class, 'destroy'])->name('shipment.destroy');
Route::get('/api/cities', [ShipmentController::class, 'getCities']);




    Route::resource('trucks', TruckController::class);

    Route::resource('drivers', DriverController::class);

    
    Route::get('/driver/{driver_id}/details', [DriverController::class, 'details'])->name('driver.details');



        Route::get('/shipment/all',[ShipmentManagementController::class,'allShipments'])->name('shipment.allShipments');
        
        Route::get('/shipment/pending',[ShipmentManagementController::class,'pendingShipments'])->name('shipment.pendingShipments');

        Route::get('/shipment/received',[ShipmentManagementController::class,'receivedShipments'])->name('shipment.receivedShipments');

        Route::get('/shipment/inTransit',[ShipmentManagementController::class,'inTransitShipments'])->name('shipment.inTransitShipments');

        Route::get('/shipment/customsClearance',[ShipmentManagementController::class,'customsClearanceShipments'])->name('shipment.customsClearanceShipments');

        Route::get('/shipment/customsHeld',[ShipmentManagementController::class,'customsHeldShipments'])->name('shipment.customsHeldShipments');

        Route::get('/shipment/atDistributionCenter',[ShipmentManagementController::class,'atDistributionCenterShipments'])->name('shipment.atDistributionCenterShipments');

        Route::get('/shipment/outForDelivery',[ShipmentManagementController::class,'outForDeliveryShipments'])->name('shipment.outForDeliveryShipments');

        Route::get('/shipment/delivered',[ShipmentManagementController::class,'deliveredShipments'])->name('shipment.deliveredShipments');

        Route::get('/shipment/canceled',[ShipmentManagementController::class,'canceledShipments'])->name('shipment.canceledShipments');

        Route::get('/shipment/status', [ShipmentManagementController::class, 'changeShipmentStatus'])->name('shipment.status');

        Route::get('/shipment/show/{id}',[ShipmentManagementController::class,'show'])->name('shipment.show');





        
require __DIR__.'/auth.php';