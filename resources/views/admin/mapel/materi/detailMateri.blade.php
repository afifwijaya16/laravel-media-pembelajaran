@extends('template_backend/home')
@section('sub-breadcrumb', 'Detail Materi')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('mapel.show', $mapel->id) }}" class="btn btn-xs btn-primary"><i
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
                                <td><b>Nama Materi</b></td>
                                <td><b>{{ $materi->nama_materi }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Jadwal</b></td>
                                <td><b>{{ $mapel->hari_mapel }}, {{ $mapel->pukul_mapel }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Materi </b></td>
                                <td> 
                                    @if($materi->kategori_materi == 'Materi')
                                        <a href="{{ asset($materi->berkas_materi) }}" target="_blank"
                                                class="btn btn-xs bg-purple"><i class="fa fa-file"></i> Download Materi</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Keterangan</b></td>
                                <td><b>{!! $materi->keterangan_materi !!}</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12">
                        @if(!$materi->url_video_materi == '-')
                        <div class="timeline">
                            <div>
                                <i class="fas fa-video bg-maroon"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">Video Materi</h3>
                                    <div class="timeline-body">

                                        <div class="embed-responsive embed-responsive-16by9">
                                            {!! Embed::make($materi->url_video_materi)->parseUrl()->getIframe() !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @if($materi->type_berkas_materi == "Image")
            <!-- <img src="{{ asset($materi->berkas_materi) }}" style="height:50px;width:50px;" class="img-fluid" /> -->
            @elseif($materi->type_berkas_materi == "PDF")
            <!-- <div class='embed-responsive' style='padding-bottom:150%'>
                <object data='{{ asset($materi->berkas_materi) }}' type='application/pdf' width='100%'
                    height='100%'></object>
            </div> -->
            @endif
        </div>
    </div>
</div>
@if($materi->kategori_materi == 'Soal')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal-xl"
                data-backdrop="static" data-keyboard="false">
                <i class="fa fa-plus"></i> Tambah Soal
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Soal</th>
                            <th>a</th>
                            <th>b</th>
                            <th>c</th>
                            <th>d</th>
                            <th>e</th>
                            <th>Jawaban</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($soal_materi as $result => $hasil)
                        <tr class="table-sm">
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $hasil->soal_materi }}</td>
                            <td class="text-center">{{ $hasil->jawaban_soal_a }}</td>
                            <td class="text-center">{{ $hasil->jawaban_soal_b }}</td>
                            <td class="text-center">{{ $hasil->jawaban_soal_c }}</td>
                            <td class="text-center">{{ $hasil->jawaban_soal_d }}</td>
                            <td class="text-center">{{ $hasil->jawaban_soal_e }}</td>
                            <td class="text-center">{{ $hasil->jawaban_benar }}</td>
                            <td class="text-center">
                                <form action="{{ route('mapel.store') }}" role="form" method="POST"
                                    id="form-delete-{{ $hasil->id }}">
                                    @csrf
                                    <input type="hidden" name="mapel_id" value="{{ $hasil->mapel_id }}">
                                    <input type="hidden" name="hasil_id" value="{{ $hasil->materi_id }}">
                                    <input type="hidden" name="id" value="{{ $hasil->id }}">

                                    <input type="hidden" name="soal_hapus_data" value="{{ $hasil->id }}">
                                    <button type="submit" value="soal_hapus" class="btn btn-xs btn-danger"
                                        name="submitbutton" onclick="deleteFunction({{ $hasil->id }})"><i
                                            class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Soal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('mapel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Soal</label>
                            <input type="hidden" name="mapel_id" value="{{ $id_mapel }}">
                            <input type="hidden" name="hasil_id" value="{{ $materi->id }}">
                            <textarea class="form-control  @error('soal_materi') is-invalid @enderror" rows="3"
                                name="soal_materi" placeholder="Masukan Soal"
                                required>{{ old('soal_materi')}}</textarea>
                            <table class="table table-sm table-bordered table-striped">
                                <tr>
                                    <td width="5%">a</td>
                                    <td> <input type="text"
                                            class="form-control form-control-sm @error('jawaban_soal_a') is-invalid @enderror"
                                            value="{{ old('jawaban_soal_a')}}" name="jawaban_soal_a"
                                            placeholder="Masukan pilihan a " required></td>
                                </tr>
                                <tr>
                                    <td>b</td>
                                    <td> <input type="text"
                                            class="form-control form-control-sm @error('jawaban_soal_b') is-invalid @enderror"
                                            value="{{ old('jawaban_soal_b')}}" name="jawaban_soal_b"
                                            placeholder="Masukan pilihan b " required></td>
                                </tr>
                                <tr>
                                    <td>c</td>
                                    <td> <input type="text"
                                            class="form-control form-control-sm @error('jawaban_soal_c') is-invalid @enderror"
                                            value="{{ old('jawaban_soal_c')}}" name="jawaban_soal_c"
                                            placeholder="Masukan pilihan c " required></td>
                                </tr>
                                <tr>
                                    <td>d</td>
                                    <td> <input type="text"
                                            class="form-control form-control-sm @error('jawaban_soal_d') is-invalid @enderror"
                                            value="{{ old('jawaban_soal_d')}}" name="jawaban_soal_d"
                                            placeholder="Masukan pilihan d " required></td>
                                </tr>
                                <tr>
                                    <td>e</td>
                                    <td> <input type="text"
                                            class="form-control form-control-sm @error('jawaban_soal_e') is-invalid @enderror"
                                            value="{{ old('jawaban_soal_e')}}" name="jawaban_soal_e"
                                            placeholder="Masukan pilihan e " required></td>
                                </tr>
                                <tr>
                                    <td>Jawaban Yang benar</td>
                                    <td> 
                                        <select
                                            class="form-control form-control-sm @error('jawaban_benar') is-invalid @enderror"
                                            name="jawaban_benar" required>
                                            <option value="">Pilih Type</option>
                                            <option value="A" @if (old('jawaban_benar')=="A" ) {{ 'selected' }}
                                                @endif>A</option>
                                            <option value="B" @if (old('jawaban_benar')=="B" ) {{ 'selected' }} @endif>
                                                B</option>
                                            <option value="C" @if (old('jawaban_benar')=="C" ) {{ 'selected' }} @endif>
                                                C</option>
                                            <option value="D" @if (old('jawaban_benar')=="D" ) {{ 'selected' }} @endif>
                                                D</option>
                                            <option value="E" @if (old('jawaban_benar')=="E" ) {{ 'selected' }} @endif>
                                                E</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="submit" value="save_soal_materi" class="btn btn-xs btn-warning"
                        name="submitbutton"><i class="fa fa-save"></i> Simpan </button>
                    <button type="button" class="btn btn-xs btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
@if (session('status_soal'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status_soal') }}',
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
