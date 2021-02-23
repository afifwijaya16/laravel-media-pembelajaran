@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Mata Pelajaran')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Mata Pelajaran</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_mapel') is-invalid @enderror"
                                    value="{{ $mapel->nama_mapel }}" name="nama_mapel"
                                    placeholder="Masukan Nama Mata Pelajaran">
                                @error('nama_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pilih guru</label>
                                <select name="guru_id" id="mySelect"
                                    class="js-example-basic-single form-control form-control-sm @error('guru_id') is-invalid @enderror">
                                    <option selected disabled>-- Pilih Guru--</option>
                                    @foreach ($guru as $result)
                                    <option value="{{ $result->id }}" @if ($mapel->guru_id == $result->id) selected
                                        @endif >{{ $result->name }}</option>
                                    @endforeach
                                </select>
                                @error('guru_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hari</label>
                                <select
                                    class="form-control form-control-sm @error('hari_mapel') is-invalid @enderror"
                                    name="hari_mapel">
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin" @if ($mapel->hari_mapel == 'Senin')
                                        {{ 'selected' }} @endif>Senin</option>
                                    <option value="Selasa" @if ($mapel->hari_mapel == 'Selasa')
                                        {{ 'selected' }} @endif>Selasa</option>
                                    <option value="Rabu" @if ($mapel->hari_mapel == 'Rabu')
                                        {{ 'selected' }} @endif>Rabu</option>
                                    <option value="Kamis" @if ($mapel->hari_mapel == 'Kamis')
                                        {{ 'selected' }} @endif>Kamis</option>
                                    <option value="Jumat" @if ($mapel->hari_mapel == 'Jumat')
                                        {{ 'selected' }} @endif>Jumat</option>
                                    <option value="Sabtu" @if ($mapel->hari_mapel == 'Sabtu')
                                        {{ 'selected' }} @endif>Sabtu</option>
                                    <option value="Minggu" @if ($mapel->hari_mapel == 'Minggu')
                                        {{ 'selected' }} @endif>Minggu</option>
                                </select>
                                @error('hari_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jadwal</label>
                                <input type="time"
                                    class="form-control form-control-sm @error('pukul_mapel') is-invalid @enderror"
                                    value="{{ $mapel->pukul_mapel }}" name="pukul_mapel">
                                @error('pukul_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea 
                                    class="form-control  @error('keterangan_mapel') is-invalid @enderror" rows="3"
                                    name="keterangan_mapel"
                                    placeholder="Masukan Keterangan">{{ $mapel->keterangan_mapel }}</textarea>
                                @error('keterangan_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Perbarui</button>
                        <a href="{{ route('mapel.index') }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
@endsection
