@extends('template_backend/home')
@section('sub-breadcrumb', 'Siswa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data Siswa </a>
            </div>
            <div class="card-body">
                @include('admin/siswa/table')
            </div>
        </div>
    </div>
</div>
@include('admin/siswa/javascript')
@endsection