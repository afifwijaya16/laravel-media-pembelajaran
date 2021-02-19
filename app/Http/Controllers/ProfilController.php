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
            'nama_kecamatan' => 'required',
            'alamat_kantor' => 'required',
            'kabkot' => 'required',
            'provinsi' => 'required',
            'nama_camat' => 'required',
            'nip_camat' => 'required',
            'email_kecamatan' => 'required',
            'no_telepon' => 'required',
            'wilayah_administratif' => 'required',
            'sejarah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'wilayah_administratif' => 'required',
            'logo_kecamatan'  => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $profil = Profil::findorfail($id);

        if($request->has('logo_kecamatan')) {
            File::delete($profil->logo_kecamatan);
            $logo_kecamatan = $request->logo_kecamatan;
            $new_logo_kecamatan = time().'.'.$logo_kecamatan->getClientOriginalExtension();
            $logo_kecamatan->move('uploads/profil/', $new_logo_kecamatan);
            $profil_data = [
                'nama_kecamatan' => $request->nama_kecamatan,
                'alamat_kantor' => $request->alamat_kantor,
                'kabkot' => $request->kabkot,
                'provinsi' => $request->provinsi,
                'nama_camat' => $request->nama_camat,
                'nip_camat' => $request->nip_camat,
                'email_kecamatan' => $request->email_kecamatan,
                'no_telepon' => $request->no_telepon,
                'wilayah_administratif' => $request->wilayah_administratif,
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'logo_kecamatan' => 'uploads/profil/'.$new_logo_kecamatan
            ];
        } else {
            $profil_data = [
                'nama_kecamatan' => $request->nama_kecamatan,
                'alamat_kantor' => $request->alamat_kantor,
                'kabkot' => $request->kabkot,
                'provinsi' => $request->provinsi,
                'nama_camat' => $request->nama_camat,
                'nip_camat' => $request->nip_camat,
                'email_kecamatan' => $request->email_kecamatan,
                'no_telepon' => $request->no_telepon,
                'wilayah_administratif' => $request->wilayah_administratif,
                'sejarah' => $request->sejarah,
                'visi' => $request->visi,
                'misi' => $request->misi,
            ];
        }

        $profil->update($profil_data);

        return redirect()->route('admin.profil.index')->with('status', 'Update Data Profil Success');
    }
}
