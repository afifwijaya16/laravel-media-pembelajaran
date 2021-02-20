<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Kategori Member</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel->detailmapel as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }} </td>
                <td class="text-center">
                    <form action="{{ route('mapel.store') }}" role="form" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ $hasil->id }}">
                        <button type="submit" value="hapus_mapel" class="btn btn-xs btn-danger" name="submitbutton"><i
                                class="fa fa-minus"></i></button>
                    </form>
                </td>
                <td class="text-center"> {{ $hasil->kelas->kelas }} </td>
                <td class="text-center">
                    @if($hasil->kelas->kategori_kelas == 'Silver')
                    <span class="badge badge-secondary">{{ $hasil->kelas->kategori_kelas }}</span>
                    @elseif($hasil->kelas->kategori_kelas == 'Gold')
                    <span class="badge badge-warning">{{ $hasil->kelas->kategori_kelas }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
</div>
