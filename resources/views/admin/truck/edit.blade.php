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
                    <h4>تعديل شاحنة</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{route('trucks.update',$truck->id)}}" method="POST"> 
                        @csrf
                        @method('PUT')

                        {{-- <input type="hidden" class="form-control" name="name" value="{{  }}"> --}}
                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control" name="name" value="{{ $truck->name }}">
                        </div>

                        <div class="form-group">
                            <label>رقم لوحة الشاحنة</label>
                            <input type="text" class="form-control" name="truck_number" value="{{ $truck->truck_number }}">
                        </div>

                        <div class="form-group">
                            <label>سعة الشاحنة</label>
                            <input type="text" class="form-control" name="capacity" value="{{ $truck->capacity }}">
                        </div>

                        <div class="form-group">
                            <label for="inputState">الحالة</label>
                            <select id="inputState" class="form-control" name="status">
                                <option value="">اختر</option>
                                <option value="active" {{ $truck->status == 'active' ? 'selected' : '' }}>نشط</option>
                                <option value="inactive" {{ $truck->status == 'inactive' ? 'selected' : '' }}>غير نشط</option>
                                <option value="maintenance" {{ $truck->status == 'maintenance' ? 'selected' : '' }}>صيانة</option>
                            </select>
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
