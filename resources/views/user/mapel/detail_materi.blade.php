@extends('template_backend/home')
@section('sub-breadcrumb', 'Detail Materi')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <form action="{{ route('mapel_user.store') }}" role="form" method="POST">
                    @csrf
                    <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                    <button type="submit" value="cek_materi" class="btn btn-xs btn-warning" name="submitbutton"><i
                            class="fa fa-arrow-left"></i> Kembali</button>
                </form>
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
                            @if($materi->kategori_materi == 'Materi')
                            <tr>
                                <td><b>Materi </b></td>
                                <td>
                                    <a href="{{ asset($materi->berkas_materi) }}" target="_blank"
                                        class="btn btn-xs bg-purple"><i class="fa fa-file"></i> Download Materi</a>
                                </td>
                            </tr>
                            @endif
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
            <h5> SOAL PILIHAN GANDA</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('mapel_user.store') }}" role="form" method="POST">
                @csrf
                <input type="hidden" name="hasil_id" value="{{ $materi->id }}">
                <input type="hidden" name="mapel_id" value="{{ $mapel->id }}">
                @foreach ($soal_materi as $result => $hasil)
                <ol start="{{ $loop->iteration }}" type="1">
                    <li>{{ $hasil->soal_materi }}</li>
                    <ol start="1" type="a">
                        <li><input type="radio" name="jawaban_{{ $loop->iteration }}" value="a"> {{ $hasil->jawaban_soal_a }}</li>
                        <li><input type="radio" name="jawaban_{{ $loop->iteration }}" value="b"> {{ $hasil->jawaban_soal_b }}</li>
                        <li><input type="radio" name="jawaban_{{ $loop->iteration }}" value="c"> {{ $hasil->jawaban_soal_c }}</li>
                        <li><input type="radio" name="jawaban_{{ $loop->iteration }}" value="d"> {{ $hasil->jawaban_soal_d }}</li>
                        <li><input type="radio" name="jawaban_{{ $loop->iteration }}" value="e"> {{ $hasil->jawaban_soal_e }}</li>
                    </ol>
                </ol>
                @endforeach
                <button type="submit" value="jawaban_soal" class="btn btn-xs btn-info"
                    name="submitbutton"><i class="fa fa-save"></i> Selesai Mengerjakan</button>
            </form>
        </div>
    </div>
</div>
@endif
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
