<div class="table-responsive">
    <table id="dataTable" class="table table-sm table-bordered table-striped" width="100%">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Nama</th>
                <th width="10%">No Telepon</th>
                <th width="20%">Email</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $result => $hasil)
            <tr class="table-sm">
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $hasil->name }}</td>
                <td class="text-center">{{ $hasil->no_telepon }}</td>
                <td class="text-center">{{ $hasil->email }}</td>
                <td class="text-center">
                    <form action="{{ route('guru.destroy', $hasil->id) }}" id="form-delete-{{ $hasil->id}}" role="form"
                        method="POST">
                        @csrf
                        @method('delete')
                        <div class="btn-group">
                            <a href="{{ route('guru.edit', $hasil-> id) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                            <button class="btn btn-sm btn-danger" name="delete" type="submit"
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