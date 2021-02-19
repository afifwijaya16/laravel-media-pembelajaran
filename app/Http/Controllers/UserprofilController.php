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
        $penduduk = User::findorfail(Auth::id());
        return view('user.profil', compact('penduduk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'hubungan_dalam_keluarga' => 'required',
            'agama' => 'required',
            'no_telepon' => 'required',
            'sex' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'pekerjaan' => 'required',
            'pendidikan_kk' => 'required',
            'kewarganegaraan' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'status_kawin' => 'required',
            'golongan_darah' => 'required',
            'alamat_sebelumnya' => 'required',
            'alamat_sekarang' => 'required',
        ]);

        $penduduk = User::findorfail($id);

        if($request->has('foto')) {
            File::delete($penduduk->foto);
            $foto = $request->foto;
            $new_foto = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('uploads/foto/', $new_foto);

            $penduduk_data = [
                'name' => $request->name,
                'email' => $request->email,
                'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga,
                'agama' => $request->agama,
                'no_telepon' => $request->no_telepon,
                'sex' => $request->sex,
                'tempatlahir' => $request->tempatlahir,
                'tanggallahir' => $request->tanggallahir,
                'pekerjaan' => $request->pekerjaan,
                'pendidikan_kk' => $request->pendidikan_kk,
                'kewarganegaraan' => $request->kewarganegaraan,
                'ayah_nik' => $request->ayah_nik,
                'nama_ayah' => $request->nama_ayah,
                'ibu_nik' => $request->ibu_nik,
                'nama_ibu' => $request->nama_ibu,
                'status_kawin' => $request->status_kawin,
                'golongan_darah' => $request->golongan_darah,
                'alamat_sebelumnya' => $request->alamat_sebelumnya,
                'alamat_sekarang' => $request->alamat_sekarang,
                'foto' => 'uploads/foto/'.$new_foto,
            ];


        } else {
            $penduduk_data = [
                'name' => $request->name,
                'email' => $request->email,
                'hubungan_dalam_keluarga' => $request->hubungan_dalam_keluarga,
                'agama' => $request->agama,
                'no_telepon' => $request->no_telepon,
                'sex' => $request->sex,
                'tempatlahir' => $request->tempatlahir,
                'tanggallahir' => $request->tanggallahir,
                'pekerjaan' => $request->pekerjaan,
                'pendidikan_kk' => $request->pendidikan_kk,
                'kewarganegaraan' => $request->kewarganegaraan,
                'ayah_nik' => $request->ayah_nik,
                'nama_ayah' => $request->nama_ayah,
                'ibu_nik' => $request->ibu_nik,
                'nama_ibu' => $request->nama_ibu,
                'status_kawin' => $request->status_kawin,
                'golongan_darah' => $request->golongan_darah,
                'alamat_sebelumnya' => $request->alamat_sebelumnya,
                'alamat_sekarang' => $request->alamat_sekarang
            ];
        }

        $penduduk->update($penduduk_data);

        return redirect()->route('profil')->with('status', 'Update Profil Success');
    }

    
}


