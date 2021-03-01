@extends('template_backend/home')
@section('sub-breadcrumb', 'Detail Materi')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('mapel_user.index') }}" class="btn btn-xs btn-primary"><i
                        class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-sm">
                            <tr>
                                <td><b>Mata Pelajaran</b></td>
                                <td><b>{{ $mapel->nama_mapel }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Pemateri</b></td>
                                <td><b>{{ $mapel->nama_guru }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Jadwal</b></td>
                                <td><b>{{ $mapel->hari_mapel }}, {{ $mapel->pukul_mapel }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table id="dataTable-1" class="table table-sm table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Detail</th>
                                    <th class="text-center">Nama Materi</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Berkas Materi</th>
                                    <th class="text-center">Url Video</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materi as $result => $hasil)
                                <tr class="table-sm">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">
                                       
                                        @if($hasil->kategori_materi == "Soal")
                                        <form action="{{ route('mapel_user.store') }}" role="form" method="POST">
                                            @csrf
                                            <input type="hidden" name="hasil_id" value="{{ $hasil->id }}">
                                            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                                            <button type="submit" value="detail_materi" class="btn btn-xs btn-danger"
                                                name="submitbutton"><i class="fa fa-edit"></i> Kerjakan Soal</button>
                                        </form>
                                        @elseif($hasil->kategori_materi == "Materi")
                                        <form action="{{ route('mapel_user.store') }}" role="form" method="POST">
                                            @csrf
                                            <input type="hidden" name="hasil_id" value="{{ $hasil->id }}">
                                            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                                            <button type="submit" value="detail_materi" class="btn btn-xs btn-info"
                                                name="submitbutton"><i class="fa fa-eye"></i></button>
                                            
                                        </form>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $hasil->nama_materi }}</td>
                                    <td class="text-center">{{ $hasil->kategori_materi }}</td>
                                    <td class="text-center">
                                        @if($hasil->type_berkas_materi == "Image")
                                        <!-- <img src="{{ asset($hasil->berkas_materi) }}" style="height:50px;width:50px;" class="img-fluid"/> -->
                                        @elseif($hasil->type_berkas_materi == "PDF")
                                        <a href="{{ asset($hasil->berkas_materi) }}" target="_blank"
                                            class="btn btn-sm bg-purple"><i class="fa fa-file"></i></a>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <!-- <iframe width="420" height="315" src="https://youtu.be/embed/5jouDCyFOQo?list=RDMMO489siBfoxA" frameborder="0" allowfullscreen></iframe> -->
                                        @if(!$hasil->url_video_materi == '-')
                                        <a href="{{ $hasil->url_video_materi }}" target="_blank"
                                            class="btn btn-sm btn-info"><i class="fas fa-video"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('status_soal'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('
        status_soal ') }}',
    })

</script>
@endif
@push('js')
<script>
    function deleteFunction($id) {
        event.preventDefault();
        const form = 'form-delete-' + $id;
        Swal.fire({
            title: 'Apakah anda yakin menghapus ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(form).submit();
            }
        }).catch((error) => {
            console.log(error);
        })
    }

</script>
@endpush
@endsection
