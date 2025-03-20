@extends('driver.layouts.master')
@section('title')
    Driver Dashboard
@endsection
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

          <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                <div class="dashboard_content">
                    <div class="wsus__dashboard">
                        <div class="row">
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #e06214;" href="#">
                                    <i class="fas fa-box"></i>
                                    <p>الطرود اليومية</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #2c3131;" href="#">
                                    <i class="fas fa-hourglass-half"></i>
                                    <p>الطرود المعلقة اليوم</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #00BCD4;" href="#">
                                    <i class="fas fa-clipboard-list"></i>
                                    <p>إجمالي الطرود</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #3a280c;" href="#">
                                    <i class="fas fa-check"></i>
                                    <p>الطرود المكتملة</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #282bd8;" href="#">
                                    <i class="fas fa-dollar-sign"></i>
                                    <p>أرباح اليوم</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                            <div class="col-xl-2 col-6 col-md-4">
                                <a class="wsus__dashboard_item" style="background-color: #7a10b7;" href="#">
                                    <i class="fas fa-calendar-alt"></i>
                                    <p>أرباح هذا الشهر</p>
                                    <h4 style="color:#ffff">-</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
    </section>
@endsection
