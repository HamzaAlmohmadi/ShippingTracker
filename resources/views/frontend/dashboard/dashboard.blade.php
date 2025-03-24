{{-- 
@extends('frontend.dashboard.layouts.master')

@section('title', 'لوحة تحكم المستخدم')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- إحصائيات سريعة -->
        <div class="col-lg-12">
            <div class="row">
                <!-- بطاقة الطرود النشطة -->
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <a href="#" class="card-body text-center">
                            <div class="avatar flex-shrink-0 mb-3">
                                <i class='bx bx-package text-primary' style="font-size: 2.5rem;"></i>
                            </div>
                            <span class="fw-semibold d-block mb-1">الطرود النشطة</span>
                            <span class="text-muted">5 طرود</span>
                        </a>
                    </div>
                </div>

                <!-- بطاقة الطرود المسلمة -->
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <a href="#" class="card-body text-center">
                            <div class="avatar flex-shrink-0 mb-3">
                                <i class='bx bx-check-circle text-success' style="font-size: 2.5rem;"></i>
                            </div>
                            <span class="fw-semibold d-block mb-1">الطرود المسلمة</span>
                            <span class="text-muted">20 طرد</span>
                        </a>
                    </div>
                </div>

                <!-- بطاقة الطرود المتأخرة -->
                <div class="col-lg-4 col-md-4 col-6 mb-4">
                    <div class="card shadow-sm border-0">
                        <a href="#" class="card-body text-center">
                            <div class="avatar flex-shrink-0 mb-3">
                                <i class='bx bx-error text-danger' style="font-size: 2.5rem;"></i>
                            </div>
                            <span class="fw-semibold d-block mb-1">الطرود المتأخرة</span>
                            <span class="text-muted">3 طرود</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- الجدول في الأسفل -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">قائمة الطرود</h5>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>رقم التتبع</th>
                                <th>الحالة</th>
                                <th>التاريخ المتوقع</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#123456</td>
                                <td>
                                    <span class="badge bg-warning text-dark">
                                        <i class='bx bx-time'></i> قيد التوصيل
                                    </span>
                                </td>
                                <td>2023-10-15</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class='bx bx-show'></i> تفاصيل
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>#789012</td>
                                <td>
                                    <span class="badge bg-success text-white">
                                        <i class='bx bx-check-circle'></i> تم التسليم
                                    </span>
                                </td>
                                <td>2023-10-10</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class='bx bx-show'></i> تفاصيل
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>#345678</td>
                                <td>
                                    <span class="badge bg-danger text-white">
                                        <i class='bx bx-error'></i> متأخر
                                    </span>
                                </td>
                                <td>2023-10-05</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary">
                                        <i class='bx bx-show'></i> تفاصيل
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}




@extends('frontend.dashboard.layouts.master')

@section('title', 'لوحة تحكم المستخدم')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- إحصائيات سريعة -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- بطاقة الشحنات النشطة -->
                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <a href="#" class="card-body text-center">
                                <div class="avatar flex-shrink-0 mb-3">
                                    <i class='bx bx-package text-primary' style="font-size: 2.5rem;"></i>
                                </div>
                                <span class="fw-semibold d-block mb-1">الشحنات النشطة</span>
                                <span
                                    class="text-muted">{{ $shipments->whereIn('status', ['pending', 'received', 'in_transit', 'customs_clearance', 'out_for_delivery', 'at_distribution_center'])->count() }}
                                    شحنة</span>
                            </a>
                        </div>
                    </div>

                    <!-- بطاقة الشحنات المسلمة -->
                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <a href="#" class="card-body text-center">
                                <div class="avatar flex-shrink-0 mb-3">
                                    <i class='bx bx-check-circle text-success' style="font-size: 2.5rem;"></i>
                                </div>
                                <span class="fw-semibold d-block mb-1">الشحنات المسلمة</span>
                                <span class="text-muted">{{ $shipments->where('status', 'delivered')->count() }} شحنة</span>
                            </a>
                        </div>
                    </div>

                    <!-- بطاقة الشحنات الملغية -->
                    <div class="col-lg-4 col-md-4 col-6 mb-4">
                        <div class="card shadow-sm border-0">
                            <a href="#" class="card-body text-center">
                                <div class="avatar flex-shrink-0 mb-3">
                                    <i class='bx bx-error text-danger' style="font-size: 2.5rem;"></i>
                                </div>
                                <span class="fw-semibold d-block mb-1">الشحنات الملغية</span>
                                <span class="text-muted">{{ $shipments->where('status', 'canceled')->count() }} شحنة</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الجدول في الأسفل -->
            <div class="col-lg-12">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">قائمة الشحنات</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>رقم التتبع</th>
                                    <th>الحالة</th>
                                    <th>التفاصيل</th>
                                    <th>التاريخ المتوقع</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shipments as $shipment)
                                    <tr>
                                        <td>#{{ $shipment->tracking_number }}</td>
                                        <td>
                                            @if (isset($shipmentStatuses[$shipment->status]))
                                                <span
                                                    class="badge bg-{{ $shipment->status == 'delivered' ? 'success' : ($shipment->status == 'canceled' ? 'danger' : 'warning') }}">
                                                    {{ $shipmentStatuses[$shipment->status]['status'] }}
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">غير معروف</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (isset($shipmentStatuses[$shipment->status]))
                                                {{ $shipmentStatuses[$shipment->status]['details'] }}
                                            @else
                                                حالة غير معروفة
                                            @endif
                                        </td>
                                        <td>{{ $shipment->estimated_delivery_date }}</td>
                                        <td>
                                            <a href="{{ route('user.shipments.show', $shipment->id) }}" class="btn btn-sm btn-primary">
                                                <i class='bx bx-show'></i> تفاصيل
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
