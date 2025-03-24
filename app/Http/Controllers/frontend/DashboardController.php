<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        // جلب بيانات الشحنات للمستخدم الحالي
        $user = Auth::user(); // المستخدم الحالي
        $shipments = $user->shipments()->latest()->take(10)->get(); // جلب آخر 10 شحنات

        // تعريف حالات الشحنات
        $shipmentStatuses = [
            'pending' => [
                'status' => 'قيد الانتظار',
                'details' => 'تم استلام طلب الشحنة وجاري التحضير'
            ],
            'received' => [
                'status' => 'تم الاستلام',
                'details' => 'تم استلام الشحنة في مستودع الشركة'
            ],
            'in_transit' => [
                'status' => 'في الطريق',
                'details' => 'الشحنة في طريقها إلى الوجهة التالية'
            ],
            'customs_clearance' => [
                'status' => 'جاري التخليص الجمركي',
                'details' => 'الشحنة قيد التخليص الجمركي'
            ],
            'customs_held' => [
                'status' => 'محتجزة في الجمارك',
                'details' => 'الشحنة محتجزة في الجمارك لمراجعة إضافية'
            ],
            'out_for_delivery' => [
                'status' => 'في الطريق للتوصيل',
                'details' => 'الشحنة في طريقها للتوصيل إلى المستلم'
            ],
            'at_distribution_center' => [
                'status' => 'في مراكز التوزيع',
                'details' => 'الشحنة في مراكز التوزيع'
            ],
            'delivered' => [
                'status' => 'تم التوصيل',
                'details' => 'تم تسليم الشحنة بنجاح'
            ],
            'canceled' => [
                'status' => 'ملغية',
                'details' => 'تم إلغاء الشحنة'
            ],
        ];

        // إرسال البيانات إلى الـ View
        return view('frontend.dashboard.dashboard', compact('shipments', 'shipmentStatuses'));
    }






    public function reports()
    {
        $user = Auth::user(); // جلب المستخدم الحالي

        // جلب عدد الطرود المسلمة
        $deliveredShipments = $user->shipments()->where('status', 'delivered')->count();

        // جلب عدد الطرود المتأخرة
        $delayedShipments = $user->shipments()->where('status', 'delayed')->count();

        // حساب الوقت المتوسط للتسليم (بالأيام)
        $averageDeliveryTime = $user->shipments()
            ->where('status', 'delivered')
            ->selectRaw('AVG(DATEDIFF(actual_delivery_date, shipping_date)) as average_delivery_time')
            ->first()
            ->average_delivery_time;

        // تقريب الوقت المتوسط إلى منزلتين عشريتين
        $averageDeliveryTime = round($averageDeliveryTime, 2);

        // جلب عدد الطرود النشطة
        $activeShipments = $user->shipments()->where('status', 'active')->count();

        // جلب عدد الطرود الملغية
        $canceledShipments = $user->shipments()->where('status', 'canceled')->count();

        // جلب إجمالي الوزن للطرود المسلمة
        $totalWeightDelivered = $user->shipments()
            ->where('status', 'delivered')
            ->sum('weight');

        // جلب إحصائيات الشحنات حسب الشهر
        $monthlyShipments = $user->shipments()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->get();

        // جلب إحصائيات الشحنات حسب المدينة
        $cityShipments = $user->shipments()
            ->join('cities', 'shipments.to_city_id', '=', 'cities.id')
            ->selectRaw('cities.name as city, COUNT(*) as count')
            ->groupBy('city')
            ->get();

        // إرسال البيانات إلى الـ View
        return view('frontend.dashboard.reports.index', compact(
            'deliveredShipments',
            'delayedShipments',
            'averageDeliveryTime',
            'activeShipments',
            'canceledShipments',
            'totalWeightDelivered',
            'monthlyShipments',
            'cityShipments'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if($request->has('tracker')){
            $order = Shipment::where('tracking_number', $request->tracker)->first();
    
            return view('frontend.dashboard.pages.product-track', compact('order'));
        }else {
            return view('frontend.dashboard.pages.product-track');
        }
    }



    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}






