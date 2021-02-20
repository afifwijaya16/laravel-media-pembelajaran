@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Siswa')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Tambah Siswa
            </div>
            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-2">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('uploads/no-photo.jpg') }}" alt="User profile picture">
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
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header p-2">
                                    <a href="{{ url()->previous() }}"
                                        class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
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
                                                    value="{{ old('name') }}" name="name" placeholder="Masukan Nama">
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
                                                    class="form-control form-control-sm @error('ketegori') is-invalid @enderror"
                                                    name="ketegori">
                                                    <option value="">Pilih Kategori Member</option>
                                                    <option value="Silver" @if (old('ketegori')=="Silver" )
                                                        {{ 'selected' }} @endif>Silver</option>
                                                    <option value="Gold" @if (old('ketegori')=="Gold" )
                                                        {{ 'selected' }} @endif>Gold</option>
                                                </select>
                                                @error('ketegori')
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
                                                    <option value="Islam" @if (old('agama')=="Islam" ) {{ 'selected' }}
                                                        @endif>Islam</option>
                                                    <option value="Kristen" @if (old('agama')=="Kristen" )
                                                        {{ 'selected' }} @endif>Kristen</option>
                                                    <option value="Katolik" @if (old('agama')=="Katolik" )
                                                        {{ 'selected' }} @endif>Katolik</option>
                                                    <option value="Budha" @if (old('agama')=="Budha" ) {{ 'selected' }}
                                                        @endif>Budha</option>
                                                    <option value="Hindu" @if (old('agama')=="Hindu" ) {{ 'selected' }}
                                                        @endif>Hindu</option>
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
                                                    <option value="Laki - laki" @if (old('sex')=="Laki - laki" )
                                                        {{ 'selected' }} @endif>Laki - laki</option>
                                                    <option value="Perempuan" @if (old('sex')=="Perempuan" )
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
                                                    value="{{ old('tanggallahir') }}" name="tanggallahir"
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
                                                    value="{{ old('tempatlahir') }}" placeholder="Masukan Tempat Lahir"
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
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Nama Orang Tua</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nama_orang_tua') is-invalid @enderror"
                                                    value="{{ old('nama_orang_tua') }}" name="nama_orang_tua"
                                                    placeholder="Masukan NIK Ayah">
                                                @error('nama_orang_tua')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>No Telepon Orang Tua</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('no_telepon_orang_tua') is-invalid @enderror"
                                                    value="{{ old('no_telepon_orang_tua') }}"
                                                    name="no_telepon_orang_tua"
                                                    placeholder="Masukan No Telepon Orang Tua">
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
                                                    value="{{ old('no_telepon') }}" name="no_telepon"
                                                    placeholder="Masukan No Telepon">
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
                                                    value="{{ old('email') }}" name="email" placeholder="Masukan Email">
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
                                                    value="{{ old('alamat') }}" name="alamat"
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
                                            Simpan </button>
                                        <a href="{{ url()->previous() }}" class="btn btn-warning"> Kembali </a>
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
