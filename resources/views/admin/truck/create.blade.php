@extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>إدارة الشاحنات</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>إنشاء شاحنة</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('trucks.store')}}" method="POST" > 
                        @csrf

                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label>رقم لوحة الشاحنة</label>
                            <input type="text" class="form-control" name="truck_number" value="">
                        </div>

                        <div class="form-group">
                            <label>سعة الشاحنة</label>
                            <input type="text" class="form-control" name="capacity" value="">
                        </div>

                        {{-- <div class="form-group">
                            <label for="inputState">الحالة</label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">اختر</option>
                                <option value="active">نشط</option>
                                <option value="inactive">غير نشط</option>
                                <option value="maintenance">صيانة</option>
                            </select>
                        </div> --}}

                        <button type="submmit" class="btn btn-primary">إنشاء</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection

