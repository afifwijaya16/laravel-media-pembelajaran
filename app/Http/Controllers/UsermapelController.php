<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mapel;
use App\Materi;
use Illuminate\Support\Facades\DB;
use App\Materikelas;

class UsermapelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $matapelajaran = DB::table('mapels')
            ->join('materikelas', 'mapels.id', '=', 'materikelas.materi_id')
            ->join('kelas', 'kelas.id', '=', 'materikelas.kelas_id')
            ->join('detailkelas', 'kelas.id', '=', 'detailkelas.kelas_id')
            ->join('users', 'users.id', '=', 'detailkelas.siswa_id')
            ->join('admins', 'mapels.guru_id', '=', 'admins.id')
            ->select('users.*','mapels.*','admins.name as nama_guru')
            ->where('users.id', Auth::id())
            ->get();
        // dd($matapelajaran);
        return view('user.mapel.index', compact('matapelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->submitbutton == 'cek_materi') {
            $id_mapel =  $request->mapel_id;
            $mapel = DB::table('mapels')
                ->join('materikelas', 'mapels.id', '=', 'materikelas.materi_id')
                ->join('kelas', 'kelas.id', '=', 'materikelas.kelas_id')
                ->join('detailkelas', 'kelas.id', '=', 'detailkelas.kelas_id')
                ->join('users', 'users.id', '=', 'detailkelas.siswa_id')
                ->join('admins', 'mapels.guru_id', '=', 'admins.id')
                ->select('users.*','mapels.*','admins.name as nama_guru')
                ->where('users.id', Auth::id())
                ->where('mapels.id', $id_mapel)
                ->first();
            
            $materi = Materi::where('mapel_id', $id_mapel)->get();
            return view('user.mapel.detail_mapel', compact('id_mapel','mapel','materi'));

        } else if ($request->submitbutton == 'detail_materi') {
            $id_mapel =  $request->mapel_id;
            $materi_id =  $request->hasil_id;
            $mapel = Mapel::findorfail($request->mapel_id);
            $materi = Materi::findorfail($materi_id);
            $soal_materi = DB::table('soalmateris')
                ->join('materis', 'materis.id', '=', 'soalmateris.materi_id')
                ->join('mapels', 'mapels.id', '=', 'soalmateris.mapel_id')
                ->select('soalmateris.*')
                ->where('soalmateris.materi_id', $request->hasil_id)
                ->where('soalmateris.mapel_id', $request->mapel_id)
                ->get();
                // dd($soal_materi);
            return view('user.mapel.detail_materi', compact('mapel','id_mapel','materi','soal_materi'));
        } else if ($request->submitbutton == 'jawaban_soal') {
            
            $id_mapel =  $request->mapel_id;
            $materi_id =  $request->hasil_id;
            $mapel = Mapel::findorfail($request->mapel_id);

            $soal_materi = DB::table('soalmateris')
                ->join('materis', 'materis.id', '=', 'soalmateris.materi_id')
                ->join('mapels', 'mapels.id', '=', 'soalmateris.mapel_id')
                ->select('soalmateris.*')
                ->where('soalmateris.materi_id', $request->hasil_id)
                ->where('soalmateris.mapel_id', $request->mapel_id)
                ->get();
            
            $jawaban = [];
            for ($no = 1; $no <= $soal_materi->count(); $no++) {
                $jawaban[] = [
                    'jawaban' => $request->input('jawaban_'.$no),
                    'materi_id' => $request->input('hasil_id'),
                    'mapel_id' => $request->input('mapel_id'),
                ];
            }
            dd($jawaban);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
