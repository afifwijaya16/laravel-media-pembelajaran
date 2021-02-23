@extends('template_backend/home')
@section('sub-breadcrumb', 'Halaman Mata Pelajaran')
@section('content')
<div class="row d-flex align-items-stretch">
    @foreach ($matapelajaran as $result => $hasil)
    <div class="col-12 col-sm-6 col-md-3">
        <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0 bg-info">
                Pemateri : {{ $hasil->nama_guru }}
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-12">
                        <h5 class="lead m-0 p-0"><b>{{ $hasil->nama_mapel }}</b></h5>
                        <p class="text-muted text-sm m-0 p-0">Hari</p>
                        <p class="text-muted text-sm m-0 p-0">Pukul</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-xs btn-primary">
                        <i class="fa fa-eye"></i> View Materi
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
