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
                                        @if(!empty($profil->logo))
                                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($profil->logo) }}"
                                                alt="Logo">
                                        @else
                                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/no-photo.jpg') }}"
                                                alt="Logo">
                                        @endif
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="file"
                                            class="form-control form-control-sm @error('logo') is-invalid @enderror"
                                            value="" name="logo" placeholder="">
                                        @error('logo')
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
                                        <h5 class="m-0" style="color:white">Profil</h5>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Profil</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('nama_profil') is-invalid @enderror"
                                                value="{{ $profil->nama_profil }}" name="nama_profil"
                                                placeholder="Masukan Nama">
                                            @error('nama_profil')
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
                                            <label>Email</label>
                                            <input type="text"
                                                class="form-control form-control-sm @error('email_profil') is-invalid @enderror"
                                                value="{{ $profil->email_profil }}" name="email_profil"
                                                placeholder="Masukan Email">
                                            @error('email_profil')
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

@endsection
