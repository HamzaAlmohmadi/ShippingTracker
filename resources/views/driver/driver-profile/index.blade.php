@extends('driver.layouts.master')

@section('title')
    Driver Profile
@endsection

@section('content')
    <!--=============================
            DASHBOARD START
          ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            {{-- @include('driver.layouts.sidebar') --}}

            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Driver profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group wsus__input">
                                        <label>معاينة</label>
                                        <br>
                                        <img width="200px" src="{{ asset($profile->user->image) }}" alt="">
                                    </div>
                                    <div class="form-group wsus__input">
                                        <label>الصورة</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 form-group wsus__input">
                                            <label>الاسم</label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $profile->name }}">
                                        </div>

                                        <div class="col-md-6 form-group wsus__input">
                                            <label>الهاتف</label>
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $profile->phone }}">
                                        </div>

                                        <div class="col-md-6 form-group wsus__input">
                                            <label>البريد الإلكتروني</label>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $profile->email }}">
                                        </div>

                                        <div class="col-md-6 form-group wsus__input">
                                            <label>العنوان</label>
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $profile->address }}">
                                        </div>

                                        <div class="col-md-6 form-group wsus__input">
                                            <label>كلمة المرور الجديدة</label>
                                            <input type="password" class="form-control" name="password">
                                        </div>

                                        <div class="col-md-6 form-group wsus__input">
                                            <label>تأكيد كلمة المرور</label>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">تحديث</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            DASHBOARD START
          ==============================-->
@endsection
