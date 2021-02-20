<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Aksi</th>
                <th class="text-center">No Member</th>
                <th class="text-center">Nama</th>
                <th class="text-center">No Telepon</th>
                <th class="text-center">Nama Orang tua</th>
                <th class="text-center">No Telepon Orang Tua</th>
                <th class="text-center">Kategori Member</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">
                <div class="btn-group">
               
                    <form action="{{ route('user.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id }}" role="form"
                        method="POST" class="btn-group btn-group-justified">
                        @csrf
                        @method('delete')
                        <a href="{{ route('user.edit', $hasil->id) }}" class="btn btn-xs btn-warning" title="Perbarui"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-xs btn-danger" name="delete" type="submit"
                            onclick="deleteFunction({{ $hasil->id}})" title="Hapus">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                    <form action="{{ route('admin.user.resetPassword', $hasil->id) }}" id="form-reset-{{ $hasil->id }}" role="form"
                        method="POST" class="btn-group btn-group-justified">
                        @csrf
                        @method('put')
                        <button class="btn btn-xs btn-primary" name="reset" type="submit" title="Reset Password"
                            onclick="resetFunction({{ $hasil->id}})"> 
                            <i class="fa fa-key"></i>
                        </button>
                    </form>
                    </div>
                </td>
                <td class="text-center">{{ $hasil->no_user }}</td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">{{ $hasil->no_telepon }}</td>
                <td class="text-center">{{ $hasil->nama_orang_tua }}</td>
                <td class="text-center">{{ $hasil->no_telepon_orang_tua }}</td>
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