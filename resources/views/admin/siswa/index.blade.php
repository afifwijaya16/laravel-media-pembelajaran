@extends('template_backend/home')
@section('sub-breadcrumb', 'Siswa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Siswa
            </div>
            <div class="card-body">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-info float-right"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                @include('admin/siswa/table')
            </div>
        </div>
    </div>
</div>
@include('admin/siswa/javascript')
@endsection