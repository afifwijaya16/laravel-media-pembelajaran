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
        $siswa = User::orderBy('created_at', 'desc')->get();
        $dataMaster= 'active';
        return view('admin.siswa.index', compact('siswa', 'dataMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataMaster= 'active';
        return view('admin.siswa.tambah', compact('dataMaster'));
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
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'sex' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'alamat' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->foto;
        if(!empty($foto)) {
            $new_foto = time().'.'.$foto->getClientOriginalExtension();
        } else {
            $new_foto = 'no-photo.jpg';
        }
        
        $user = User::create([
            'no_user' => time(),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('123'),
            'agama' => $request->agama,
            'no_telepon' => $request->no_telepon,
            'sex' => $request->sex,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'nama_orang_tua' => $request->nama_orang_tua,
            'no_telepon_orang_tua' => $request->no_telepon_orang_tua,
            'alamat' => $request->alamat,
            'foto' => 'uploads/foto/'.$new_foto,
        ]);

        if(!empty($foto)) {
            $foto->move('uploads/foto/', $new_foto);
        }

        return redirect()->route('user.index')->with('status', 'Add Data siswa Success');
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
        $dataMaster= 'active';
        $siswa = User::findorfail($id);
        return view('admin.siswa.edit', compact('siswa','dataMaster'));
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
            'no_user' => 'required',
            'name' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
            'tempatlahir' => 'required',
            'tanggallahir' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = User::findorfail($id);

        if($request->has('foto')) {
            File::delete($siswa->foto);
            $foto = $request->foto;
            $new_foto = time().'.'.$foto->getClientOriginalExtension();
            $foto->move('uploads/foto/', $new_foto);

            $siswa_data = [
                'no_user' => time(),
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
                'no_user' => time(),
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
            ];
        }

        $siswa->update($siswa_data);

        return redirect()->route('user.index')->with('status', 'Update Data siswa Success');
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
        return redirect()->route('user.index')->with('status', 'Delete Data siswa Success');
    }

    public function resetPassword($id) {
        $siswa = User::findorfail($id);
        $siswa_data = [
            'password' => Hash::make($siswa->no_user),
            'login' => 0,
        ];
        $siswa->update($siswa_data);
        return redirect()->route('user.index')->with('status', 'Reset Password Success');
    }
}
