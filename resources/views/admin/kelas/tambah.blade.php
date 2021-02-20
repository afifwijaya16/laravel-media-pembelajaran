@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Kelas')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('kelas.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('kelas') is-invalid @enderror"
                                    value="{{ old('kelas')}}" name="kelas" placeholder="Masukan Nama Kelas">
                                @error('kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kategori Kelas</label>
                                <select
                                    class="form-control form-control-sm @error('kategori_kelas') is-invalid @enderror"
                                    name="kategori_kelas">
                                    <option value="">Pilih Kategori Member</option>
                                    <option value="Silver" @if (old('kategori_kelas')=="Silver" ) {{ 'selected' }}
                                        @endif>Silver</option>
                                    <option value="Gold" @if (old('kategori_kelas')=="Gold" ) {{ 'selected' }} @endif>
                                        Gold</option>
                                </select>
                                @error('kategori_kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah Siswa</label>
                                <input type="number"
                                    class="form-control form-control-sm @error('jumlah_siswa') is-invalid @enderror"
                                    value="{{ old('jumlah_siswa')}}" name="jumlah_siswa"
                                    placeholder="Masukan Jumlah Siswa">
                                @error('jumlah_siswa')
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
                        <a href="{{ route('kelas.index') }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
