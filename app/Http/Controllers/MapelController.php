<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Kelas;
use App\User;
use App\Detailmapel;
use DateTime;
use App\Admin;
class MapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $mapel = Mapel::orderBy('nama_mapel', 'asc')->get();
        return view('admin.mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Admin::where('level', 'Guru')->get();
        return view('admin.mapel.tambah', compact('guru'));
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
                'nama_mapel' => 'required',
                'jadwal_mapel' => 'required',
                'keterangan_mapel' => 'required',
                'guru_id' => 'required',
            ]);

            $mapel = Mapel::create([
                'nama_mapel' => $request->nama_mapel,
                'jadwal_mapel' => $request->jadwal_mapel,
                'keterangan_mapel' => $request->keterangan_mapel,
                'guru_id' => $request->guru_id,
            ]);

            return redirect()->route('mapel.index')->with('status', 'Berhasil Menambah Data');
        } else if($request->submitbutton == 'tambah_mapel') {
            
            $detail_mapel = Detailmapel::create([
                'mapel_id' => $request->mapel_id,
                'kelas_id' => $request->kelas_id,
            ]);

            return back()->withInput()->with('status', 'Berhasil Menambah Data Kelas');
        } else if ($request->submitbutton == 'hapus_mapel') {
            $detailmapel = Detailmapel::where('id',$request->id);
            $detailmapel->delete();
            return back()->withInput()->with('status', 'Berhasil Menghapus Data Kelas');
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
        // mapel
        $mapel = Mapel::findorfail($id);
        
        // detail mapel
        foreach ($mapel->detailmapel as $dm) {
            $data[] = $dm->kelas->id;
        }
        // get user from detail mapel
        if(!empty($data)){
            $kelas = Kelas::whereNotIn('id', $data)->get();
        } else {
            $kelas = Kelas::get();
        }
        return view('admin.mapel.show', compact('mapel','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // guru
        $guru = Admin::where('level', 'Guru')->get();
        $mapel = Mapel::findorfail($id);
        $data = \Carbon\Carbon::parse($mapel->jadwal_mapel)->format('Y-m-d H:i'); 
        $data_tanggal = str_replace(" " ,"T",$data);
        return view('admin.mapel.edit', compact('mapel','data_tanggal','guru'));
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
            'nama_mapel' => 'required',
            'jadwal_mapel' => 'required',
            'keterangan_mapel' => 'required',
            'guru_id' => 'required',
        ]);

        $mapel = Mapel::findorfail($id);
        $mapel_data = [
            'nama_mapel' => $request->nama_mapel,
            'jadwal_mapel' => $request->jadwal_mapel,
            'guru_id' => $request->guru_id,
        ];
        
        $mapel->update($mapel_data);

        return redirect()->route('mapel.index')->with('status', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mapel = Mapel::findorfail($id);
        $detail_mapel = Detailmapel::where('mapel_id',$id);
        if ($detail_mapel){
            $mapel->delete();
        } else {
            $mapel->delete();
            $detail_mapel->delete();
        }
        
        return redirect()->route('mapel.index')->with('status', 'Berhasil Menghapus data');
    }
}
