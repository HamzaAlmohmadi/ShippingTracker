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
                    <h4>تعديل السائق</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم</label>
                                    <input type="text" class="form-control" name="name" value="{{ $driver->name }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الهاتف</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $driver->phone }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>البريد الإلكتروني</label>
                                    <input type="email" class="form-control" name="email" value="{{ $driver->email }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>كلمة المرور</label>
                                    <input type="password" class="form-control" name="password">
                                    <small class="form-text text-muted">اترك الحقل فارغًا إذا كنت لا ترغب في تغيير كلمة المرور</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>العنوان</label>
                                    <input type="text" class="form-control" name="address" value="{{ $driver->address }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>رقم الرخصة</label>
                                    <input type="text" class="form-control" name="license_number" value="{{ $driver->license_number }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الحالة</label>
                                    <select class="form-control" name="status">
                                        <option value="متاح" {{ $driver->status == 'متاح' ? 'selected' : '' }}>متاح</option>
                                        <option value="مشغول" {{ $driver->status == 'مشغول' ? 'selected' : '' }}>مشغول</option>
                                        <option value="في الطريق" {{ $driver->status == 'في الطريق' ? 'selected' : '' }}>في الطريق</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الشاحنة</label>
                                    <select class="form-control" name="truck_id">
                                        @foreach($trucks as $truck)
                                            <option value="{{ $truck->id }}" {{ $driver->truck_id == $truck->id ? 'selected' : '' }}>{{ $truck->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">تعديل</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection
