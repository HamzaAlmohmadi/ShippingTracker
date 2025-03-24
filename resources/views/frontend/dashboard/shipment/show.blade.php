


@extends('frontend.dashboard.layouts.master')

@section('title', 'تفاصيل الشحنة')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient text-white text-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                    <h4 class="card-title mb-0">🚚 تفاصيل الشحنة</h4>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <!-- معلومات الشحنة -->
                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-primary">رقم التتبع 📦</h6>
                                <p class="fw-bold text-dark">{{ $shipment->tracking_number }}</p>
                            </div>
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-primary">حالة الشحنة 📊</h6>
                                <p class="fw-bold text-dark">{{ $shipment->status }}</p>
                            </div>
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-primary">وزن الشحنة ⚖️</h6>
                                <p class="fw-bold text-dark">{{ $shipment->weight }} كجم</p>
                            </div>
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-primary">نوع الطرد 📦</h6>
                                <p class="fw-bold text-dark">{{ $shipment->package_type }}</p>
                            </div>
                        </div>

                        <!-- بيانات الشحن والتوصيل -->
                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-success">تاريخ الإرسال 📅</h6>
                                <p class="fw-bold text-dark">{{ $shipment->shipping_date }}</p>
                            </div>
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-success">التاريخ المتوقع للتسليم ⏳</h6>
                                <p class="fw-bold text-dark">{{ $shipment->estimated_delivery_date }}</p>
                            </div>
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-success">التاريخ الفعلي للتسليم ✅</h6>
                                <p class="fw-bold text-dark">{{ $shipment->actual_delivery_date ?? 'لم يتم التسليم بعد' }}</p>
                            </div>
                        </div>

                        <!-- بيانات المرسل والمستلم -->
                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-info">🚀 المرسل</h6>
                                @php $sender = json_decode($shipment->sender_data); @endphp
                                <p class="fw-bold text-dark">📛 الاسم: {{ $sender->name }}</p>
                                <p class="text-muted">📞 الهاتف: {{ $sender->phone }}</p>
                                <p class="text-muted">📍 العنوان: {{ $sender->district }}, {{ $sender->street }}, {{ $sender->building }}, {{ $sender->floor }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-info">🎯 المستلم</h6>
                                @php $receiver = json_decode($shipment->receiver_data); @endphp
                                <p class="fw-bold text-dark">📛 الاسم: {{ $receiver->name }}</p>
                                <p class="text-muted">📞 الهاتف: {{ $receiver->phone }}</p>
                                <p class="text-muted">📍 العنوان: {{ $receiver->district }}, {{ $receiver->street }}, {{ $receiver->building }}, {{ $receiver->floor }}</p>
                            </div>
                        </div>

                        <!-- موقع الإرسال والاستلام -->
                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-warning">🌍 بلد الإرسال</h6>
                                <p class="fw-bold text-dark">{{ $shipment->fromCountry->name }}, {{ $shipment->fromCity->name }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-warning">📍 بلد الاستلام</h6>
                                <p class="fw-bold text-dark">{{ $shipment->toCountry->name }}, {{ $shipment->toCity->name }}</p>
                            </div>
                        </div>

                        <!-- بيانات الدفع -->
                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-danger">💳 حالة الدفع</h6>
                                <p class="fw-bold text-dark">{{ $shipment->payment_status }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-danger">🏦 طريقة الدفع</h6>
                                <p class="fw-bold text-dark">{{ $shipment->payment_method }}</p>
                            </div>
                        </div>

                        <!-- بيانات السائق -->
                        <div class="col-md-12">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-secondary">🚛 السائق المسؤول</h6>
                                <p class="fw-bold text-dark">{{ $shipment->driver->name }}</p>
                            </div>
                        </div>

                        <!-- ملاحظات -->
                        <div class="col-md-12">
                            <div class="info-box p-3 rounded shadow-sm bg-light">
                                <h6 class="text-dark">📝 ملاحظات</h6>
                                <p class="text-muted">{{ $shipment->notes ?? 'لا توجد ملاحظات' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light text-center">
                    <a href="{{ route('user.shipments.index') }}" class="btn btn-outline-primary px-4">🔙 العودة إلى القائمة</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .info-box {
        transition: transform 0.2s ease-in-out;
    }
    .info-box:hover {
        transform: scale(1.05);
    }
</style>
@endsection


{{-- 
@extends('frontend.dashboard.layouts.master')

@section('title', 'تفاصيل الشحنة')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-gradient text-white text-center" style="background: linear-gradient(135deg, #6a11cb, #2575fc);">
                    <h4 class="card-title mb-0">🚚 تتبع الشحنة</h4>
                </div>
                <div class="card-body">
                    <div class="row g-4 text-center">
                        <!-- بيانات الشحنة -->
                        <div class="col-md-3">
                            <div class="info-box p-3 rounded bg-light shadow-sm">
                                <h6 class="text-primary">📅 تاريخ الطلب</h6>
                                <p class="fw-bold">{{ date('d M Y', strtotime($shipment->shipping_date)) }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box p-3 rounded bg-light shadow-sm">
                                <h6 class="text-primary">🚚 المرسل بواسطة</h6>
                                <p class="fw-bold">{{ $shipment->sender_name }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box p-3 rounded bg-light shadow-sm">
                                <h6 class="text-primary">📦 الحالة</h6>
                                <p class="fw-bold">{{ ucfirst($shipment->status) }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box p-3 rounded bg-light shadow-sm">
                                <h6 class="text-primary">🔍 رقم التتبع</h6>
                                <p class="fw-bold">{{ $shipment->tracking_number }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- شريط تقدم حالة الشحنة -->
                    @php
                        $statusSteps = ['pending', 'processing', 'on_the_way', 'delivered'];
                        $currentIndex = array_search($shipment->status, $statusSteps);
                    @endphp

                    <div class="progress-container mt-5">
                        <div class="progress-line">
                            @foreach ($statusSteps as $index => $step)
                                <div class="progress-step {{ $index <= $currentIndex ? 'active' : '' }}">
                                    <div class="icon">
                                        @if ($step == 'pending')
                                            ➜
                                        @elseif ($step == 'processing')
                                            🔄
                                        @elseif ($step == 'on_the_way')
                                            🚚
                                        @elseif ($step == 'delivered')
                                            ✅
                                        @endif
                                    </div>
                                    <p>{{ ucfirst(str_replace('_', ' ', $step)) }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="card-footer bg-light text-center">
                    <a href="{{ route('user.shipments.index') }}" class="btn btn-outline-primary px-4">🔙 العودة إلى القائمة</a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* تصميم شريط التتبع */
.progress-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    position: relative;
}

.progress-line {
    display: flex;
    align-items: center;
    position: relative;
    width: 80%;
    max-width: 800px;
}

.progress-step {
    flex: 1;
    text-align: center;
    position: relative;
}

.progress-step .icon {
    width: 40px;
    height: 40px;
    background-color: #ddd;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: bold;
    transition: 0.3s;
}

.progress-step p {
    margin-top: 10px;
    font-size: 14px;
    font-weight: bold;
    color: #333;
}

.progress-step.active .icon {
    background-color: #2575fc;
    color: #fff;
}

.progress-line::before {
    content: "";
    position: absolute;
    top: 20px;
    left: 10%;
    width: 80%;
    height: 5px;
    background-color: #ddd;
    z-index: -1;
}

.progress-step.active::before {
    content: "";
    position: absolute;
    top: 20px;
    left: 10%;
    width: calc(80% / 3 * {{ $currentIndex }});
    height: 5px;
    background-color: #2575fc;
    z-index: -1;
}
</style>
@endsection --}}
