<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Kelas;
use App\User;
use DateTime;
use App\Admin;
use App\Materi;
use App\Materikelas;
use Validator;
use File;
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
        // tambah mata pelajaran
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
        } 
        // tambah materi pelajaran 
        else if($request->submitbutton == 'tambah_materi') {
            
            $validator = Validator::make($request->all(), [
                'nama_materi' => 'required',
                'kategori_materi' => 'required',
                'keterangan_materi' => 'required',
                'mapel_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('mapel.show', $request->mapel_id)->with('status', 'Gagal Menambah Data Materi');
            }

            $berkas_materi = $request->berkas_materi;
            if(!empty($berkas_materi)) {
                $new_berkas_materi = time().'.'.$berkas_materi->getClientOriginalExtension();
            } else {
                $new_berkas_materi = 'no-photo.jpg';
            }

            $materi = Materi::create([
                'nama_materi' => $request->nama_materi,
                'kategori_materi' => $request->kategori_materi,
                'keterangan_materi' => $request->keterangan_materi,
                'type_berkas_materi' => $request->type_berkas_materi,
                'berkas_materi' => 'uploads/berkas_materi/'.$new_berkas_materi,
                'url_video_materi' => $request->url_video_materi,
                'mapel_id' => $request->mapel_id,
            ]);

            if(!empty($berkas_materi)) {
                $berkas_materi->move('uploads/berkas_materi/', $new_berkas_materi);
            }

            $kelas = $request->kelas_id;
            $data = [];
            foreach($kelas as $id_kelas) {
                $data[] = [
                    'kelas_id' => $id_kelas,
                    'materi_id' => $materi->id,
                ];
            }
            Materikelas::insert($data);

           return redirect()->route('mapel.show', $request->mapel_id)->with('status', 'Berhasil Menambah Data Materi');
        } 
        // view tambah materi
        else if($request->submitbutton == 'tambah_view_materi') {
            $id_mapel =  $request->mapel_id;
            $kelas = Kelas::get();
            return view('admin.mapel.materi.tambah', compact('id_mapel','kelas'));
        } 
        // hapus materi
        else if ($request->materi_hapus) {
            $materi = Materi::where('id',$request->id);
            $materiKelas = Materikelas::where('materi_id',$request->id);
            if ($materiKelas){
                $materi->delete();
                $materiKelas->delete();
            } else {
                $materi->delete();
            }
            return redirect()->route('mapel.show', $request->id_mapel)->with('status', 'Berhasil Menghapus Data Materi');
        } 
        // view edit materi
        else if($request->submitbutton == 'edit_view_materi') {
            $id_mapel =  $request->mapel_id;
            $kelas = Kelas::get();
            $materi = Materi::findorfail($request->hasil_id);
            return view('admin.mapel.materi.edit', compact('id_mapel','materi','kelas'));
        }
        // editt materi 
        else if ($request->submitbutton == 'edit_materi') {
            $materi = Materi::findorfail($request->id);

            if($request->has('berkas_materi')) {
                File::delete($materi->berkas_materi);
                $berkas_materi = $request->berkas_materi;
                $new_berkas_materi = time().'.'.$berkas_materi->getClientOriginalExtension();
                $berkas_materi->move('uploads/berkas_materi/', $new_berkas_materi);

                $materi_data = [
                    'nama_materi' => $request->nama_materi,
                    'kategori_materi' => $request->kategori_materi,
                    'keterangan_materi' => $request->keterangan_materi,
                    'type_berkas_materi' => $request->type_berkas_materi,
                    'berkas_materi' => 'uploads/berkas_materi/'.$new_berkas_materi,
                    'url_video_materi' => $request->url_video_materi,
                    'mapel_id' => $request->mapel_id,
                ];
            } else {
                $materi_data = [
                    'nama_materi' => $request->nama_materi,
                    'kategori_materi' => $request->kategori_materi,
                    'keterangan_materi' => $request->keterangan_materi,
                    'type_berkas_materi' => $request->type_berkas_materi,
                    'url_video_materi' => $request->url_video_materi,
                    'mapel_id' => $request->mapel_id,
                ];
            }
            
            $materiKelas = materiKelas::where('materi_id', $request->id);;
            $materiKelas->delete();

            $kelas = $request->kelas_id;
            $data = [];
            foreach($kelas as $id_kelas) {
                $data[] = [
                    'kelas_id' => $id_kelas,
                    'materi_id' => $materi->id,
                ];
            }
            Materikelas::insert($data);

            $materi->update($materi_data);
            return redirect()->route('mapel.show', $request->mapel_id)->with('status', 'Berhasil Mengubah Data Materi');
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
        // foreach ($mapel->detailmapel as $dm) {
        //     $data[] = $dm->kelas->id;
        // }
        // // get user from detail mapel
        // if(!empty($data)){
        //     $kelas = Kelas::whereNotIn('id', $data)->get();
        // } else {
        //     $kelas = Kelas::get();
        // }
        return view('admin.mapel.materi.show', compact('mapel'));
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
