@extends('frontend.dashboard.layouts.master')

@section('title', 'نموذج إنشاء')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <!-- النموذج -->
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title">نموذج إنشاء</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="#" novalidate>
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">اسم الموقع</label>
                                <input type="text" class="form-control" placeholder="أدخل اسم الموقع" name="site_name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">العنوان</label>
                                <input type="text" class="form-control" placeholder="أدخل العنوان" name="address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">البريد الإلكتروني</label>
                                <input type="email" class="form-control" placeholder="أدخل البريد الإلكتروني" name="email">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" placeholder="أدخل رقم الهاتف" name="phone">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">فيسبوك</label>
                                <input type="url" class="form-control" placeholder="أدخل رابط فيسبوك" name="facebook">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">إنستجرام</label>
                                <input type="url" class="form-control" placeholder="أدخل رابط إنستجرام" name="instagram">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">X (تويتر)</label>
                                <input type="url" class="form-control" placeholder="أدخل رابط X" name="x">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">لينكد إن</label>
                                <input type="url" class="form-control" placeholder="أدخل رابط لينكد إن" name="linkedin">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">إنشاء</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection