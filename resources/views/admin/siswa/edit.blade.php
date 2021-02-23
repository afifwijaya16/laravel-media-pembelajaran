@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Siswa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Perbarui Siswa
            </div>
            <form action="{{ route('user.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="img-fluid img-circle" src="{{ asset($siswa->foto) }}"
                                            alt="User profile picture">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control form-control-sm @error('foto') is-invalid @enderror"
                                            value="" name="foto" placeholder="">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <a href="{{ route('user.index') }}"
                                        class="btn btn-sm btn-info"
                                        title="Kembali Ke Data Siswa"><i class="fa fa-arrow-alt-circle-left"></i>
                                        Kembali
                                        Ke Halaman
                                        Siswa</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                            <h5 class="m-0" style="color:white">DATA SISWA</h5>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                    value="{{ $siswa->name }}" name="name" placeholder="Masukan Nama">
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Kategori Member</label>
                                                <select
                                                    class="form-control form-control-sm @error('kategori') is-invalid @enderror"
                                                    name="kategori">
                                                    <option value="">Pilih Kategori Member</option>
                                                    <option value="Silver" @if ($siswa->kategori == 'Silver')
                                                        {{ 'selected' }} @endif>Silver</option>
                                                    <option value="Gold" @if ($siswa->kategori == 'Gold')
                                                        {{ 'selected' }} @endif>Gold</option>
                                                </select>
                                                @error('kategori')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select
                                                    class="form-control form-control-sm @error('agama') is-invalid @enderror"
                                                    name="agama">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam" @if ($siswa->agama == 'Islam')
                                                        {{ 'selected' }} @endif >Islam</option>
                                                    <option value="Kristen" @if ($siswa->agama == 'Kristen')
                                                        {{ 'selected' }} @endif >Kristen</option>
                                                    <option value="Katolik" @if ($siswa->agama == 'Katolik')
                                                        {{ 'selected' }} @endif>Katolik</option>
                                                    <option value="Budha" @if ($siswa->agama == 'Budha')
                                                        {{ 'selected' }} @endif >Budha</option>
                                                    <option value="Hindu" @if ($siswa->agama == 'Hindu')
                                                        {{ 'selected' }} @endif>Hindu</option>
                                                </select>
                                                @error('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select
                                                    class="form-control form-control-sm @error('sex') is-invalid @enderror"
                                                    name="sex">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="Laki - laki" @if ($siswa->sex == 'Laki - laki')
                                                        {{ 'selected' }} @endif>Laki - laki</option>
                                                    <option value="Perempuan" @if ($siswa->sex == 'Perempuan')
                                                        {{ 'selected' }} @endif>Perempuan</option>
                                                </select>
                                                @error('sex')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                            <h5 class="m-0" style="color:white">DATA KELAHIRAN</h5>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('tanggallahir') is-invalid @enderror"
                                                    value="{{ $siswa->tanggallahir }}" name="tanggallahir"
                                                    placeholder="Masukan Tanggal Lahir">
                                                @error('tanggallahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('tempatlahir') is-invalid @enderror"
                                                    value="{{ $siswa->tempatlahir }}" placeholder="Masukan Tempat Lahir"
                                                    name="tempatlahir">
                                                @error('tempatlahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                            <h5 class="m-0" style="color:white">DATA ORANG TUA</h5>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nama Orang Tua</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nama_orang_tua') is-invalid @enderror"
                                                    value="{{ $siswa->nama_orang_tua }}" name="nama_orang_tua"
                                                    placeholder="Masukan Nama Orang Tua">
                                                @error('nama_orang_tua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>No Telepon Orang tua</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('no_telepon_orang_tua') is-invalid @enderror"
                                                    value="{{ $siswa->no_telepon_orang_tua }}"
                                                    name="no_telepon_orang_tua"
                                                    placeholder="Masukan No Telepon Orang tua">
                                                @error('no_telepon_orang_tua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                            <h5 class="m-0" style="color:white">ALAMAT</h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                                    value="{{ old('no_telepon', $siswa->no_telepon) }}"
                                                    name="no_telepon" placeholder="Masukan No Telepon">
                                                @error('no_telepon')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $siswa->email) }}" name="email"
                                                    placeholder="Masukan Email">
                                                @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('alamat') is-invalid @enderror"
                                                    value="{{ old('alamat', $siswa->alamat) }}" name="alamat"
                                                    placeholder="Masukan Alamat">
                                                @error('alamat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-success mr-1" name="submit" value="Submit">
                                            Perbarui </button>
                                        <a href="{{ route('user.index') }}" class="btn btn-warning"> Kembali </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
