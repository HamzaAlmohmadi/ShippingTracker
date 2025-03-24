<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentRequest;
use App\Models\City;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserShipmentApiController extends Controller
{
     /**
     * جلب قائمة الشحنات الخاصة بالمستخدم.
     */
    public function index()
    {
        $shipments = Shipment::where('user_id', Auth::id())->get();

        if ($shipments->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'عفواً لا يوجد شحنات لدى هذه المستخدم '
            ], 200);
        }
        else {
            return response()->json([
                'success' => true,
                'data' => $shipments
            ], 200);
        }


    }

    /**
     * حفظ بيانات شحنة جديدة.
     */
    public function store(StoreShipmentRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {
            $senderData = $this->extractSenderData($validatedData);
            $receiverData = $this->extractReceiverData($validatedData);
            $dimensions = $this->calculateDimensions($validatedData);
            $weight = $validatedData['weight'] ?? 16;

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
                'message' => 'تم إنشاء الشحنة بنجاح.',
                'data' => $shipment,
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء إنشاء الشحنة: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * عرض تفاصيل شحنة محددة.
     */
    // public function show($id)
    // {
    //     $shipment = Shipment::where('user_id', Auth::id())->findOrFail($id);

    //     if (!$shipment) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'عفواً، لم يتم العثور على الشحنة المطلوبة.'
    //         ], 404);
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'data' => $shipment
    //     ], 200);
    // }
        
        
    public function show($id)
    {
        // البحث عن الشحنة باستخدام الـ id
        $shipment = Shipment::find($id);
    
        // إذا لم يتم العثور على الشحنة
        if (!$shipment) {
            return response()->json([
                'success' => false,
                'message' => 'عفواً، لم يتم العثور على الشحنة المطلوبة.'
            ], 404);
        }
    
        // إذا كانت الشحنة لا تنتمي إلى المستخدم الحالي
        if ($shipment->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'عفواً، ليس لديك صلاحية الوصول إلى هذه الشحنة.'
            ], 403); // 403 Forbidden
        }
    
        // إذا تم العثور على الشحنة وهي تابعة للمستخدم الحالي
        return response()->json([
            'success' => true,
            'data' => $shipment
        ], 200);
    }


    /**
     * جلب قائمة المدن حسب الدولة.
     */
    public function getCities(Request $request)
    {
        $cities = City::where('country_id', $request->country_id)->get();

        return response()->json([
            'success' => true,
            'data' => $cities
        ], 200);
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




