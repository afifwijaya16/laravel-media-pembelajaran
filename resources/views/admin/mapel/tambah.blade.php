@extends('template_backend/home')
@section('sub-breadcrumb', 'Tambah Mata Pelajaran')
@section('content')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('mapel.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Mata Pelajaran</label>
                                <input type="text"
                                    class="form-control form-control-sm @error('nama_mapel') is-invalid @enderror"
                                    value="{{ old('nama_mapel')}}" name="nama_mapel"
                                    placeholder="Masukan Nama Mata Pelajaran">
                                @error('nama_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Guru</label>
                                <select name="guru_id" id="mySelect"
                                    class="js-example-basic-single form-control form-control-sm @error('guru_id') is-invalid @enderror">
                                    <option value="0" selected disabled>-- Pilih Guru --</option>
                                    @foreach ($guru as $result)
                                    <option value="{{ $result->id }}"
                                        {{ (collect(old('guru_id'))->contains($result->id)) ? 'selected':'' }}>
                                        {{ $result->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('guru_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jadwal</label>
                                <input type="datetime-local"
                                    class="form-control form-control-sm @error('jadwal_mapel') is-invalid @enderror"
                                    value="{{ old('jadwal_mapel')}}" name="jadwal_mapel">
                                @error('jadwal_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea id="textAreaEditor"
                                    class="form-control  @error('keterangan_mapel') is-invalid @enderror" rows="3"
                                    name="keterangan_mapel"
                                    placeholder="Masukan Keterangan">{{ old('keterangan_mapel')}}</textarea>
                                @error('keterangan_mapel')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" value="tambah" class="btn btn-primary" name="submitbutton"><i
                                class="fa fa-save"></i> Simpan</button>
                        <a href="{{ route('mapel.index') }}" class="btn btn-warning btn-sm"><i
                                class="fa fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    CKEDITOR.replace('textAreaEditor');
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endpush
@endsection
