@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Mata Pelajaran')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Mata Pelajaran</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_mapel') is-invalid @enderror"
                                    value="{{ old('nama_mapel')}}" name="nama_mapel"
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
                                <label>Guru</label>
                                <select name="guru_id" id="mySelect"
                                    class="js-example-basic-single form-control form-control-sm @error('guru_id') is-invalid @enderror">
                                    <option value="0" selected disabled>-- Pilih Guru --</option>
                                    @foreach ($guru as $result)
                                    <option value="{{ $result->id }}"
                                        {{ (collect(old('guru_id'))->contains($result->id)) ? 'selected':'' }}>
                                        {{ $result->name }}
                                    </option>
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
                                    <option value="Senin" @if (old('hari_mapel')=="Senin" )
                                        {{ 'selected' }} @endif>Senin</option>
                                    <option value="Selasa" @if (old('hari_mapel')=="Selasa" )
                                        {{ 'selected' }} @endif>Selasa</option>
                                    <option value="Rabu" @if (old('hari_mapel')=="Rabu" )
                                        {{ 'selected' }} @endif>Rabu</option>
                                    <option value="Kamis" @if (old('hari_mapel')=="Kamis" )
                                        {{ 'selected' }} @endif>Kamis</option>
                                    <option value="Jumat" @if (old('hari_mapel')=="Jumat" )
                                        {{ 'selected' }} @endif>Jumat</option>
                                    <option value="Sabtu" @if (old('hari_mapel')=="Sabtu" )
                                        {{ 'selected' }} @endif>Sabtu</option>
                                    <option value="Minggu" @if (old('hari_mapel')=="Minggu" )
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
                                    value="{{ old('pukul_mapel')}}" name="pukul_mapel">
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
                                    placeholder="Masukan Keterangan">{{ old('keterangan_mapel')}}</textarea>
                                @error('keterangan_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="tambah" class="btn btn-primary" name="submitbutton"><i
                                class="fa fa-save"></i> Simpan</button>
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
