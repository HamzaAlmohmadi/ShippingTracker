
<?php

use App\Http\Controllers\Backend\DriverController;
use App\Http\Controllers\Backend\ShipmentAssignmentController;
use App\Http\Controllers\Backend\ShipmentManagementController;
use App\Http\Controllers\Backend\TruckController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    // Route::get('/trucks/destory', [TruckController::class, 'destory'])->name('trucks.destroy');


    Route::get('/shipments', function () {
        return view('livewire.show_from');
    })->name('shipments');



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