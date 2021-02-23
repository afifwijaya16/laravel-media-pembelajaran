@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Profil')
@section('content')
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('
        status ') }}',
    })

</script>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Perbarui Profil
            </div>
            <form action="{{ route('update.profil', $siswa->id) }}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header p-2">
                                    <a href="{{ route('home') }}" class="btn btn-flat btn-primary btn-sm"
                                        title="Kembali Ke Data Siswa"><i class="fa fa-arrow-alt-circle-left"></i>
                                        Kembali
                                        Ke Halaman Utama</a>
                                </div>
                                <div class="card-body m-0 p-0">
                                    <div class="card">
                                        <div class="card-header">DATA SISWA</div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Nomor Siswa</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm @error('no_user') is-invalid @enderror"
                                                            disabled maxlength="16" value="{{ $siswa->no_user }}"
                                                            name="no_user" placeholder="Masukan Nomor Siswa">
                                                        @error('no_user')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                            value="{{ $siswa->name }}" name="name"
                                                            placeholder="Masukan Nama">
                                                        @error('name')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Agama</label>
                                                        <select
                                                            class="form-control form-control-sm @error('agama') is-invalid @enderror"
                                                            name="agama">
                                                            <option value="">Pilih Agama</option>
                                                            <option value="Islam" @if ($siswa->agama == 'Islam')
                                                                {{ 'selected' }}
                                                                @endif >Islam</option>
                                                            <option value="Kristen" @if ($siswa->agama == 'Kristen')
                                                                {{ 'selected' }} @endif >Kristen</option>
                                                            <option value="Katolik" @if ($siswa->agama == 'Katolik')
                                                                {{ 'selected' }} @endif>Katolik</option>
                                                            <option value="Budha" @if ($siswa->agama == 'Budha')
                                                                {{ 'selected' }}
                                                                @endif >Budha</option>
                                                            <option value="Hindu" @if ($siswa->agama == 'Hindu')
                                                                {{ 'selected' }}
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
                                                            <option value="Laki - laki" @if ($siswa->sex == 'Laki -
                                                                laki')
                                                                {{ 'selected' }} @endif>Laki - laki</option>
                                                            <option value="Perempuan" @if ($siswa->sex ==
                                                                'Perempuan')
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
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body m-0 p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            DATA KELAHIRAN
                                        </div>
                                        <div class="card-body m-0">
                                            <div class="row">
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
                                                            value="{{ $siswa->tempatlahir }}"
                                                            placeholder="Masukan Tempat Lahir" name="tempatlahir">
                                                        @error('tempatlahir')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body m-0 p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            DATA ORANG TUA
                                        </div>
                                        <div class="card-body m-0">
                                            <div class="row">
                                                <div class="col-sm-6">
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
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No Telepon Orang Tua</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm @error('no_telepon_orang_tua') is-invalid @enderror"
                                                            value="{{ $siswa->no_telepon_orang_tua }}"
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
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body m-0 p-0">
                                    <div class="card">
                                        <div class="card-header">
                                            DATA ALAMAT
                                        </div>
                                        <div class="card-body m-0">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>No Telepon</label>
                                                        <input type="text"
                                                            class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                                            value="{{ $siswa->no_telepon }}" name="no_telepon"
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
                                                            value="{{ $siswa->email }}" name="email"
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
                                                            value="{{ $siswa->alamat }}" name="alamat"
                                                            placeholder="Masukan Alamat">
                                                        @error('alamat')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="row">
                                        <button type="submit" class="btn btn-success mr-1" name="submit" value="Submit">
                                            Perbarui </button>
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
