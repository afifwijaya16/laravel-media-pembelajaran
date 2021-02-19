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
            <form action="{{ route('update.profil', $penduduk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="img-fluid img-circle" src="{{ asset($penduduk->foto) }}"
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
                                    <a href="{{ route('home') }}"
                                        class="btn btn-flat btn-primary btn-sm"
                                        title="Kembali Ke Data Siswa"><i class="fa fa-arrow-alt-circle-left"></i>
                                        Kembali
                                        Ke Halaman Utama</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 my-3 bg-warning">
                                            <h5 class="m-0">DATA SISWA</h5>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                                    disabled maxlength="16" value="{{ $penduduk->nik }}" name="nik"
                                                    placeholder="Masukan NIK">
                                                @error('nik')
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
                                                    value="{{ $penduduk->name }}" name="name"
                                                    placeholder="Masukan Nama">
                                                @error('name')
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
                                                    <option value="Islam" @if ($penduduk->agama == 'Islam')
                                                        {{ 'selected' }}
                                                        @endif >Islam</option>
                                                    <option value="Kristen" @if ($penduduk->agama == 'Kristen')
                                                        {{ 'selected' }} @endif >Kristen</option>
                                                    <option value="Katolik" @if ($penduduk->agama == 'Katolik')
                                                        {{ 'selected' }} @endif>Katolik</option>
                                                    <option value="Budha" @if ($penduduk->agama == 'Budha')
                                                        {{ 'selected' }}
                                                        @endif >Budha</option>
                                                    <option value="Hindu" @if ($penduduk->agama == 'Hindu')
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
                                                    <option value="Laki - laki" @if ($penduduk->sex == 'Laki - laki')
                                                        {{ 'selected' }} @endif>Laki - laki</option>
                                                    <option value="Perempuan" @if ($penduduk->sex == 'Perempuan')
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
                                        <div class="col-12 my-3 bg-warning">
                                            <h5 class="m-0">DATA KELAHIRAN</h5>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control form-control-sm @error('tanggallahir') is-invalid @enderror"
                                                    value="{{ $penduduk->tanggallahir }}" name="tanggallahir"
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
                                                    value="{{ $penduduk->tempatlahir }}"
                                                    placeholder="Masukan Tempat Lahir" name="tempatlahir">
                                                @error('tempatlahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 my-3 bg-warning">
                                            <h5 class="m-0">DATA ORANG TUA</h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Ayah</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nama_ayah') is-invalid @enderror"
                                                    value="{{ $penduduk->nama_ayah }}" name="nama_ayah"
                                                    placeholder="Masukan Nama Ayah">
                                                @error('nama_ayah')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Ibu</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('nama_ibu') is-invalid @enderror"
                                                    value="{{ $penduduk->nama_ibu }}" name="nama_ibu"
                                                    placeholder="Masukan Nama Ibu">
                                                @error('nama_ibu')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 my-3 bg-warning">
                                            <h5 class="m-0">ALAMAT</h5>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text"
                                                    class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                                    value="{{ $penduduk->no_telepon }}" name="no_telepon"
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
                                                    value="{{ $penduduk->email }}" name="email"
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
                                                    value="{{ $penduduk->alamat }}" name="alamat"
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
