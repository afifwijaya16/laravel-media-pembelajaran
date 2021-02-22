@extends('template_backend/home')
@section('sub-breadcrumb', 'Data Mata Pelajaran')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('mapel.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data Mata Pelajaran</a>
            </div>
            <div class="card-body">
                @include('admin/mapel/table')
            </div>
        </div>
    </div>
</div>
@include('admin/mapel/javascript')
@endsection