@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Penduduk')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Perbarui Penduduk
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <form action="{{ route('user.update', $penduduk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="img-fluid img-circle" src="{{ asset($penduduk->foto) }}"
                                        alt="User profile picture">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="file" class="form-control form-control-sm @error('foto') is-invalid @enderror" value="" name="foto"
                                        placeholder="">
                                        @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <a href="{{ route('user.index') }}"
                                    class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                    title="Kembali Ke Data Penduduk"><i class="fa fa-arrow-alt-circle-left"></i> Kembali
                                    Ke Halaman
                                    Penduduk</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">DATA PENDUDUK</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control form-control-sm @error('nik') is-invalid @enderror" maxlength="16" value="{{ $penduduk->nik }}" name="nik"
                                                placeholder="Masukan NIK" >
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
                                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ $penduduk->name }}" name="name"
                                                placeholder="Masukan Nama" >
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
                                            <select class="form-control form-control-sm @error('agama') is-invalid @enderror" name="agama" >
                                                <option value="">Pilih Agama</option>
                                                <option value="Islam" @if ($penduduk->agama == 'Islam') {{ 'selected' }} @endif >Islam</option>
                                                <option value="Kristen" @if ($penduduk->agama == 'Kristen') {{ 'selected' }} @endif >Kristen</option>
                                                <option value="Katolik" @if ($penduduk->agama == 'Katolik') {{ 'selected' }} @endif>Katolik</option>
                                                <option value="Budha" @if ($penduduk->agama == 'Budha') {{ 'selected' }} @endif >Budha</option>
                                                <option value="Hindu" @if ($penduduk->agama == 'Hindu') {{ 'selected' }} @endif>Hindu</option>
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
                                            <label>Hubungan Dalam Keluarga</label>
                                            <select class="form-control form-control-sm  @error('hubungan_dalam_keluarga') is-invalid @enderror" name="hubungan_dalam_keluarga" >
                                                <option value="">Pilih Hubungan Dalam Keluarga</option>
                                                <option value="Suami" @if ($penduduk->hubungan_dalam_keluarga == 'Suami') {{ 'selected' }} @endif >Suami</option>
                                                <option value="Istri" @if ($penduduk->hubungan_dalam_keluarga == 'Istri') {{ 'selected' }} @endif >Istri</option>
                                                <option value="Anak" @if ($penduduk->hubungan_dalam_keluarga == 'Anak') {{ 'selected' }} @endif >Anak</option>
                                            </select>
                                            @error('hubungan_dalam_keluarga')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control form-control-sm @error('sex') is-invalid @enderror" name="sex" >
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="Laki - laki" @if ($penduduk->sex == 'Laki - laki') {{ 'selected' }} @endif>Laki - laki</option>
                                                <option value="Perempuan" @if ($penduduk->sex == 'Perempuan') {{ 'selected' }} @endif>Perempuan</option>
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
                                            <input type="date" class="form-control form-control-sm @error('tanggallahir') is-invalid @enderror" value="{{ $penduduk->tanggallahir }}"
                                                name="tanggallahir"  placeholder="Masukan Tanggal Lahir" >
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
                                            <input type="text" class="form-control form-control-sm @error('tempatlahir') is-invalid @enderror" value="{{ $penduduk->tempatlahir }}"
                                                placeholder="Masukan Tempat Lahir" name="tempatlahir" >
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
                                        <h5 class="m-0" style="color:white">PENDIDIKAN DAN PEKERJAAN</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pendidikan dalam KK</label>
                                            <input type="text" class="form-control form-control-sm @error('pendidikan_kk') is-invalid @enderror" value="{{ $penduduk->pendidikan_kk }}"
                                                name="pendidikan_kk" placeholder="Masukan Pendidikan">
                                            @error('pendidikan_kk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <input type="text" class="form-control form-control-sm @error('pekerjaan') is-invalid @enderror" value="{{ $penduduk->pekerjaan }}"
                                                name="pekerjaan" placeholder="Masukan Pekerjaan">
                                            @error('pekerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">DATA KEWARGANEGARAAN </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status Warga Negara</label>
                                            <select class="form-control form-control-sm @error('kewarganegaraan') is-invalid @enderror" name="kewarganegaraan" >
                                                <option value="">Pilih Kewarganegaraan</option>
                                                <option value="WNI" @if ($penduduk->kewarganegaraan == 'WNI') {{ 'selected' }} @endif>WNI</option>
                                                <option value="WNA" @if ($penduduk->kewarganegaraan == 'WNA') {{ 'selected' }} @endif>WNA</option>
                                            </select>
                                            @error('kewarganegaraan')
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
                                            <label>NIK Ayah</label>
                                            <input type="text" class="form-control form-control-sm @error('ayah_nik') is-invalid @enderror" value="{{ $penduduk->ayah_nik }}"
                                                name="ayah_nik" placeholder="Masukan NIK Ayah">
                                            @error('ayah_nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input type="text" class="form-control form-control-sm @error('nama_ayah') is-invalid @enderror" value="{{ $penduduk->nama_ayah }}"
                                                name="nama_ayah" placeholder="Masukan Nama Ayah">
                                                @error('nama_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>NIK Ibu</label>
                                            <input type="text" class="form-control form-control-sm @error('ibu_nik') is-invalid @enderror" value="{{ $penduduk->ibu_nik }}"
                                                name="ibu_nik" placeholder="Masukan NIK Ibu">
                                            @error('ibu_nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input type="text" class="form-control form-control-sm @error('nama_ibu') is-invalid @enderror" value="{{ $penduduk->nama_ibu }}"
                                                name="nama_ibu" placeholder="Masukan Nama Ibu">
                                            @error('nama_ibu')
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
                                            <input type="text" class="form-control form-control-sm @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon', $penduduk->no_telepon) }}"
                                                name="no_telepon" placeholder="Masukan No Telepon" >
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
                                            <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" value="{{ old('email', $penduduk->email) }}"
                                                name="email" placeholder="Masukan Email" >
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat Sebelumnya</label>
                                            <input type="text" class="form-control form-control-sm @error('alamat_sebelumnya') is-invalid @enderror" value="{{ old('alamat_sebelumnya', $penduduk->alamat_sebelumnya) }}"
                                                name="alamat_sebelumnya" placeholder="Masukan Alamat Sebelumnya">
                                            @error('alamat_sebelumnya')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat Sekarang</label>
                                            <input type="text" class="form-control form-control-sm @error('alamat_sekarang') is-invalid @enderror" value="{{ old('alamat_sekarang', $penduduk->alamat_sekarang) }}"
                                                name="alamat_sekarang" placeholder="Masukan Alamat sekarang" >
                                            @error('alamat_sekarang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control form-control-sm @error('kelurahan') is-invalid @enderror" value="{{ old( 'kecamatan',$penduduk->kelurahan) }}"
                                                name="kelurahan" placeholder="Masukan Kelurahan" >
                                            @error('kelurahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control form-control-sm @error('kecamatan') is-invalid @enderror" value="{{ old( 'kecamatan',$penduduk->kecamatan) }}"
                                                name="kecamatan" placeholder="Masukan Kecamatan" >
                                            @error('kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kabupaten/Kota</label>
                                            <input type="text" class="form-control form-control-sm @error('kabkot') is-invalid @enderror" value="{{ old('kabkot', $penduduk->kabkot) }}"
                                                name="kabkot" placeholder="Masukan Kabupaten/Kota" >
                                            @error('kabkot')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">STATUS PERKAWINAN </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status Perkawinan</label>
                                            <select class="form-control form-control-sm @error('status_kawin') is-invalid @enderror" name="status_kawin" >
                                                <option value="" selected disabled >Pilih Status Kawin</option>
                                                <option value="Belum Kawin" @if ($penduduk->status_kawin == 'Belum Kawin') {{ 'selected' }} @endif >Belum Kawin</option>
                                                <option value="Kawin" @if ($penduduk->status_kawin == 'Kawin') {{ 'selected' }} @endif >Kawin</option>
                                                <option value="Cerai" @if ($penduduk->status_kawin == 'Cerai') {{ 'selected' }} @endif >Cerai</option>
                                            </select>
                                            @error('status_kawin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">DATA KESEHATAN </h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Golongan Darah</label>
                                            <select class="form-control form-control-sm @error('golongan_darah') is-invalid @enderror" name="golongan_darah">
                                                <option value="" selected disabled >Pilih Golongan Darah</option>
                                                <option value="A" @if ($penduduk->golongan_darah == 'A') {{ 'selected' }} @endif >A</option>
                                                <option value="AB" @if ($penduduk->golongan_darah == 'AB') {{ 'selected' }} @endif >AB</option>
                                                <option value="B" @if ($penduduk->golongan_darah == 'B') {{ 'selected' }} @endif >B</option>
                                                <option value="O" @if ($penduduk->golongan_darah == 'O') {{ 'selected' }} @endif >O</option>
                                            </select>
                                            @error('golongan_darah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <button type="submit" class="btn btn-success mr-1" name="submit" value="Submit"> Perbarui </button>
                                    <a href="{{ route('user.index') }}" class="btn btn-warning"> Kembali </a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
