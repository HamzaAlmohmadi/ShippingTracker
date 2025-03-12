@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>إدارة السائقين</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>إنشاء سائق جديد</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('drivers.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="phone" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الإلكتروني</label>
                                    <input type="email" class="form-control" name="email" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="address" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الرخصة</label>
                                    <input type="text" class="form-control" name="license_number" value="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الحالة</label>
                                    <select class="form-control" name="status">
                                        <option value="متاح">متاح</option>
                                        <option value="مشغول">مشغول</option>
                                        <option value="في الطريق">في الطريق</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الشاحنة</label>
                                    <select class="form-control" name="truck_id">
                                        <!-- افترض أن لديك الشاحنات محملة في متغير $trucks -->
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}">{{ $truck->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">إنشاء</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection
