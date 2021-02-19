@extends('template_backend/home')
@section('sub-breadcrumb', 'Perbarui Profil')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Data Perbarui Profil
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <form action="{{ route('admin.profil.update', $profil->id )}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        @if(!empty($profil->logo_kecamatan))
                                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($profil->logo_kecamatan) }}"
                                                alt="Logo Kecamatan">
                                        @else
                                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/no-photo.jpg') }}"
                                                alt="Logo Kecamatan">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control form-control-sm @error('logo_kecamatan') is-invalid @enderror"
                                            value="" name="logo_kecamatan" placeholder="">
                                        @error('logo_kecamatan')
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
                                <a href="{{ url()->previous() }}"
                                    class="btn btn-social btn-flat btn-info btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                    title="Kembali Ke Data profil"><i class="fa fa-arrow-alt-circle-left"></i> Kembali
                                    Ke Halaman
                                    Profil profil</a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">Profil Kecamatan</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Kecamatan</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('nama_kecamatan') is-invalid @enderror"
                                                value="{{ $profil->nama_kecamatan }}" name="nama_kecamatan"
                                                placeholder="Masukan Nama Kecamatan">
                                            @error('nama_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Alamat Kantor</label>

                                            <textarea class="form-control  @error('alamat_kantor') is-invalid @enderror"
                                                rows="3" name="alamat_kantor"
                                                placeholder="Masukan Alamat Kantor"> {{ $profil->alamat_kantor}} </textarea>
                                            @error('alamat_kantor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kabupaten/Kota</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('kabkot') is-invalid @enderror"
                                                value="{{ $profil->kabkot }}" name="kabkot"
                                                placeholder="Masukan Kabupaten/Kota">
                                            @error('kabkot')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('provinsi') is-invalid @enderror"
                                                value="{{ $profil->provinsi }}" name="provinsi"
                                                placeholder="Masukan Provinsi">
                                            @error('provinsi')
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
                                                class="form-control form-control-sm @error('email_kecamatan') is-invalid @enderror"
                                                value="{{ $profil->email_kecamatan }}" name="email_kecamatan"
                                                placeholder="Masukan Email">
                                            @error('email_kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('no_telepon') is-invalid @enderror"
                                                value="{{ $profil->no_telepon }}" name="no_telepon"
                                                placeholder="Masukan Telepon">
                                            @error('no_telepon')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">Camat</h5>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>NIP Camat</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('nip_camat') is-invalid @enderror"
                                                value="{{ $profil->nip_camat }}" name="nip_camat"
                                                placeholder="Masukan NIP Camat">
                                            @error('nip_camat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Nama Camat</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('nama_camat') is-invalid @enderror"
                                                value="{{ $profil->nama_camat }}" name="nama_camat"
                                                placeholder="Masukan Nama Camat">
                                            @error('nama_camat')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">Visi Misi</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Visi</label>
                                            <textarea class="form-control  @error('visi') is-invalid @enderror" rows="3"
                                                name="visi" placeholder="Masukan Visi"> {{ $profil->visi}} </textarea>
                                            @error('visi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Misi</label>
                                            <textarea class="form-control  @error('misi') is-invalid @enderror" rows="3"
                                                name="misi" placeholder="Masukan misi"> {{ $profil->misi}} </textarea>
                                            @error('misi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">Wilayah Admistratif</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Wilayah Admistratif</label>
                                            <textarea id="textAreaEditor1"
                                                class="form-control  @error('wilayah_administratif') is-invalid @enderror"
                                                rows="3" name="wilayah_administratif"
                                                placeholder="Masukan wilayah administratif"> {{ $profil->wilayah_administratif}} </textarea>
                                            @error('wilayah_administratif')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3" style="background-color:rgb(30, 136, 243)">
                                        <h5 class="m-0" style="color:white">Sejarah</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Sejarah</label>
                                            <textarea id="textAreaEditor"
                                                class="form-control  @error('sejarah') is-invalid @enderror" rows="3"
                                                name="sejarah"
                                                placeholder="Masukan Sejarah"> {{ $profil->sejarah}}  </textarea>
                                            @error('sejarah')
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    CKEDITOR.replace('textAreaEditor');
    CKEDITOR.replace('textAreaEditor1');
</script>

@endsection
