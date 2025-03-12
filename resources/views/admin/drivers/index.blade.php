{{-- @extends('admin.layouts.master')

@section('content')
      <!-- Main Content -->
        <section class="section">
          <div class="section-header">
            <h1>Manage User</h1>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create User</h4>

                  </div>
                  <div class="card-body">
                    <form action="{{route('drivers.store')}}" method="POST" > 
                        @csrf

                        <div class="form-group">
                            <label>الاسم</label>
                            <input type="text" class="form-control" name="name" value="">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="">
                        </div>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputState">Role</label>
                            <select id="inputState" class="form-control" name="role">
                                <option value="">Select</option>
                              <option value="user">User</option>
                              <option value="vendor">Vendor</option>
                              <option value="admin">Admin</option>

                            </select>
                        </div>
                        <button type="submmit" class="btn btn-primary">Create</button>
                    </form>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

@endsection --}}




@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>إدارة السائقين</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        {{-- <div class="card-header">
                            <h4>قائمة الشاحنات</h4>
                        </div> --}}
                        {{-- <div class="btn-container d-flex">
                            <button class="btn btn-primary mr-3">إضافة سائق</button>
                        </div> --}}
                        <div class="btn-container d-flex">
                            <a href="{{ route('drivers.create') }}" class="btn btn-primary mr-3">إضافة سائق</a>
                        </div>
                        
                        <div class="card-body">
                            {!! $dataTable->table(['class' => 'table table-striped table-bordered']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
{!! $dataTable->scripts() !!}
    {{-- {!! $dataTable->table() !!} --}}


    {{-- <script>
        $(document).on('click', '.delete-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Are you sure you want to delete this item?')) {
                $.ajax({
                    url: '/trucks/' + id,
                    type: 'get',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(result) {
                        // قم بتحديث الصفحة أو إزالة العنصر من الجدول
                        alert('Item deleted successfully!');
                    },
                    error: function(xhr, status, error) {
                        alert('Failed to delete item: ' + error);
                    }
                });
            }
        });
    </script> --}}
@endpush
