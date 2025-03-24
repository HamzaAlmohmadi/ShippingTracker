@extends('frontend.dashboard.layouts.master')

@section('title', 'تتبع الشحنة')

@push('css')
    <style>
        /* ✅ تنسيق عام لمنطقة التتبع */
        .wsus__tracking {
            padding: 40px 0;
            background-color: #f9f9f9;
        }

        .wsus__track_area {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* ✅ تنسيق نموذج البحث عن الشحنة */
        .track_form {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .track_form h4 {
            font-size: 22px;
            font-weight: bold;
            color: #333;
        }

        .track_form p {
            font-size: 14px;
            color: #666;
        }

        .wsus__track_input {
            margin-bottom: 15px;
        }

        .wsus__track_input label {
            font-size: 14px;
            font-weight: bold;
            color: #555;
        }

        .wsus__track_input input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .wsus__track_input input:focus {
            border-color: #2575fc;
            outline: none;
            box-shadow: 0px 0px 5px rgba(37, 117, 252, 0.5);
        }

        /* ✅ زر البحث */
        .common_btn {
            background: #2575fc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .common_btn:hover {
            background: #6a11cb;
        }

        /* ✅ معلومات الشحنة */
        .wsus__track_header {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .wsus__track_header_single {
            text-align: center;
            padding: 10px;
            border-right: 1px solid #ddd;
        }

        .wsus__track_header_single:last-child {
            border-right: none;
        }

        .wsus__track_header_single h5 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .wsus__track_header_single p {
            font-size: 14px;
            color: #666;
        }

        /* ✅ تنسيق خطوات التتبع */
        .tracking-steps {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 20px;
            position: relative;
        }

        .tracking-steps::before {
            content: "";
            position: absolute;
            top: 18px;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #ccc;
            z-index: -1;
        }

        .tracking-steps li {
            text-align: center;
            flex: 1;
            font-size: 14px;
            font-weight: bold;
            color: #666;
            position: relative;
        }

        .tracking-steps li::before {
            content: "●";
            font-size: 24px;
            color: #ccc;
            display: block;
            margin-bottom: 8px;
        }

        .tracking-steps li.active::before {
            content: "✔";
            color: #28a745;
            font-weight: bold;
        }

        .tracking-steps li.active {
            color: #28a745;
        }

        /* ✅ إخفاء الحالات الأخرى عند الإلغاء */
        .canceled-state .tracking-steps li:not(.pending) {
            display: none;
        }

        .canceled-state .tracking-steps li.pending::before {
            content: "✖";
            color: #dc3545;
        }

        .canceled-state .tracking-steps li.pending {
            color: #dc3545;
        }

        .canceled-state .only-canceled {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #dc3545;
            margin-top: 20px;
        }
    </style>
@endpush

@section('content')
    <section id="wsus__tracking">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">
                        <form class="track_form" action="{{ route('user.shipment-tracking.track') }}" method="GET">
                            <h4 class="text-center">📦 تتبع الشحنة</h4>
                            <p class="text-center">أدخل رقم التتبع لمعرفة حالة الشحنة</p>
                            <div class="wsus__track_input">
                                <label class="d-block mb-2">رقم التتبع *</label>
                                <input type="text" placeholder="EX: SHP-123456789" name="tracker" required>
                            </div>
                            <button type="submit" class="common_btn">🔍 تتبع</button>
                        </form>
                    </div>
                </div>

                @if ($shipment)
                    <div class="row mt-4">
                        <div class="col-xl-12">
                            <div class="wsus__track_header">
                                <div class="wsus__track_header_text">
                                    <div class="row">
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="wsus__track_header_single">
                                                <h5>📅 تاريخ الشحن:</h5>
                                                <p>{{ date('d M Y', strtotime($shipment->shipping_date)) }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="wsus__track_header_single">
                                                @php $sender = json_decode($shipment->sender_data); @endphp
                                                <h5> المرسل بواسطة:</h5>
                                                <p>{{ $sender->name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="wsus__track_header_single">
                                                @php
                                                    // استيراد قائمة حالات الشحنة من ملف الإعدادات
                                                    $shipmentStatuses = config('shipment_status.shipment_status_admin');
                                                    // التحقق من وجود الحالة في القائمة
                                                    $currentStatus =
                                                        $shipmentStatuses[$shipment->status]['status'] ??
                                                        'حالة غير معروفة';
                                                @endphp

                                                <h5>📦 الحالة الحالية:</h5>
                                                <p>{{ $currentStatus }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="wsus__track_header_single border_none">
                                                <h5>🔍 رقم التتبع:</h5>
                                                <p>{{ $shipment->tracking_number }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12">
                            <ul class="tracking-steps @if ($shipment->status == 'canceled') canceled-state @endif">
                                @php
                                    // قائمة الحالات الممكنة للشحنة
                                    $statuses = [
                                        'pending' => '⏳ قيد الانتظار',
                                        'received' => '📥 تم استلام الشحنة',
                                        'in_transit' => '🚛 في الطريق',
                                        'delivered' => '✅ تم التسليم',
                                    ];

                                    // الحصول على الفهرس الحالي للحالة الحالية
                                    $currentStatus = array_search($shipment->status, array_keys($statuses));

                                    // الحالات التي تعتبر "تم استلام الشحنة" أو بعدها
                                    $receivedAndTransitStatuses = [
                                        // 'received',
                                        'in_transit',
                                        'customs_clearance',
                                        'customs_held',
                                        'out_for_delivery',
                                        'at_distribution_center',
                                        'delivered',
                                    ];
                                @endphp

                                @foreach ($statuses as $key => $label)
                                    @if ($shipment->status == 'canceled')
                                        {{-- إخفاء جميع الحالات ما عدا "قيد الانتظار" --}}
                                        <div class="col-xl-12 text-center mt-4">
                                            <p class="only-canceled"
                                                style="font-size: 30px; color: #dc3545; font-weight: bold;">
                                                ✖ تم إلغاء الشحنة
                                            </p>
                                        </div>

                                        @continue
                                    @endif
                                    <li
                                        class="@if ($currentStatus >= array_search($key, array_keys($statuses))) active @endif 
                                               @if (in_array($shipment->status, $receivedAndTransitStatuses) && ($key == 'received' || $key == 'in_transit')) active @endif 
                                               @if ($key == 'pending') pending @endif">
                                        {{ $label }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                        {{-- @if ($shipment->status == 'canceled')
                            <div class="col-xl-12 text-center mt-4">
                                <p class="only-canceled" style="font-size: 30px; color: #dc3545; font-weight: bold;">
                                    ✖ تم إلغاء الشحنة
                                </p>
                            </div>
                        @endif --}}

                        <div class="col-xl-12 text-center mt-4">
                            <a href="{{ url('/') }}" class="common_btn">🔙 العودة إلى الصفحة الرئيسية</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
