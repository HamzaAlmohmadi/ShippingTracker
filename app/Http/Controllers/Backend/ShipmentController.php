<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ShipmentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use Illuminate\Http\Request;
use App\Models\Sender;
use App\Models\Receiver;
use App\Models\Shipment;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Strings;

class ShipmentController extends Controller
{




        /**
     * عرض قائمة الشحنات.
     */
    public function index(ShipmentDataTable $dataTable)
    {
        return $dataTable->render('admin.shipment.index');
    }

    /**
     * عرض نموذج إنشاء شحنة جديدة.
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.shipment.create', compact('countries'));
    }

    /**
     * حفظ بيانات الشحنة الجديدة.
     */
    public function store(StoreShipmentRequest $request)
    {
        // جلب البيانات المُتحقق منها
        $validatedData = $request->validated();
    
        DB::beginTransaction();
        try {
            // استخراج بيانات المرسل والمستقبل باستخدام دوال مستقلة
            $senderData = $this->extractSenderData($validatedData);
            $receiverData = $this->extractReceiverData($validatedData);
            $dimensions = $this->calculateDimensions($validatedData);
            $weight = $validatedData['weight'] ?? null;
    
            // حفظ بيانات الشحنة
            $shipment = Shipment::create([
                'tracking_number' => Shipment::generateTrackingNumber(),
                'status' => 'pending',
                'weight' => $weight,
                'notes' => $validatedData['notes'] ?? null,
                'user_id' => Auth::user()->id,
                'from_country_id' => $validatedData['from_country_id'],
                'from_city_id' => $validatedData['from_city_id'],
                'to_country_id' => $validatedData['to_country_id'],
                'to_city_id' => $validatedData['to_city_id'],
                'sender_data' => json_encode($senderData),
                'receiver_data' => json_encode($receiverData),
                'driver_id' => 1,
                'shipping_date' => now(),
                'estimated_delivery_date' => $request->estimated_delivery_date,
                'actual_delivery_date' => $request->actual_delivery_date,
                'package_type' => $validatedData['package_type'],
                'dimensions' => json_encode($dimensions),
                'payment_status' => $validatedData['payment_status'],
                'payment_method' => $validatedData['payment_method'],
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'تم حفظ البيانات بنجاح.',
                'data' => $shipment,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء حفظ البيانات: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * عرض تفاصيل شحنة محددة.
     */
    public function show($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipment.show', compact('shipment'));
    }

    /**
     * عرض نموذج تعديل شحنة محددة.
     */
    public function edit($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->sender_data = json_decode($shipment->sender_data, true);
        $shipment->receiver_data = json_decode($shipment->receiver_data, true);
        $shipment->dimensions = json_decode($shipment->dimensions, true);

        $countries = Country::all();
        $cities = City::all();

        return view('admin.shipment.edit', compact('shipment', 'countries', 'cities'));
    }

    /**
     * تحديث بيانات شحنة محددة.
     */
    public function update(UpdateShipmentRequest $request, $shipmentId)
    {
        // جلب البيانات المُتحقق منها
        $validatedData = $request->validated();
    
        DB::beginTransaction();
        try {
            // استخراج بيانات المرسل والمستقبل باستخدام دوال مستقلة
            $senderData = $this->extractSenderData($validatedData);
            $receiverData = $this->extractReceiverData($validatedData);
            $dimensions = $this->calculateDimensions($validatedData);
            $weight = $validatedData['weight'] ?? null;
    
            // البحث عن الشحنة المحددة
            $shipment = Shipment::findOrFail($shipmentId);
    
            // تحديث بيانات الشحنة
            $shipment->update([
                'status' => $validatedData['status'] ?? $shipment->status,
                'weight' => $weight,
                'notes' => $validatedData['notes'] ?? $shipment->notes,
                'from_country_id' => $validatedData['from_country_id'] ?? $shipment->from_country_id,
                'from_city_id' => $validatedData['from_city_id'] ?? $shipment->from_city_id,
                'to_country_id' => $validatedData['to_country_id'] ?? $shipment->to_country_id,
                'to_city_id' => $validatedData['to_city_id'] ?? $shipment->to_city_id,
                'sender_data' => json_encode($senderData),
                'receiver_data' => json_encode($receiverData),
                'driver_id' => $validatedData['driver_id'] ?? $shipment->driver_id,
                'shipping_date' => $validatedData['shipping_date'] ?? $shipment->shipping_date,
                'estimated_delivery_date' => $validatedData['estimated_delivery_date'] ?? $shipment->estimated_delivery_date,
                'actual_delivery_date' => $validatedData['actual_delivery_date'] ?? $shipment->actual_delivery_date,
                'package_type' => $validatedData['package_type'] ?? $shipment->package_type,
                'dimensions' => json_encode($dimensions),
                'payment_status' => $validatedData['payment_status'] ?? $shipment->payment_status,
                'payment_method' => $validatedData['payment_method'] ?? $shipment->payment_method,
            ]);
    
            DB::commit();
    
            return response()->json([
                'success' => true,
                'message' => 'تم تحديث البيانات بنجاح.',
                'data' => $shipment,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
    
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث البيانات: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * حذف شحنة محددة.
     */
    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();

        return response()->json(['status' => 'success', 'message' => 'تم حذف الشحنة بنجاح']);
    }

    /**
     * جلب المدن بناءً على البلد.
     */
    public function getCities(Request $request)
    {
        $cities = City::where('country_id', $request->country_id)->get();
        return response()->json($cities);
    }

    /**
     * استخراج بيانات المرسل من البيانات المُدخلة.
     */
    private function extractSenderData(array $data): array
    {
        return [
            'name' => $data['sender_name'],
            'phone' => $data['sender_phone'],
            'email' => $data['sender_email'] ?? null,
            'district' => $data['sender_district'],
            'street' => $data['sender_street'],
            'building' => $data['sender_building'],
            'floor' => $data['sender_floor'] ?? null,
            'additional_info' => $data['sender_additional_info'] ?? null,
        ];
    }

    /**
     * استخراج بيانات المستقبل من البيانات المُدخلة.
     */
    private function extractReceiverData(array $data): array
    {
        return [
            'name' => $data['receiver_name'],
            'phone' => $data['receiver_phone'],
            'district' => $data['receiver_district'],
            'street' => $data['receiver_street'],
            'building' => $data['receiver_building'],
            'floor' => $data['receiver_floor'] ?? null,
            'additional_info' => $data['receiver_additional_info'] ?? null,
        ];
    }

    /**
     * حساب أبعاد الطرد بناءً على نوعه.
     */
    private function calculateDimensions(array $data): array
    {
        if ($data['package_type'] === 'صندوق') {
            return [
                'type' => 'صندوق',
                'length' => $data['length'],
                'width' => $data['width'],
                'price' => $data['length'] * $data['width'] * 100,
            ];
        }

        if ($data['package_type'] === 'ظرف') {
            return [
                'type' => 'ظرف',
                'weight' => $data['weight'],
                'thickness' => $data['thickness'],
                'price' => $data['weight'] * $data['thickness'] * 10,
            ];
        }

        return [];
    }






}






