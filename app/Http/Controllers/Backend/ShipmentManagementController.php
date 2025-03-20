<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AllShipmentsDataTable;
use App\DataTables\AtDistributionCenterShipmentsDataTable;
use App\DataTables\CanceledShipmentsDataTable;
use App\DataTables\CustomsClearanceShipmentsDataTable;
use App\DataTables\CustomsHeldShipmentsDataTable;
use App\DataTables\DelayedShipmentsDataTable;
use App\DataTables\DeliveredShipmentsDataTable;
use App\DataTables\InTransitShipmentsDataTable;
use App\DataTables\OutForDeliveryShipmentsDataTable;
use App\DataTables\PendingShipmentsDataTable;
use App\DataTables\ReceivedShipmentsDataTable;
use App\DataTables\ReturnedShipmentsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentManagementController extends Controller
{


    // كل الشحنات
    public function allShipments(AllShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.all_shipments');
    }

    // 1. الشحنات قيد الانتظار
    public function pendingShipments(PendingShipmentsDataTable $dataTable)
    {
        $drivers = Driver::all();
        return $dataTable->render('admin.shipment_management.pending_index', compact('drivers'));
    }

    // 2. الشحنات التي تم استلامها
    public function receivedShipments(ReceivedShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.received_index');
    }

    // 3. الشحنات في الطريق
    public function inTransitShipments(InTransitShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.in_transit_index');
    }

    // 4. الشحنات قيد التخليص الجمركي
    public function customsClearanceShipments(CustomsClearanceShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.customs_clearance_index');
    }

    // 5. الشحنات المحتجزة في الجمارك
    public function customsHeldShipments(CustomsHeldShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.customs_held_index');
    }

    // 6. الشحنات في مركز التوزيع
    public function atDistributionCenterShipments(AtDistributionCenterShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.at_distribution_center_index');
    }

    // 7. الشحنات في الطريق للتوصيل
    public function outForDeliveryShipments(OutForDeliveryShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.out_for_delivery_index');
    }


    // 8. الشحنات التي تم توصيلها
    public function deliveredShipments(DeliveredShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.delivered_index');
    }





    // 11. الشحنات الملغاة
    public function canceledShipments(CanceledShipmentsDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment_management.canceled_index');
    }




    // public function show(string $id)
    // {
    //     //  dd($id);
    //     $shipment = Shipment::findOrFail($id);

    //     return view('admin.shipment_management.show', compact('shipment'));
    // }

    public function show(string $id)
    {
        // جلب بيانات الشحنة
        $shipment = Shipment::findOrFail($id);
    
        // تحويل الحقول JSON إلى مصفوفة
        $shipment->sender_data = json_decode($shipment->sender_data, true);
        $shipment->receiver_data = json_decode($shipment->receiver_data, true);
        $shipment->dimensions = json_decode($shipment->dimensions, true);
    
        // إرسال البيانات إلى العرض
        return view('admin.shipment_management.show', compact('shipment'));
    }



    public function changeShipmentStatus(Request $request)
    {

        $order = Shipment::findOrFail($request->id);
        $order->status = $request->status;
        $order->save();

        return response(['status' => 'success', 'message' => 'تم تغيير حالة الشحنة  بنجاح!']);
    }

}


