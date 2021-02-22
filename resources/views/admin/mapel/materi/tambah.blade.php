@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Materi')
@section('content')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #2980b9;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Materi</label>
                                <input type="hidden" name="mapel_id" value="{{ $id_mapel }}" >
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_materi') is-invalid @enderror"
                                    value="{{ old('nama_materi')}}" name="nama_materi"
                                    placeholder="Masukan Nama Materi" required>
                                @error('nama_materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select
                                    class="form-control form-control-sm @error('kategori_materi') is-invalid @enderror"
                                    name="kategori_materi">
                                    <option value="">Pilih Kategori Materi</option>
                                    <option value="Materi" @if (old('kategori_materi')=="Materi" ) {{ 'selected' }}
                                        @endif>Materi</option>
                                    <option value="Soal" @if (old('kategori_materi')=="Soal" ) {{ 'selected' }} @endif>
                                        Soal</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                             <div class="form-group">
                                <label>Kelas</label>
                                <select name="kelas_id[]" class="form-control js-example-basic-multiple" required multiple="multiple">
                                    @foreach ($kelas as $result)
                                        <option value="{{ $result->id }}" {{in_array($result->id, old("kelas_id") ?: []) ? "selected": ""}}>{{ $result->kelas }}</option> 
                                    @endforeach
                                </select>
                                @error('kelas_id')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Keterangan Materi</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('keterangan_materi') is-invalid @enderror"
                                    value="{{ old('keterangan_materi')}}" name="keterangan_materi"
                                    placeholder="Masukan Keterangan Materi" required>
                                @error('keterangan_materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="tambah_materi" class="btn btn-primary btn-sm" name="submitbutton"><i
                                class="fa fa-save"></i> Simpan</button>
                        <a href="{{ route('mapel.show', $id_mapel) }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            width: '100%'
        });
    });
</script>
@endpush
@endsection
