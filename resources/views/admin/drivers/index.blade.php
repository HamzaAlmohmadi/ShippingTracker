



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

@endpush
