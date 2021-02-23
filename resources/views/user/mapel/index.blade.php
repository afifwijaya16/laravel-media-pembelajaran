@extends('template_backend/home')
@section('sub-breadcrumb', 'Halaman Mata Pelajaran')
@section('content')
<style>
.text-panjang {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}
</style>
<div class="row d-flex align-items-stretch">
    @foreach ($matapelajaran as $result => $hasil)
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
        <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                {{ $hasil->nama_mapel }}
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>Pemateri : {{ $hasil->nama_guru }}</b></h2>
                        <p class="text-muted text-sm text-panjang"><b>Keterangan: </b> {{ $hasil->keterangan_mapel }}
                        </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Hari: {{ $hasil->hari_mapel }}</li>
                            <li class="small"><span class="fa-li"></span> Pukul #: {{ $hasil->pukul_mapel }}</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-xs btn-primary">
                        <i class="fas fa-user"></i> View Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
