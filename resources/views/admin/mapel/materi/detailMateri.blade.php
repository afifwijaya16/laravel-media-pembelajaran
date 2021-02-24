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
                                <td> <a href="{{ asset($materi->berkas_materi) }}" target="_blank"
                                        class="btn btn-xs bg-purple"><i class="fa fa-file"></i> Download Materi</a></td>
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
                            <input type="hidden" name="materi_id" value="{{ $materi->id }}">
                            <textarea class="form-control  @error('data_soal') is-invalid @enderror" rows="3"
                                name="data_soal" placeholder="Masukan Keterangan"
                                required>{{ old('soal_data')}}</textarea>
                            @error('soal_data')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
@endpush
@endsection
