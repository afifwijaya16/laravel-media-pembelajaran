@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Perbarui Password') }}</div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-info text-center">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password_change') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="nik"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password Baru') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password_change" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Perbarui') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
