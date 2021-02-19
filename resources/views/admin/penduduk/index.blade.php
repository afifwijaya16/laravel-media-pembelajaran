@extends('template_backend/home')
@section('sub-breadcrumb', 'Penduduk')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Penduduk
            </div>
            <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('admin/penduduk/table')
            </div>
        </div>
    </div>
</div>
@include('admin/penduduk/javascript')
@endsection