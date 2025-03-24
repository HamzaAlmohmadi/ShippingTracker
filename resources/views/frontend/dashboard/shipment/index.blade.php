




{{-- 
@extends('frontend.dashboard.layouts.master')

@section('title', 'لوحة تحكم المستخدم')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
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
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->tracking_number }}</td>
                                    <td>
                                        @if ($shipment->status === 'قيد التوصيل')
                                            <span class="badge bg-warning text-dark">
                                                <i class='bx bx-time'></i> قيد التوصيل
                                            </span>
                                        @elseif ($shipment->status === 'تم التسليم')
                                            <span class="badge bg-success text-white">
                                                <i class='bx bx-check-circle'></i> تم التسليم
                                            </span>
                                        @elseif ($shipment->status === 'متأخر')
                                            <span class="badge bg-danger text-white">
                                                <i class='bx bx-error'></i> متأخر
                                            </span>
                                        @else
                                            <span class="badge bg-secondary text-white">
                                                <i class='bx bx-question-mark'></i> {{ $shipment->status }}
                                            </span>
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
@endsection --}}






{{-- @extends('frontend.dashboard.layouts.master')

@section('title', 'قائمة الشحنات')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">قائمة الشحنات</h5>
                </div>
                <div class="card-body">
                    {{ $dataTable->table() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
{{ $dataTable->scripts() }}
@endsection --}}



{{-- 
@extends('frontend.dashboard.layouts.master')

@section('title', 'قائمة الشحنات')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
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
                                <th>المرسل</th>
                                <th>المستلم</th>
                                <th>الحالة</th>
                                <th>التاريخ المتوقع</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->tracking_number }}</td>
                                    <td>{{ json_decode($shipment->sender_data)->name }}</td>
                                    <td>{{ json_decode($shipment->receiver_data)->name }}</td>
                                    <td>
                                        @php
                                            $status = $shipment->status;
                                            $badgeColor = '';
                                            switch ($status) {
                                                case 'قيد الانتظار':
                                                    $badgeColor = 'bg-warning';
                                                    break;
                                                case 'تم الاستلام':
                                                    $badgeColor = 'bg-info';
                                                    break;
                                                case 'في الطريق':
                                                    $badgeColor = 'bg-primary';
                                                    break;
                                                case 'جاري التخليص الجمركي':
                                                    $badgeColor = 'bg-secondary';
                                                    break;
                                                case 'محتجزة في الجمارك':
                                                    $badgeColor = 'bg-danger';
                                                    break;
                                                case 'في الطريق للتوصيل':
                                                    $badgeColor = 'bg-success';
                                                    break;
                                                case 'تم التوصيل':
                                                    $badgeColor = 'bg-success';
                                                    break;
                                                case 'ملغية':
                                                    $badgeColor = 'bg-danger';
                                                    break;
                                                default:
                                                    $badgeColor = 'bg-secondary';
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeColor }}">
                                            {{ $status }}
                                        </span>
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
@endsection --}}


{{-- @extends('frontend.dashboard.layouts.master')

@section('title', 'قائمة الشحنات')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
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
                                <th>المرسل</th>
                                <th>المستلم</th>
                                <th>الحالة</th>
                                <th>التاريخ المتوقع</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // مصفوفة تحويل الحالات من الإنجليزية إلى العربية
                                $statuses = [
                                    'pending' => [
                                        'status' => 'قيد الانتظار',
                                        'color' => 'bg-warning'
                                    ],
                                    'received' => [
                                        'status' => 'تم الاستلام',
                                        'color' => 'bg-info'
                                    ],
                                    'in_transit' => [
                                        'status' => 'في الطريق',
                                        'color' => 'bg-primary'
                                    ],
                                    'customs_clearance' => [
                                        'status' => 'جاري التخليص الجمركي',
                                        'color' => 'bg-secondary'
                                    ],
                                    'customs_held' => [
                                        'status' => 'محتجزة في الجمارك',
                                        'color' => 'bg-danger'
                                    ],
                                    'out_for_delivery' => [
                                        'status' => 'في الطريق للتوصيل',
                                        'color' => 'bg-success'
                                    ],
                                    'at_distribution_center' => [
                                        'status' => 'في مراكز التوزيع',
                                        'color' => 'bg-secondary'
                                    ],
                                    'delivered' => [
                                        'status' => 'تم التوصيل',
                                        'color' => 'bg-success'
                                    ],
                                    'canceled' => [
                                        'status' => 'ملغية',
                                        'color' => 'bg-danger'
                                    ],
                                ];
                            @endphp
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->tracking_number }}</td>
                                    <td>{{ json_decode($shipment->sender_data)->name }}</td>
                                    <td>{{ json_decode($shipment->receiver_data)->name }}</td>
                                    <td>
                                        @php
                                            // الحصول على الحالة بالعربية واللون المناسب
                                            $statusInfo = $statuses[$shipment->status] ?? [
                                                'status' => $shipment->status,
                                                'color' => 'bg-secondary'
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusInfo['color'] }}">
                                            {{ $statusInfo['status'] }}
                                        </span>
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
@endsection --}}


@extends('frontend.dashboard.layouts.master')

@section('title', 'قائمة الشحنات')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">قائمة الشحنات</h5>
                    {{-- زر إنشاء شحنة جديدة --}}
                    <a href="{{ route('user.shipments.create') }}" class="btn btn-light">
                        <i class='bx bx-plus'></i> إنشاء شحنة جديدة
                    </a>
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
                            @php
                                // مصفوفة تحويل الحالات من الإنجليزية إلى العربية مع الأيقونات والألوان
                                $statuses = [
                                    'pending' => [
                                        'status' => 'قيد الانتظار',
                                        'icon' => 'bx bx-time',
                                        'color' => 'bg-warning text-dark'
                                    ],
                                    'received' => [
                                        'status' => 'تم الاستلام',
                                        'icon' => 'bx bx-check-circle',
                                        'color' => 'bg-success text-white'
                                    ],
                                    'in_transit' => [
                                        'status' => 'في الطريق',
                                        'icon' => 'bx bx-car',
                                        'color' => 'bg-primary text-white'
                                    ],
                                    'customs_clearance' => [
                                        'status' => 'جاري التخليص الجمركي',
                                        'icon' => 'bx bx-loader',
                                        'color' => 'bg-secondary text-white'
                                    ],
                                    'customs_held' => [
                                        'status' => 'محتجزة في الجمارك',
                                        'icon' => 'bx bx-error',
                                        'color' => 'bg-danger text-white'
                                    ],
                                    'out_for_delivery' => [
                                        'status' => 'في الطريق للتوصيل',
                                        'icon' => 'bx bx-package',
                                        'color' => 'bg-success text-white'
                                    ],
                                    'at_distribution_center' => [
                                        'status' => 'في مراكز التوزيع',
                                        'icon' => 'bx bx-building',
                                        'color' => 'bg-secondary text-white'
                                    ],
                                    'delivered' => [
                                        'status' => 'تم التوصيل',
                                        'icon' => 'bx bx-check-circle',
                                        'color' => 'bg-success text-white'
                                    ],
                                    'canceled' => [
                                        'status' => 'ملغية',
                                        'icon' => 'bx bx-error',
                                        'color' => 'bg-danger text-white'
                                    ],
                                ];
                            @endphp
                            @foreach ($shipments as $shipment)
                                <tr>
                                    <td>{{ $shipment->tracking_number }}</td>
                                    <td>
                                        @php
                                            // الحصول على الحالة بالعربية والأيقونة واللون المناسب
                                            $statusInfo = $statuses[$shipment->status] ?? [
                                                'status' => $shipment->status,
                                                'icon' => 'bx bx-question-mark',
                                                'color' => 'bg-secondary text-white'
                                            ];
                                        @endphp
                                        <span class="badge {{ $statusInfo['color'] }}">
                                            <i class='{{ $statusInfo['icon'] }}'></i> {{ $statusInfo['status'] }}
                                        </span>
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