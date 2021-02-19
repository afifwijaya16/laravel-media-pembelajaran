<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tempat Lahir</th>
                <th class="text-center">Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penduduk as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                    <form action="{{ route('user.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id }}" role="form"
                        method="POST" class="btn-group btn-group-justified">
                        @csrf
                        @method('delete')
                        <a href="{{ route('user.edit', $hasil-> id) }}" class="btn btn-xs btn-warning" title="Perbarui"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-xs btn-danger" name="delete" type="submit"
                            onclick="deleteFunction({{ $hasil->id}})" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <form action="{{ route('admin.user.resetPassword', $hasil->id) }}" id="form-reset-{{ $hasil->id }}" role="form"
                        method="POST" class="btn-group btn-group-justified">
                        @csrf
                        @method('put')
                        <button class="btn btn-xs btn-danger" name="reset" type="submit" title="Reset Password"
                            onclick="resetFunction({{ $hasil->id}})"> 
                            <i class="fa fa-key"></i>
                        </button>
                    </form>
                </td>
                <td class="text-center">{{ $hasil->nik }}</td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">{{ $hasil->tempatlahir }}</td>
                <td class="text-center">{{ Carbon\Carbon::parse($hasil->tanggallahir)->translatedFormat('d F Y') }}</td>
            </tr>
            @endforeach
    </table>
</div>