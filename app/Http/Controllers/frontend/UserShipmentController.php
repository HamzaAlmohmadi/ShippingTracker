<?php

namespace App\Http\Controllers\frontend;

use App\DataTables\UserShipmentsDataTable;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreShipmentRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserShipmentController extends Controller
{
    /**
     * عرض قائمة الشحنات الخاصة بالمستخدم.
     */
    public function index()
    {
        // جلب الشحنات الخاصة بالمستخدم الحالي
        $shipments = Shipment::where('user_id', Auth::id())->get();
        return view('frontend.dashboard.shipment.index', compact('shipments'));
    }

    

    /**
     * عرض نموذج إنشاء شحنة جديدة.
     */
    public function create()
    {
        $countries = Country::all();
        return view('frontend.dashboard.shipment.create', compact('countries'));
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
        // جلب الشحنة مع التأكد من أنها تخص المستخدم الحالي
        $shipment = Shipment::where('user_id', Auth::id())->findOrFail($id);
        return view('frontend.dashboard.shipment.show', compact('shipment'));
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
