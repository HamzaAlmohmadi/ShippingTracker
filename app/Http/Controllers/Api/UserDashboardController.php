<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
        /**
     * جلب بيانات لوحة تحكم المستخدم.
     */
    // public function index()
    // {
    //     $user = Auth::user();
    //     $shipments = $user->shipments()->latest()->take(2)->get();

    //     $shipmentStatuses = [
    //         'pending' => ['status' => 'قيد الانتظار', 'details' => 'تم استلام طلب الشحنة وجاري التحضير'],
    //         'received' => ['status' => 'تم الاستلام', 'details' => 'تم استلام الشحنة في مستودع الشركة'],
    //         'in_transit' => ['status' => 'في الطريق', 'details' => 'الشحنة في طريقها إلى الوجهة التالية'],
    //         'customs_clearance' => ['status' => 'جاري التخليص الجمركي', 'details' => 'الشحنة قيد التخليص الجمركي'],
    //         'customs_held' => ['status' => 'محتجزة في الجمارك', 'details' => 'الشحنة محتجزة لمراجعة إضافية'],
    //         'out_for_delivery' => ['status' => 'في الطريق للتوصيل', 'details' => 'الشحنة في طريقها للتوصيل'],
    //         'at_distribution_center' => ['status' => 'في مراكز التوزيع', 'details' => 'الشحنة في مراكز التوزيع'],
    //         'delivered' => ['status' => 'تم التوصيل', 'details' => 'تم تسليم الشحنة بنجاح'],
    //         'canceled' => ['status' => 'ملغية', 'details' => 'تم إلغاء الشحنة'],
    //     ];

    //     return response()->json([
    //         'success' => true,
    //         'data' => [
    //             'shipments' => $shipments,
    //             'shipmentStatuses' => $shipmentStatuses
    //         ]
    //     ], 200);
    // }

    public function index()
    {
        $user = Auth::user();
        $shipments = $user->shipments()->latest()->take(5)->get();
    
        // تعريف حالات الشحن
        $shipmentStatuses = [
            'pending' => ['status' => 'قيد الانتظار', 'details' => 'تم استلام طلب الشحنة وجاري التحضير'],
            'received' => ['status' => 'تم الاستلام', 'details' => 'تم استلام الشحنة في مستودع الشركة'],
            'in_transit' => ['status' => 'في الطريق', 'details' => 'الشحنة في طريقها إلى الوجهة التالية'],
            'customs_clearance' => ['status' => 'جاري التخليص الجمركي', 'details' => 'الشحنة قيد التخليص الجمركي'],
            'customs_held' => ['status' => 'محتجزة في الجمارك', 'details' => 'الشحنة محتجزة لمراجعة إضافية'],
            'out_for_delivery' => ['status' => 'في الطريق للتوصيل', 'details' => 'الشحنة في طريقها للتوصيل'],
            'at_distribution_center' => ['status' => 'في مراكز التوزيع', 'details' => 'الشحنة في مراكز التوزيع'],
            'delivered' => ['status' => 'تم التوصيل', 'details' => 'تم تسليم الشحنة بنجاح'],
            'canceled' => ['status' => 'ملغية', 'details' => 'تم إلغاء الشحنة'],
        ];
    
        // التحقق من وجود شحنات
        if ($shipments->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'لا توجد شحنات خاصة بهذا المستخدم.',
                'data' => []
            ], 200);
        }
    
        // إذا كانت هناك شحنات
        return response()->json([
            'success' => true,
            'data' => [
                'shipments' => $shipments,
                'shipmentStatuses' => $shipmentStatuses
            ]
        ], 200);
    }
    /**
     * جلب تقارير المستخدم.
     */
    public function reports()
    {
        $user = Auth::user();

        $deliveredShipments = $user->shipments()->where('status', 'delivered')->count();
        $delayedShipments = $user->shipments()->where('status', 'delayed')->count();
        $activeShipments = $user->shipments()->where('status', 'active')->count();
        $canceledShipments = $user->shipments()->where('status', 'canceled')->count();
        $totalWeightDelivered = $user->shipments()->where('status', 'delivered')->sum('weight');

        $averageDeliveryTime = $user->shipments()
            ->where('status', 'delivered')
            ->selectRaw('AVG(DATEDIFF(actual_delivery_date, shipping_date)) as average_delivery_time')
            ->first()
            ->average_delivery_time;

        $averageDeliveryTime = round($averageDeliveryTime, 2);

        $monthlyShipments = $user->shipments()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        $cityShipments = $user->shipments()
            ->join('cities', 'shipments.to_city_id', '=', 'cities.id')
            ->selectRaw('cities.name as city, COUNT(*) as count')
            ->groupBy('city')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'deliveredShipments' => $deliveredShipments,
                'delayedShipments' => $delayedShipments,
                'averageDeliveryTime' => $averageDeliveryTime,
                'activeShipments' => $activeShipments,
                'canceledShipments' => $canceledShipments,
                'totalWeightDelivered' => $totalWeightDelivered,
                'monthlyShipments' => $monthlyShipments,
                'cityShipments' => $cityShipments
            ]
        ], 200);
    }



    /**
     * البحث عن شحنة باستخدام رقم التتبع.
     */

    public function track(Request $request)
    {
        $request->validate([
            'tracker' => 'required|string'
        ]);
    
        // البحث عن الشحنة باستخدام رقم التتبع
        $shipment = Shipment::where('tracking_number', $request->tracker)->first();
    
        // إذا لم يتم العثور على الشحنة
        if (!$shipment) {
            return response()->json([
                'success' => false,
                'message' => 'عفواً، لم يتم العثور على الشحنة. يرجى التأكد من رقم التتبع والمحاولة مرة أخرى.'
            ], 404);
        }
    
        // إذا تم العثور على الشحنة
        return response()->json([
            'success' => true,
            'message' => 'تم العثور على الشحنة بنجاح.',
            'data' => $shipment
        ], 200);
    }

}

