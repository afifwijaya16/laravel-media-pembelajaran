<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use File;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $profil = Profil::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function edit($id) {
        $profil = Profil::findorfail($id);
        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_profil' => 'required',
            'alamat_kantor' => 'required',
            'email_profil' => 'required',
            'no_telepon' => 'required',
            'logo'  => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $profil = Profil::findorfail($id);

        if($request->has('logo')) {
            File::delete($profil->logo);
            $logo = $request->logo;
            $new_logo = time().'.'.$logo->getClientOriginalExtension();
            $logo->move('uploads/profil/', $new_logo);
            $profil_data = [
                'nama_profil' => $request->nama_profil,
                'alamat_kantor' => $request->alamat_kantor,
                'email_profil' => $request->email_profil,
                'no_telepon' => $request->no_telepon,
                'logo' => 'uploads/profil/'.$new_logo
            ];
        } else {
            $profil_data = [
                'nama_profil' => $request->nama_profil,
                'alamat_kantor' => $request->alamat_kantor,
                'email_profil' => $request->email_profil,
                'no_telepon' => $request->no_telepon,
            ];
        }

        $profil->update($profil_data);

        return redirect()->route('admin.profil.index')->with('status', 'Update Data Profil Success');
    }
}
