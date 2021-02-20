@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Kelas')
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
                                <td><b>Kelas</b></td>
                                <td><b>#{{ $kelas->kelas }}</b></td>
                            </tr>
                            <tr>
                                <td><b>Kategori Kelas</b></td>
                                <td>
                                    @if($kelas->kategori_kelas == 'Silver')
                                    <span class="badge badge-secondary">{{ $kelas->kategori_kelas }}</span>
                                    @elseif($kelas->kategori_kelas == 'Gold')
                                    <span class="badge badge-warning">{{ $kelas->kategori_kelas }}</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><b>Jumlah Siswa Max</b></td>
                                <td><b>{{ $kelas->jumlah_siswa }}</b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        @include('admin/kelas/show_Dsiswa')
                    </div>
                    <div class="col-sm-6">
                        @include('admin/kelas/show_Tsiswa')
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
        title: '{{ session('status') }}',
    })
</script>
@endif
@endsection
