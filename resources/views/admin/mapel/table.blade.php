<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Jadwal</th>
                <th>Guru</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapel as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->nama_mapel }}</td>
                <td class="text-center">{{ $hasil->jadwal_mapel }}</td>
                <td class="text-center">{{ $hasil->guru->name }}</td>
                <td class="text-center">
                    <ul style="list-style-type: none; margin: 0; padding: 0;">
                        @foreach ($hasil->detailmapel as $detailkelas)
                        <li>{{ $detailkelas->kelas->kelas }} 
                             @if($detailkelas->kelas->kategori_kelas == 'Silver')
                            <span class="badge badge-secondary">{{ $detailkelas->kelas->kategori_kelas }}</span>
                            @elseif($detailkelas->kelas->kategori_kelas == 'Gold')
                            <span class="badge badge-warning">{{ $detailkelas->kelas->kategori_kelas }}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </td>
                
                <td class="text-center">
                    <form action="{{ route('mapel.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('mapel.show', $hasil-> id) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('mapel.edit', $hasil-> id) }}" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
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