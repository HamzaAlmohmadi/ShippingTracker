{{-- @php
    $fromAddress = [
        'country' => $shipment->FromCountry->name,
        'city' => $shipment->FromCity->name,
        'address' => $shipment->from_address,
    ];

    $toAddress = [
        'country' => $shipment->ToCountry->name,
        'city' => $shipment->ToCity->name,
        'address' => $shipment->to_address,
    ];
@endphp
@extends('admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <section class="section">
        <div class="section-header">
            <h1>تفاصيل الشحنة</h1>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2></h2>
                                <div class="invoice-number">رقم الشحنة #{{ $shipment->tracking_number }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>معلومات المرسل:</strong><br>
                                        <b>الاسم:</b> {{ $shipment->sender->name }}<br>
                                        <b>الهاتف:</b> {{ $shipment->sender->phone }}<br>
                                        <b>العنوان:</b> {{ $shipment->sender->address }}<br>
                                        <b>البلد:</b> {{ $fromAddress['country'] }}<br>
                                        <b>المدينة:</b> {{ $fromAddress['city'] }}<br>
                                        <b>العنوان التفصيلي:</b> {{ $fromAddress['address'] }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>معلومات المستلم:</strong><br>
                                        <b>الاسم:</b> {{ $shipment->receiver->name }}<br>
                                        <b>الهاتف:</b> {{ $shipment->receiver->phone }}<br>
                                        <b>العنوان:</b> {{ $shipment->receiver->address }}<br>
                                        <b>البلد:</b> {{ $toAddress['country'] }}<br>
                                        <b>المدينة:</b> {{ $toAddress['city'] }}<br>
                                        <b>العنوان التفصيلي:</b> {{ $toAddress['address'] }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>تاريخ الإنشاء:</strong><br>
                                        {{ date('d F, Y', strtotime($shipment->created_at)) }}<br><br>
                                    </address>
                                </div>


                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>تاريخ متوقع التسليم :</strong><br>
                                        قيد التطوير <br><br>
                                    </address>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">تفاصيل الشحنة</div>
                            <p class="section-lead">لا يمكن حذف العناصر هنا.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>رقم التتبع</th>
                                        <th>الحالة</th>
                                        <th>الوزن</th>
                                        <th>البلد المرسل</th>
                                        <th>البلد المستلم</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $shipment->tracking_number }}</td>
                                        <td>{{ $shipment->status }}</td>
                                        <td>{{ $shipment->weight }} كجم</td>
                                        <td>{{ $fromAddress['country'] }}</td>
                                        <td>{{ $toAddress['country'] }}</td>
                                        <td>{{ $shipment->notes ?? 'لا توجد ملاحظات' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">حالة الشحنة</label>
                                            <select name="shipment_status" id="shipment_status"
                                                data-id="{{ $shipment->id }}" class="form-control">
                                                @foreach (config('shipment_status.shipment_status_admin') as $key => $shipmentStatus)
                                                    <option {{ $shipment->status === $key ? 'selected' : '' }}
                                                        value="{{ $key }}">{{ $shipmentStatus['status'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <button class="btn btn-warning btn-icon icon-left print_invoice"><i class="fas fa-print"></i>
                        طباعة</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $('#shipment_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');


                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.shipment.status') }}",
                    data: {status: status, id:id},
                    success: function(data){
                        if(data.status === 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })

            $('.print_invoice').on('click', function() {
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());

                window.print();

                $('body').html(originalContents);

            })
        })
    </script>
@endpush --}}





@php
    $fromAddress = [
        'country' => $shipment->FromCountry->name,
        'city' => $shipment->FromCity->name,
        'address' => $shipment->from_address,
    ];

    $toAddress = [
        'country' => $shipment->ToCountry->name,
        'city' => $shipment->ToCity->name,
        'address' => $shipment->to_address,
    ];

    // بيانات المرسل والمستلم من الحقول JSON
    $senderData = $shipment->sender_data;
    $receiverData = $shipment->receiver_data;
@endphp

@extends('admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <section class="section">
        <div class="section-header">
            <h1>تفاصيل الشحنة</h1>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="invoice-print">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="invoice-title">
                                <h2></h2>
                                <div class="invoice-number">رقم الشحنة #{{ $shipment->tracking_number }}</div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <address>
                                        <strong>معلومات المرسل:</strong><br>
                                        <b>الاسم:</b> {{ $senderData['name'] ?? 'غير متوفر' }}<br>
                                        <b>الهاتف:</b> {{ $senderData['phone'] ?? 'غير متوفر' }}<br>
                                        <b>البريد الإلكتروني:</b> {{ $senderData['email'] ?? 'غير متوفر' }}<br>
                                        <b>البلد:</b> {{ $fromAddress['country'] }}<br>
                                        <b>المدينة:</b> {{ $fromAddress['city'] }}<br>
                                        <b>العنوان التفصيلي:</b> {{ $fromAddress['address'] }}
                                    </address>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>معلومات المستلم:</strong><br>
                                        <b>الاسم:</b> {{ $receiverData['name'] ?? 'غير متوفر' }}<br>
                                        <b>الهاتف:</b> {{ $receiverData['phone'] ?? 'غير متوفر' }}<br>
                                        <b>البلد:</b> {{ $toAddress['country'] }}<br>
                                        <b>المدينة:</b> {{ $toAddress['city'] }}<br>
                                        <b>العنوان التفصيلي:</b> {{ $toAddress['address'] }}
                                    </address>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>تاريخ الإنشاء:</strong><br>
                                        {{ date('d F, Y', strtotime($shipment->created_at)) }}<br><br>
                                    </address>
                                </div>

                                <div class="col-md-6 text-md-right">
                                    <address>
                                        <strong>تاريخ التسليم المتوقع:</strong><br>
                                        {{ $shipment->estimated_delivery_date ? date('d F, Y', strtotime($shipment->estimated_delivery_date)) : 'غير محدد' }}<br><br>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="section-title">تفاصيل الشحنة</div>
                            <p class="section-lead">لا يمكن حذف العناصر هنا.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>رقم التتبع</th>
                                        <th>الحالة</th>
                                        <th>الوزن</th>
                                        <th>البلد المرسل</th>
                                        <th>البلد المستلم</th>
                                        <th>ملاحظات</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $shipment->tracking_number }}</td>
                                        <td>{{ $shipment->status }}</td>
                                        <td>{{ $shipment->weight }} كجم</td>
                                        <td>{{ $fromAddress['country'] }}</td>
                                        <td>{{ $toAddress['country'] }}</td>
                                        <td>{{ $shipment->notes ?? 'لا توجد ملاحظات' }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">حالة الشحنة</label>
                                            <select name="shipment_status" id="shipment_status"
                                                data-id="{{ $shipment->id }}" class="form-control">
                                                @foreach (config('shipment_status.shipment_status_admin') as $key => $shipmentStatus)
                                                    <option {{ $shipment->status === $key ? 'selected' : '' }}
                                                        value="{{ $key }}">{{ $shipmentStatus['status'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="text-md-right">
                    <button class="btn btn-warning btn-icon icon-left print_invoice"><i class="fas fa-print"></i>
                        طباعة</button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#shipment_status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.shipment.status') }}",
                    data: {status: status, id:id},
                    success: function(data){
                        if(data.status === 'success'){
                            toastr.success(data.message)
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });

            $('.print_invoice').on('click', function() {
                let printBody = $('.invoice-print');
                let originalContents = $('body').html();

                $('body').html(printBody.html());
                window.print();
                $('body').html(originalContents);
            });
        });
    </script>
@endpush