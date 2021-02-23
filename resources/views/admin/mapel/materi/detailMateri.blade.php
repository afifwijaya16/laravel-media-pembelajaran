@extends('template_backend/home')
@section('sub-breadcrumb', 'Detail Materi')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        <table class="table table-sm">
                            <tr>
                                <td><b>Mata Pelajaran</b></td>
                                <td><b>#{{ $mapel->nama_mapel }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Nama Materi</b></td>
                                <td><b>#{{ $materi->nama_materi }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Jadwal Mata Pelajaran</b></td>
                                <td><b>{{ $materi->jadwal_materi }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Keterangan Mata Pelajaran</b></td>
                                <td><b>{!! $materi->keterangan_materi !!}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                
            </div>
            <div class="card-body">
               
            </div>
        </div>
    </div>
</div>
@push('js')
@endpush
@endsection
