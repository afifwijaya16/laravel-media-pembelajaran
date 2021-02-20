<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
use Auth;

class UserprofilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $siswa = User::findorfail(Auth::id());
        return view('user.profil', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',
            'sex' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'nama_orang_tua' => 'required',
            'no_telepon_orang_tua' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = User::findorfail($id);

        if($request->has('foto')) {
            File::delete($siswa->foto);
            $foto = $request->foto;
            $new_foto = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('uploads/foto/', $new_foto);

            $siswa_data = [
                'name' => $request->name,
                'email' => $request->email,
                'agama' => $request->agama,
                'no_telepon' => $request->no_telepon,
                'sex' => $request->sex,
                'tempatlahir' => $request->tempatlahir,
                'tanggallahir' => $request->tanggallahir,
                'nama_orang_tua' => $request->nama_orang_tua,
                'no_telepon_orang_tua' => $request->no_telepon_orang_tua,
                'alamat' => $request->alamat,
                'foto' => 'uploads/foto/'.$new_foto,
            ];


        } else {
            $siswa_data = [
                'name' => $request->name,
                'email' => $request->email,
                'agama' => $request->agama,
                'no_telepon' => $request->no_telepon,
                'sex' => $request->sex,
                'tempatlahir' => $request->tempatlahir,
                'tanggallahir' => $request->tanggallahir,
                'nama_orang_tua' => $request->nama_orang_tua,
                'no_telepon_orang_tua' => $request->no_telepon_orang_tua,
                'alamat' => $request->alamat
            ];
        }

        $siswa->update($siswa_data);

        return redirect()->route('profil')->with('status', 'Update Profil Success');
    }

    
}


