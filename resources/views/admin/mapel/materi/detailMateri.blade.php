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
                        <div class="media">
                            <div class="media-body">

                            </div>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            @if($materi->type_berkas_materi == "Image")
            <img src="{{ asset($materi->berkas_materi) }}" style="height:50px;width:50px;" class="img-fluid" />
            @elseif($materi->type_berkas_materi == "PDF")
            <!-- <div class='embed-responsive' style='padding-bottom:150%'>
                <object data='{{ asset($materi->berkas_materi) }}' type='application/pdf' width='100%'
                    height='100%'></object>
            </div> -->
            @endif
        </div>
    </div>
</div>
</div>
</div>
@if($materi->kategori_materi == 'Soal')
<div class="col-12">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">

        </div>
    </div>
</div>
@endif
</div>
@push('js')
@endpush
@endsection
