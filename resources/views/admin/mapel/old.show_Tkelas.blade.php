<div class="table-responsive">
    <table id="dataTable-1" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Nama Kelas</th>
                <th class="text-center">Kategori Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <form action="{{ route('mapel.store') }}" role="form" method="POST">
                            @csrf
                            <input type="hidden" class="form-control" name="mapel_id" value="{{ $mapel->id }}">
                            <input type="hidden" class="form-control" name="kelas_id" value="{{ $hasil->id }}">
                            <button type="submit" value="tambah_mapel" class="btn btn-xs btn-primary"
                                name="submitbutton"><i class="fa fa-plus"></i></button>
                        </form>
                    </div>
                </td>
                <td class="text-center">{{ $hasil->kelas }}</td>
                <td class="text-center">
                    @if($hasil->kategori_kelas == 'Silver')
                    <span class="badge badge-secondary">{{ $hasil->kategori_kelas }}</span>
                    @elseif($hasil->kategori_kelas == 'Gold')
                    <span class="badge badge-warning">{{ $hasil->kategori_kelas }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
</div>
