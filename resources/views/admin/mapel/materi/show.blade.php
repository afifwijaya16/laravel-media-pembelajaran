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
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('mapel.store') }}" role="form" method="POST">
                    @csrf
                    <input type="hidden" class="form-control" name="mapel_id" value="{{ $mapel->id }}">
                    <button type="submit" value="tambah_view_materi" class="btn btn-xs btn-primary"
                        name="submitbutton"><i class="fa fa-plus"></i> Tambah Data Materi</button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable-1" class="table table-sm table-bordered table-striped" width="100%">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Aksi</th>
                                <th class="text-center">Nama Materi</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mapel->materi as $result => $hasil)
                            <tr class="table-sm">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('mapel.store') }}" role="form" method="POST">
                                            @csrf
                                            <input type="hidden" name="hasil_id" value="{{ $hasil->id }}">
                                            <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                                            <button type="submit" value="edit_view_materi" class="btn btn-xs btn-warning"
                                                name="submitbutton"><i class="fa fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('mapel.store') }}" role="form" method="POST"
                                            id="form-delete-{{ $hasil->id }}">
                                            @csrf
                                            <input type="hidden" name="id_mapel"
                                                value="{{ $mapel->id }}">
                                            <input type="hidden" name="id" value="{{ $hasil->id }}">
                                            <input type="hidden" name="materi_hapus" value="{{ $hasil->id }}">
                                            <button type="submit" value="hapus_materi" class="btn btn-xs btn-danger"
                                                name="submitbutton" onclick="deleteFunction({{ $hasil->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                     </div>
                                </td>
                                <td class="text-center">{{ $hasil->nama_materi }}</td>
                                <td class="text-center">{{ $hasil->kategori_materi }}</td>
                                <td class="text-center">
                                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                                        @foreach ($hasil->materikelas as $materi_kelas)
                                        <li>{{ $materi_kelas->kelas->kelas }} </li>
                                        @endforeach
                                    </ul>
                                </td>
                            </tr>
                            @endforeach
                    </table>
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