<div class="table-responsive">
    <table id="dataTable-1" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Nama</th>
                <th class="text-center">No Telepon</th>
                <th class="text-center">Kategori Member</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                @if($kelas->detailkelas->count() < $kelas->jumlah_siswa)
                    <div class="btn-group">
                        <form action="{{ route('kelas.store') }}" role="form" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="siswa_id" value="{{ $hasil->id }}">
                            <input type="hidden" class="form-control" name="kelas_id" value="{{ $kelas->id }}">
                            <button type="submit" value="tambah_siswa" class="btn btn-xs btn-primary" name="submitbutton"><i
                                    class="fa fa-plus"></i></button>
                        </form>
                    </div>
                @endif
                </td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">{{ $hasil->no_telepon }}</td>
                <td class="text-center">
                    @if($hasil->kategori == 'Silver')
                    <span class="badge badge-secondary">{{ $hasil->kategori }}</span>
                    @elseif($hasil->kategori == 'Gold')
                    <span class="badge badge-warning">{{ $hasil->kategori }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
</div>
