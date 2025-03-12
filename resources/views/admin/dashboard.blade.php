{{-- @extends('admin.layouts.master')

@section('title', 'التقارير')
@push('css')

    <style>
      .chart-container {
          width:100px;
          height: 100px;
          margin: 20px;
          display: inline-block;
      }
  </style>
@endpush
@section('content')
    <section class="section">
        <div class="section-header">
            <h1> تقارير النظام </h1>
        </div>
        <!-- مخطط الشحنات اليومية -->
        <canvas id="dailyShipmentsChart"></canvas>
        <!-- مخطط الشحنات حسب الحالة -->
        <canvas id="shipmentStatusChart"></canvas>
        <!-- مخطط أرباح الشهور -->
        <canvas id="monthlyEarningsChart"></canvas>

    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // مخطط الشحنات اليومية
        var ctxDaily = document.getElementById('dailyShipmentsChart').getContext('2d');
        var dailyShipmentsChart = new Chart(ctxDaily, {
            type: 'line',
            data: {
                labels: ['اليوم 1', 'اليوم 2', 'اليوم 3', 'اليوم 4', 'اليوم 5'],
                datasets: [{
                    label: 'الشحنات اليومية',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط الشحنات حسب الحالة
        var ctxStatus = document.getElementById('shipmentStatusChart').getContext('2d');
        var shipmentStatusChart = new Chart(ctxStatus, {
            type: 'pie',
            data: {
                labels: ['في الطريق', 'معلقة', 'مكتملة'],
                datasets: [{
                    data: [10, 20, 30],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                }]
            },
            options: {
                responsive: true
            }
        });

        // مخطط أرباح الشهور
        var ctxMonthly = document.getElementById('monthlyEarningsChart').getContext('2d');
        var monthlyEarningsChart = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر',
                    'نوفمبر', 'ديسمبر'
                ],
                datasets: [{
                    label: 'أرباح الشهور',
                    data: [12, 19, 3, 5, 2, 3, 15, 18, 21, 30, 45, 50],
                    backgroundColor: [
                        '#FF6B6B', '#4CAF50', '#00BCD4', '#FF9800', '#FFEB3B', '#9C27B0',
                        '#FF6B6B', '#4CAF50', '#00BCD4', '#FF9800', '#FFEB3B', '#9C27B0'
                    ],
                    borderColor: '#FFFFFF',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط نسبة اكتمال الشحنات
        var ctxCompletion = document.getElementById('completionRateChart').getContext('2d');
        var completionRateChart = new Chart(ctxCompletion, {
            type: 'doughnut',
            data: {
                labels: ['مكتملة', 'غير مكتملة'],
                datasets: [{
                    data: [60, 40],
                    backgroundColor: ['#4CAF50', '#FF9800']
                }]
            },
            options: {
                responsive: true
            }
        });

        // مخطط الشحنات حسب المناطق
        var ctxRegion = document.getElementById('shipmentsByRegionChart').getContext('2d');
        var shipmentsByRegionChart = new Chart(ctxRegion, {
            type: 'polarArea',
            data: {
                labels: ['المنطقة 1', 'المنطقة 2', 'المنطقة 3', 'المنطقة 4'],
                datasets: [{
                    data: [10, 15, 8, 5],
                    backgroundColor: ['#FF6B6B', '#4CAF50', '#00BCD4', '#9C27B0']
                }]
            },
            options: {
                responsive: true
            }
        });

        // مخطط زمني للتوصيل
        var ctxTimeline = document.getElementById('deliveryTimelineChart').getContext('2d');
        var deliveryTimelineChart = new Chart(ctxTimeline, {
            type: 'line',
            data: {
                labels: ['اليوم 1', 'اليوم 2', 'اليوم 3', 'اليوم 4', 'اليوم 5'],
                datasets: [{
                    label: 'زمن التوصيل',
                    data: [2, 2.5, 3, 4, 1.5],
                    backgroundColor: 'rgba(255, 159, 64, 0.2)',
                    borderColor: 'rgba(255, 159, 64, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
 --}}



@extends('admin.layouts.master')

@section('title', 'داشبورد تتبع الشحنات')
@push('css')

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .badge {
            font-size: 14px;
        }
        #map {
            height: 300px;
            border-radius: 10px;
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>داشبورد تتبع الشحنات</h1>
        </div>

        <div class="container-fluid p-3">
            <!-- إحصائيات سريعة -->
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">عدد الشحنات</h5>
                            <p class="card-text">150</p>
                            <span class="badge bg-success">+10 جديد</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">قيد التوصيل</h5>
                            <p class="card-text">80</p>
                            <span class="badge bg-warning">في الطريق</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">تم التسليم</h5>
                            <p class="card-text">60</p>
                            <span class="badge bg-success">تم التسليم</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">متأخرة</h5>
                            <p class="card-text">10</p>
                            <span class="badge bg-danger">عاجل</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الرسوم البيانية -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">الشحنات اليومية</div>
                        <div class="card-body">
                            <canvas id="dailyShipmentsChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">توزيع الشحنات حسب الحالة</div>
                        <div class="card-body">
                            <canvas id="shipmentStatusChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">أرباح الشهور</div>
                        <div class="card-body">
                            <canvas id="monthlyEarningsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- خريطة تتبع الشحنات -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">خريطة تتبع الشحنات</div>
                        <div class="card-body">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- قائمة الشحنات الأخيرة -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">الشحنات الأخيرة</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>رقم التتبع</th>
                                        <th>المرسل</th>
                                        <th>المستلم</th>
                                        <th>الحالة</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>123456</td>
                                        <td>شركة A</td>
                                        <td>محمد أحمد</td>
                                        <td><span class="badge bg-warning">قيد التوصيل</span></td>
                                        <td>2023-10-15</td>
                                    </tr>
                                    <tr>
                                        <td>789012</td>
                                        <td>شركة B</td>
                                        <td>فاطمة خالد</td>
                                        <td><span class="badge bg-success">تم التسليم</span></td>
                                        <td>2023-10-14</td>
                                    </tr>
                                    <tr>
                                        <td>345678</td>
                                        <td>شركة C</td>
                                        <td>علي محمود</td>
                                        <td><span class="badge bg-danger">متأخرة</span></td>
                                        <td>2023-10-13</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // مخطط الشحنات اليومية
        var ctxDaily = document.getElementById('dailyShipmentsChart').getContext('2d');
        var dailyShipmentsChart = new Chart(ctxDaily, {
            type: 'line',
            data: {
                labels: ['اليوم 1', 'اليوم 2', 'اليوم 3', 'اليوم 4', 'اليوم 5'],
                datasets: [{
                    label: 'الشحنات اليومية',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // مخطط الشحنات حسب الحالة
        var ctxStatus = document.getElementById('shipmentStatusChart').getContext('2d');
        var shipmentStatusChart = new Chart(ctxStatus, {
            type: 'pie',
            data: {
                labels: ['قيد التوصيل', 'تم التسليم', 'متأخرة'],
                datasets: [{
                    data: [80, 60, 10],
                    backgroundColor: ['#ffc107', '#28a745', '#dc3545']
                }]
            },
            options: {
                responsive: true
            }
        });

        // مخطط أرباح الشهور
        var ctxMonthly = document.getElementById('monthlyEarningsChart').getContext('2d');
        var monthlyEarningsChart = new Chart(ctxMonthly, {
            type: 'bar',
            data: {
                labels: ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'],
                datasets: [{
                    label: 'أرباح الشهور',
                    data: [12, 19, 3, 5, 2, 3, 15, 18, 21, 30, 45, 50],
                    backgroundColor: [
                        '#FF6B6B', '#4CAF50', '#00BCD4', '#FF9800', '#FFEB3B', '#9C27B0',
                        '#FF6B6B', '#4CAF50', '#00BCD4', '#FF9800', '#FFEB3B', '#9C27B0'
                    ],
                    borderColor: '#FFFFFF',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // خريطة تتبع الشحنات
        const map = L.map('map').setView([24.7136, 46.6753], 5); // مركز الخريطة (السعودية)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // إضافة علامات للشحنات
        L.marker([24.7136, 46.6753]).addTo(map) // موقع الشحنة 1
            .bindPopup('الشحنة 123456 - قيد التوصيل');
        L.marker([21.5433, 39.1728]).addTo(map) // موقع الشحنة 2
            .bindPopup('الشحنة 789012 - تم التسليم');
    </script>
@endpush