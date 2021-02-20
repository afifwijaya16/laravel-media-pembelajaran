<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Kategori Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->kelas }}</td>
                <td class="text-center">
                    @if($hasil->kategori_kelas == 'Silver')
                        <span class="badge badge-secondary">{{ $hasil->kategori_kelas }}</span>
                    @elseif($hasil->kategori_kelas == 'Gold')
                        <span class="badge badge-warning">{{ $hasil->kategori_kelas }}</span>
                    @endif
                </td>
                <td class="text-center">{{ $hasil->detailkelas->count() }} dari {{ $hasil->jumlah_siswa }} siswa</td>
                <td class="text-center">
                    <form action="{{ route('kelas.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('kelas.show', $hasil-> id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('kelas.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-xs btn-danger" name="delete" type="submit"
                                onclick="deleteFunction({{ $hasil->id}})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>