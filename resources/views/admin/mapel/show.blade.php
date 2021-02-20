@extends('template_backend/home')
@section('sub-breadcrumb', 'Detail Mata pelajaran')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-globe"></i> Media Pembelajaran
                        </h4>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        <table class="table table-sm">
                            <tr>
                                <td><b>Mata Pelajaran</b></td>
                                <td><b>#{{ $mapel->nama_mapel }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Guru</b></td>
                                <td><b>{{ $mapel->guru->name }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Jadwal Mata Pelajaran</b></td>
                                <td><b>{{ $mapel->jadwal_mapel }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Keterangan Mata Pelajaran</b></td>
                                <td><b>{!! $mapel->keterangan_mapel !!}</b></td>
                            </tr>
                            

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Kelas yang terdapat Mata pelajaran </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin/mapel/show_Dkelas')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Kelas</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin/mapel/show_Tkelas')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('
        status ') }}',
    })

</script>
@endif
@endsection
