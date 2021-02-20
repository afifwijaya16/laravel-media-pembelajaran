<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
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
            @foreach ($kelas->detailkelas as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center"> </td>
                <td class="text-center">
                    <form action="{{ route('kelas.store') }}" role="form" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="id" value="{{ $hasil->id }}">
                        <button type="submit" value="hapus_siswa" class="btn btn-xs btn-danger" name="submitbutton"><i
                                class="fa fa-minus"></i></button>
                    </form>
                </td>
                <td class="text-center"> {{ $hasil->siswa->name }} </td>
                <td class="text-center"> {{ $hasil->siswa->no_telepon }} </td>
                <td class="text-center">
                    @if($hasil->siswa->kategori == 'Silver')
                    <span class="badge badge-secondary">{{ $hasil->siswa->kategori }}</span>
                    @elseif($hasil->siswa->kategori == 'Gold')
                    <span class="badge badge-warning">{{ $hasil->siswa->kategori }}</span>
                    @endif
                </td>
            </tr>
            @endforeach
    </table>
</div>
