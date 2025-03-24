{{-- 
@extends('frontend.dashboard.layouts.master')

@section('title', 'تتبع الطرد')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- نموذج تتبع الطرد -->
        <div class="col-lg-6 col-md-8 col-12 mx-auto">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0 text-center">تتبع الطرد</h5>
                </div>
                <div class="card-body">
                    <form class="tack_form" action="{{route('product-traking.index')}}" method="GET">
                        <p class="text-center mb-4">تتبع حالة طردك</p>
                        <div class="wsus__track_input mb-3">
                            <label class="d-block mb-2">رقم الفاتورة*</label>
                            <input type="text" placeholder="90514" name="tracker" value="{{@$order->invocie_id}}">
                        </div>
                        <button type="submit" class="common_btn w-100">تتبع</button>
                    </form>
                </div>
            </div>
        </div>

        @if (isset($order))
        <div class="col-lg-8 col-md-10 col-12 mx-auto">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">تفاصيل الطرد</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="wsus__track_header_single">
                                <h5>تاريخ الطلب</h5>
                                <p>{{date('d M Y', strtotime(@$order->created_at))}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wsus__track_header_single">
                                <h5>المرسل</h5>
                                <p>{{@$order->user->name}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wsus__track_header_single">
                                <h5>حالة الطرد</h5>
                                <p>{{@$order->order_status}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="wsus__track_header_single border_none">
                                <h5>رقم التتبع</h5>
                                <p>{{@$order->invocie_id}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- شريط التقدم -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">حالة الشحن</h5>
                </div>
                <div class="card-body">
                    <ul class="progtrckr" data-progtrckr-steps="4">
                        <li class="progtrckr_done icon_one check_mark">قيد الانتظار</li>

                        @if (@$order->order_status == 'canceled')
                            <li class="icon_four red_mark">تم الإلغاء</li>
                        @else
                        <li class="progtrckr_done icon_two
                        @if (@$order->order_status == 'processed_and_ready_to_ship' || @$order->order_status == 'dropped_off' || @$order->order_status == 'shipped' || @$order->order_status == 'out_for_delivery' || @$order->order_status == 'delivered')
                        check_mark
                        @endif">قيد المعالجة</li>
                        <li class="icon_three
                        @if (@$order->order_status == 'out_for_delivery' || @$order->order_status == 'delivered')
                        check_mark
                        @endif
                        ">في الطريق</li>
                        <li class="icon_four
                        @if (@$order->order_status == 'delivered')
                        check_mark
                        @endif
                        ">تم التسليم</li>
                        @endif
                    </ul>
                </div>
            </div>

            <!-- زر العودة للرئيسية -->
            <div class="text-center">
                <a href="{{url('/')}}" class="common_btn"><i class="fas fa-chevron-left"></i> العودة للرئيسية</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

@section('css')
<style>
    /* تنسيقات شريط التقدم */
    .progtrckr {
        list-style-type: none;
        padding: 0;
        display: flex;
        justify-content: space-between;
        margin: 0;
    }

    .progtrckr li {
        text-align: center;
        flex: 1;
        position: relative;
        padding: 10px 0;
    }

    .progtrckr li:before {
        content: '';
        width: 20px;
        height: 20px;
        background-color: #ddd;
        border-radius: 50%;
        display: block;
        margin: 0 auto 10px;
    }

    .progtrckr li.progtrckr_done:before {
        background-color: #28a745;
    }

    .progtrckr li.active:before {
        background-color: #ffc107;
    }

    .progtrckr li.red_mark:before {
        background-color: #dc3545;
    }

    .progtrckr li:after {
        content: '';
        width: 100%;
        height: 2px;
        background-color: #ddd;
        position: absolute;
        top: 20px;
        left: 50%;
        z-index: -1;
    }

    .progtrckr li:last-child:after {
        display: none;
    }

    .progtrckr li.progtrckr_done:after {
        background-color: #28a745;
    }

    .progtrckr li.active:after {
        background-color: #ffc107;
    }

    .progtrckr li.red_mark:after {
        background-color: #dc3545;
    }
</style>
@endsection --}}



{{-- 

@extends('frontend.layouts.master')

@section('title', 'تتبع الشحنة')

@section('content')

<section id="wsus__tracking">
    <div class="container">
        <div class="wsus__track_area">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-8 m-auto">
                    <form class="track_form" action="{{ route('shipment-tracking.index') }}" method="GET">
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

            @if (isset($shipment))
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
                                        <h5>🚚 المرسل بواسطة:</h5>
                                        <p>{{ $shipment->sender_name }}</p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="wsus__track_header_single">
                                        <h5>📦 الحالة الحالية:</h5>
                                        <p>{{ ucfirst($shipment->status) }}</p>
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

                <!-- شريط تتبع الشحنة -->
                @php
                    $statusSteps = ['pending', 'processing', 'on_the_way', 'delivered'];
                    $currentIndex = array_search($shipment->status, $statusSteps);
                @endphp

                <div class="col-xl-12">
                    <ul class="progtrckr" data-progtrckr-steps="4">
                        <li class="progtrckr_done icon_one check_mark">⏳ في الانتظار</li>

                        @if ($shipment->status == 'canceled')
                            <li class="icon_four red_mark">🚫 تم الإلغاء</li>
                        @else
                            <li class="progtrckr_done icon_two @if ($currentIndex >= 1) check_mark @endif">⚙️ جاري المعالجة</li>
                            <li class="icon_three @if ($currentIndex >= 2) check_mark @endif">🚛 في الطريق</li>
                            <li class="icon_four @if ($currentIndex >= 3) check_mark @endif">✅ تم التسليم</li>
                        @endif
                    </ul>
                </div>

                <div class="col-xl-12 text-center mt-4">
                    <a href="{{ url('/') }}" class="common_btn">🔙 العودة إلى الصفحة الرئيسية</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<style>
/* شريط التتبع */
.progtrckr {
    display: flex;
    justify-content: center;
    list-style-type: none;
    padding: 0;
}

.progtrckr li {
    flex: 1;
    text-align: center;
    position: relative;
    font-weight: bold;
    font-size: 14px;
    color: #666;
}

.progtrckr li::before {
    content: "•";
    display: block;
    font-size: 24px;
    color: #ccc;
    margin-bottom: 8px;
}

.progtrckr li.check_mark::before {
    content: "✔";
    color: #28a745;
}

.progtrckr li.red_mark::before {
    content: "✖";
    color: #dc3545;
}

/* تحسين التنسيقات */
.wsus__track_area {
    background: #f9f9f9;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.track_form {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
}

.track_form h4 {
    font-size: 22px;
    font-weight: bold;
}

.common_btn {
    background: #2575fc;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    text-decoration: none;
}

.common_btn:hover {
    background: #6a11cb;
}
</style>

@endsection --}}



@extends('frontend.dashboard.layouts.master')

@section('title', 'تتبع الشحنة')

@push('css')
    {{-- <style>
        .progtrckr {
            display: flex;
            justify-content: center;
            list-style-type: none;
            padding: 0;
        }

        .progtrckr li {
            flex: 1;
            text-align: center;
            position: relative;
            font-weight: bold;
            font-size: 14px;
            color: #666;
        }

        .progtrckr li::before {
            content: "•";
            display: block;
            font-size: 24px;
            color: #ccc;
            margin-bottom: 8px;
        }

        .progtrckr li.check_mark::before {
            content: "✔";
            color: #28a745;
        }

        .progtrckr li.red_mark::before {
            content: "✖";
            color: #dc3545;
        }

        .wsus__track_area {
            background: #f9f9f9;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .track_form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .track_form h4 {
            font-size: 22px;
            font-weight: bold;
        }

        .common_btn {
            background: #2575fc;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
        }

        .common_btn:hover {
            background: #6a11cb;
        }
    </style> --}}
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
        .progtrckr {
            display: flex;
            justify-content: space-between;
            list-style-type: none;
            padding: 20px;
            position: relative;
            counter-reset: step;
        }

        .progtrckr li {
            text-align: center;
            position: relative;
            flex: 1;
            font-weight: bold;
            font-size: 14px;
            color: #666;
        }

        .progtrckr li::before {
            content: "•";
            display: block;
            font-size: 24px;
            color: #ccc;
            margin-bottom: 8px;
        }

        .progtrckr li.check_mark::before {
            content: "✔";
            color: #28a745;
            font-weight: bold;
        }

        .progtrckr li.check_mark {
            color: #28a745;
        }

        .progtrckr li.red_mark::before {
            content: "✖";
            color: #dc3545;
        }

        .progtrckr li.red_mark {
            color: #dc3545;
        }

        /* ✅ تحسين المسافات والاستجابة */
        @media (max-width: 768px) {
            .progtrckr {
                flex-direction: column;
                align-items: center;
            }

            .wsus__track_header_single {
                border-right: none;
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
                margin-bottom: 10px;
            }
        }






        /* ✅ إخفاء كل البيانات إذا كانت الشحنة ملغية */
        .canceled-state .wsus__track_header,
        .canceled-state .progtrckr {
            display: none;
        }

        .canceled-state .only-canceled {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: #dc3545;
        }

        /* ✅ تنسيق خطوات التتبع مع خط متصل */
        .progtrckr {
            display: flex;
            justify-content: space-between;
            list-style: none;
            padding: 20px;
            position: relative;
            counter-reset: step;
        }

        /* ✅ إضافة خط بين الخطوات */
        .progtrckr::before {
            content: "";
            position: absolute;
            top: 18px;
            left: 10%;
            width: 80%;
            height: 4px;
            background: #ccc;
            z-index: -1;
            transition: background 0.3s ease-in-out;
        }

        /* ✅ تغيير لون الخط تدريجيًا حسب الحالة */
        .progtrckr.tracking-active::before {
            background: linear-gradient(to right, #2575fc 0%, #2575fc var(--progress), #ccc var(--progress), #ccc 100%);
        }

        /* ✅ تنسيق الأيقونات والحالة */
        .progtrckr li {
            text-align: center;
            position: relative;
            flex: 1;
            font-weight: bold;
            font-size: 14px;
            color: #666;
            z-index: 1;
        }

        .progtrckr li::before {
            content: "●";
            font-size: 24px;
            color: #ccc;
            display: block;
            margin-bottom: 8px;
            transition: color 0.3s ease-in-out;
        }

        /* ✅ الحالات النشطة */
        .progtrckr li.active::before {
            color: #2575fc;
        }

        .progtrckr li.active {
            color: #2575fc;
        }

        /* ✅ إذا كانت الشحنة ملغية، لا تظهر الأيقونات */
        .canceled-state .progtrckr li {
            display: none;
        }
    </style>
@endpush

@section('content')

    <section id="wsus__tracking">
        <div class="container">
            <div class="wsus__track_area">
                <div class="row">
                    <div class="col-xl-5 col-md-10 col-lg-8 m-auto">
                        <form class="track_form" action="{{ route('shipment-tracking.index') }}" method="GET">
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
                                                <h5>🚚 المرسل بواسطة:</h5>
                                                <p>{{ $shipment->sender_name }}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-sm-6">
                                            <div class="wsus__track_header_single">
                                                <h5>📦 الحالة الحالية:</h5>
                                                <p>{{ $shipment->status }}</p>
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

                        @php
                            $statusList = [
                                'pending' => '⏳ قيد الانتظار',
                                'received' => '📥 تم الاستلام',
                                'in_transit' => '🚛 في الطريق',
                                'customs_clearance' => '🛃 جاري التخليص الجمركي',
                                'customs_held' => '🚨 محتجزة في الجمارك',
                                'out_for_delivery' => '🚚 في الطريق للتوصيل',
                                'at_distribution_center' => '🏢 في مركز التوزيع',
                                'delivered' => '✅ تم التوصيل',
                                'canceled' => '❌ ملغية',
                            ];
                            $statusKeys = array_keys($statusList);
                            $currentIndex = array_search($shipment->status, $statusKeys);
                        @endphp

                        <div class="col-xl-12">
                            <ul class="progtrckr" data-progtrckr-steps="{{ count($statusList) }}">
                                @foreach ($statusList as $key => $label)
                                    <li class="@if ($currentIndex >= array_search($key, $statusKeys)) check_mark @endif">
                                        {{ $label }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-xl-12 text-center mt-4">
                            <a href="{{ url('/') }}" class="common_btn">🔙 العودة إلى الصفحة الرئيسية</a>
                        </div>
                    </div>
                @endif

                
            </div>
        </div>
    </section>


@endsection
