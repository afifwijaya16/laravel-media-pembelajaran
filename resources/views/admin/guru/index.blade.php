@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Guru')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Guru
            </div>
            <div class="card-body">
                <a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary float-right my-3"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('admin/guru/table')
            </div>
        </div>
    </div>
</div>
@include('admin/guru/javascript')
@endsection