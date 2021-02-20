@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Kelas')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Kelas
            </div>
            <div class="card-body">
                <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('admin/kelas/table')
            </div>
        </div>
    </div>
</div>
@include('admin/kelas/javascript')
@endsection