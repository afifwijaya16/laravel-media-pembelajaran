<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\User;
use App\Detailkelas;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $kelas = Kelas::orderBy('kelas', 'asc')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kelas.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->submitbutton == 'tambah') {
            $this->validate($request, [
                'kelas' => 'required',
                'kategori_kelas' => 'required',
                'jumlah_siswa' => 'required',
            ]);

            $user = Kelas::create([
                'kelas' => $request->kelas,
                'kategori_kelas' => $request->kategori_kelas,
                'jumlah_siswa' => $request->jumlah_siswa,
            ]);

            return redirect()->route('kelas.index')->with('status', 'Berhasil Menambah Data');
        } else if($request->submitbutton == 'tambah_siswa') {
            
            $detail_kelas = Detailkelas::create([
                'siswa_id' => $request->siswa_id,
                'kelas_id' => $request->kelas_id,
                'keterangan' => '-',
            ]);

            return back()->withInput()->with('status', 'Berhasil Menambah Data Siswa');
        } else if ($request->submitbutton == 'hapus_siswa') {
            $detailKelas = Detailkelas::where('id',$request->id);
            $detailKelas->delete();
            return back()->withInput()->with('status', 'Berhasil Menghapus Data Siswa');
        }
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // kelas
        $kelas = Kelas::findorfail($id);
        // detail kelas
        foreach ($kelas->detailkelas as $dk) {
            $data[] = $dk->siswa->id;
        }
        // get user from detail kelas
        if(!empty($data)){
            $siswa = User::whereNotIn('id', $data)->get();
        } else {
            $siswa = User::get();
        }
        return view('admin.kelas.show', compact('kelas','siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findorfail($id);
        return view('admin.kelas.edit', compact('kelas'));
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
            'kelas' => 'required',
            'kategori_kelas' => 'required',
            'jumlah_siswa' => 'required',
        ]);

        $kelas = Kelas::findorfail($id);
        $kelas_data = [
            'kelas' => $request->kelas,
            'kategori_kelas' => $request->kategori_kelas,
            'jumlah_siswa' => $request->jumlah_siswa,
        ];
        
        $kelas->update($kelas_data);

        return redirect()->route('kelas.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);
        $detail_kelas = Detailkelas::where('kelas_id', $id);
        $kelas->delete();
        $detail_kelas->delete();
        return redirect()->route('kelas.index')->with('status', 'Berhasil Menghapus data');
    }
}
