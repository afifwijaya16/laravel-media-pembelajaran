@extends('template_backend/home')
@section('sub-breadcrumb', 'Profil')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if(!empty($profil->logo))
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset($profil->logo) }}"
                            alt="Logo profil">
                    @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('uploads/no-photo.jpg') }}"
                            alt="Logo profil">
                    @endif
                </div>

                <h3 class="profile-username text-center">@if( !empty($profil->nama_profil)) {{ $profil->nama_profil }} @endif</h3>
                @if(!empty($profil-> id)) 
                    <a href="{{ route('admin.profil.edit' , $profil-> id ) }}" class="btn btn-warning btn-block">Perbarui Profil</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Informasi</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Sejarah</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Wilayah Administratif</a></li> -->
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <div class="card">
                            <div class="card-body">
                                <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>

                                <p class="text-muted">
                                    @if(!empty($profil->id)) 
                                        {{ $profil->alamat_kantor }}
                                    @endif
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i>Email</strong>

                                <p class="text-muted">
                                    @if(!empty($profil->id)) 
                                        {{ $profil->email_profil }}
                                    @endif
                                </p>
                                
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i>No Telepon</strong>

                                <p class="text-muted">
                                    @if(!empty($profil->id)) 
                                        {{ $profil->no_telepon }}
                                    @endif
                                </p>

                                <hr>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="tab-pane" id="timeline">
                        <div class="post">
                            <div>
                                @if(!empty($profil->id)) 
                                    {!! $profil->sejarah !!}
                                @endif
                            </div>
                        </div>
                    </div> -->
                     

                    <!-- <div class="tab-pane" id="settings">
                        <div class="post">
                            @if(!empty($profil->id)) 
                                {!! $profil->wilayah_administratif !!}
                            @endif
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('status'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ session('status') }}',
    })
</script>
@endif
@endsection
