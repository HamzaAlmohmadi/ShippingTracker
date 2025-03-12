
@extends('admin.layouts.master')

@section('title', 'تفاصيل السائق')


@push('css')
    <style>
        .driver-card {
            background: #6777ef;
            color: #090101;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .driver-card h3 {
            font-size: 24px;
            font-weight: bold;
        }

        .driver-card .icon {
            font-size: 60px;
            color: rgba(255, 255, 255, 0.3);
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .details-list {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .details-list li {
            display: flex;
            justify-content: space-between;
            padding: 10px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .details-list li:last-child {
            border-bottom: none;
        }

        .details-list li span {
            font-weight: bold;

        }

        .action-buttons .btn {
            margin-right: 10px;
            border-radius: 20px;
        }
    </style>
@endpush

@section('content')



    <section class="section">
        <div class="section-header">
            <h1>بيانات السائق </h1>
        </div>


    </section>

    <div class="row">
        <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
            <div class="card driver-card position-relative">
                <div class="card-body">
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3 class="text-center mb-4">تفاصيل السائق</h3>
                    <ul class="details-list">
                        <li>
                            <span>الاسم:</span>
                            <span>{{ $driver->name }}</span>
                        </li>
                        <li>
                            <span>رقم الهاتف:</span>
                            <span>{{ $driver->phone }}</span>
                        </li>
                        <li>
                            <span>البريد الإلكتروني:</span>
                            <span>{{ $driver->email }}</span>
                        </li>
                        <li>
                            <span>العنوان:</span>
                            <span>{{ $driver->address ?? 'غير متوفر' }}</span>
                        </li>
                        <li>
                            <span>عدد الشحنات الحالية:</span>
                            <span>{{ $driver->current_shipments_count ?? 0 }}</span>
                        </li>
                    </ul>
                    <div class="action-buttons text-center mt-4">
                        <a href="#" class="btn btn-success">
                            <i class="fas fa-plus-circle"></i> إضافة شحنة
                        </a>
                        <a href="{{ route('shipments.ongoing') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> العودة
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
