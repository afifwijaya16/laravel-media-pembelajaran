<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Hash;
use File;
class GuruController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $guru = Admin::where('level','Guru')->orderBy('created_at', 'desc')->get();
        $dataMaster= 'active';
        return view('admin.guru.index', compact('guru', 'dataMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataMaster= 'active';
        return view('admin.guru.tambah', compact('dataMaster'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            
        ]);

        $guru = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'password' => bcrypt($request->password),
            'level' => 'Guru'
        ]);
        
        return redirect()->route('guru.index')->with('status', 'Berhasil Menambah Data');
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
        $guru = Admin::findorfail($id);
        $dataMaster = 'active';
        return view('admin.guru.edit', compact('guru','dataMaster'));
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
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $guru = Admin::findorfail($id);

        if($request->input('password')) {
            $guru_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
                'password' => bcrypt($request->password),
            ];
        } else {
            $guru_data = [
                'name' => $request->name,
                'email' => $request->email,
                'no_telepon' => $request->no_telepon,
                'alamat' => $request->alamat,
            ];
        }

        $guru->update($guru_data);

        return redirect()->route('guru.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Admin::findorfail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('status', 'Berhasil Menghapus Data');
    }
}
