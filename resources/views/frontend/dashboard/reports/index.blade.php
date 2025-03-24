{{-- @extends('frontend.dashboard.layouts.master')

@section('title', 'نموذج إنشاء')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">التقارير</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- تقرير الطرود المسلمة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-check-circle text-success' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المسلمة</h5>
                            <p class="text-muted">20 طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الطرود المتأخرة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-error text-danger' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المتأخرة</h5>
                            <p class="text-muted">3 طرود</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الوقت المتوسط للتسليم -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-time text-warning' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الوقت المتوسط للتسليم</h5>
                            <p class="text-muted">2.5 يوم</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


{{-- @extends('frontend.dashboard.layouts.master')

@section('title', 'التقارير')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">التقارير</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- تقرير الطرود المسلمة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-check-circle text-success' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المسلمة</h5>
                            <p class="text-muted">{{ $deliveredShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الطرود المتأخرة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-error text-danger' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المتأخرة</h5>
                            <p class="text-muted">{{ $delayedShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الوقت المتوسط للتسليم -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-time text-warning' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الوقت المتوسط للتسليم</h5>
                            <p class="text-muted">{{ $averageDeliveryTime }} يوم</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}








@extends('frontend.dashboard.layouts.master')

@section('title', 'التقارير')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">التقارير</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- تقرير الطرود المسلمة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-check-circle text-success' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المسلمة</h5>
                            <p class="text-muted">{{ $deliveredShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الطرود المتأخرة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-error text-danger' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود المتأخرة</h5>
                            <p class="text-muted">{{ $delayedShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الوقت المتوسط للتسليم -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-time text-warning' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الوقت المتوسط للتسليم</h5>
                            <p class="text-muted">{{ $averageDeliveryTime }} يوم</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الطرود النشطة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-package text-primary' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود النشطة</h5>
                            <p class="text-muted">{{ $activeShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير الطرود الملغية -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-x-circle text-danger' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">الطرود الملغية</h5>
                            <p class="text-muted">{{ $canceledShipments }} طرد</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>

                <!-- تقرير إجمالي الوزن للطرود المسلمة -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class='bx bx-weight text-info' style="font-size: 2.5rem;"></i>
                            <h5 class="card-title mt-3">إجمالي الوزن المسلمة</h5>
                            <p class="text-muted">{{ $totalWeightDelivered }} كجم</p>
                            <a href="#" class="btn btn-sm btn-primary">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- تقرير إحصائيات الشحنات حسب الشهر والمدينة -->
            <div class="row mt-4">
                <!-- تقرير إحصائيات الشحنات حسب الشهر -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="card-title mb-0">إحصائيات الشحنات حسب الشهر</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 400px; width: 100%">
                                <canvas id="monthlyShipmentsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- تقرير إحصائيات الشحنات حسب المدينة -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="card-title mb-0">إحصائيات الشحنات حسب المدينة</h5>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 400px; width: 100%">
                                <canvas id="cityShipmentsChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // إحصائيات الشحنات حسب الشهر
        const monthlyShipmentsData = @json($monthlyShipments);
        const monthlyLabels = monthlyShipmentsData.map(item => `شهر ${item.month}`);
        const monthlyCounts = monthlyShipmentsData.map(item => item.count);

        const monthlyShipmentsChart = new Chart(document.getElementById('monthlyShipmentsChart'), {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'عدد الشحنات',
                    data: monthlyCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });

        // إحصائيات الشحنات حسب المدينة
        const cityShipmentsData = @json($cityShipments);
        const cityLabels = cityShipmentsData.map(item => item.city);
        const cityCounts = cityShipmentsData.map(item => item.count);

        const cityShipmentsChart = new Chart(document.getElementById('cityShipmentsChart'), {
            type: 'pie',
            data: {
                labels: cityLabels,
                datasets: [{
                    label: 'عدد الشحنات',
                    data: cityCounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
    </script>
@endpush
