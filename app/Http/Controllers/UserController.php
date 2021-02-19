<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $penduduk = User::orderBy('created_at', 'desc')->get();
        $dataKependudukan= 'active';
        return view('admin.penduduk.index', compact('penduduk', 'dataKependudukan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataKependudukan= 'active';
        return view('admin.penduduk.tambah', compact('dataKependudukan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'sex' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'alamat_sebelumnya' => 'required',
            'alamat_sekarang' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabkot' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->foto;
        if(!empty($foto)) {
            $new_foto = time().'.'.$foto->getClientOriginalExtension();
        } else {
            $new_foto = 'no-photo.jpg';
        }
        
        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->nik),
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
            'kelurahan' => $request->kelurahan,
            'kecamatan' => $request->kecamatan,
            'kabkot' => $request->kabkot,
            'foto' => 'uploads/foto/'.$new_foto,
        ]);

        if(!empty($foto)) {
            $foto->move('uploads/foto/', $new_foto);
        }

        return redirect()->route('user.index')->with('status', 'Add Data Penduduk Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataKependudukan= 'active';
        $penduduk = User::findorfail($id);
        return view('admin.penduduk.edit', compact('penduduk','dataKependudukan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nik' => 'required',
            'kelurahan' => 'required',
            'kecamatan' => 'required',
            'kabkot' => 'required',
            'name' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
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
                'nik' => $request->nik,
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
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kabkot' => $request->kabkot,
                'foto' => 'uploads/foto/'.$new_foto,
            ];


        } else {
            $penduduk_data = [
                'nik' => $request->nik,
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
                'kelurahan' => $request->kelurahan,
                'kecamatan' => $request->kecamatan,
                'kabkot' => $request->kabkot,
            ];
        }

        $penduduk->update($penduduk_data);

        return redirect()->route('user.index')->with('status', 'Update Data Penduduk Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        if(!empty($user->gambar)) {
            File::delete($user->gambar);
        }
        $user->delete();
        return redirect()->route('user.index')->with('status', 'Delete Data Penduduk Success');
    }

    public function resetPassword($id) {
        $penduduk = User::findorfail($id);
        $penduduk_data = [
            'password' => Hash::make($penduduk->nik),
            'login' => 0,
        ];
        $penduduk->update($penduduk_data);
        return redirect()->route('user.index')->with('status', 'Reset Password Success');
    }
}
