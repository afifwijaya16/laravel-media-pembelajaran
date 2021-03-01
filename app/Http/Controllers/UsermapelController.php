<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mapel;
use App\Materi;
use Illuminate\Support\Facades\DB;
use App\Materikelas;
use App\Jawabanmateri;
use App\Jawabandetailmateri;

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

            // Jawaban
            $jawabanMateri = Jawabanmateri::where('mapel_id', $id_mapel)->where('materi_id', $materi_id)->where('siswa_id', Auth::id())->first();
            
            if(empty($jawabanMateri)){
                $jawaban_data = Jawabanmateri::create([
                    'siswa_id' => Auth::id(),
                    'mapel_id' => $id_mapel,
                    'materi_id' => $materi_id,
                    'keterangan_jawaban_materi' => '-',
                ]);
            } 
            $jawabanMateri = Jawabanmateri::where('mapel_id', $id_mapel)->where('materi_id', $materi_id)->where('siswa_id', Auth::id())->first();
            return view('user.mapel.detail_materi', compact('mapel','id_mapel','materi','soal_materi','jawabanMateri'));
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
            
            $jawabanMateri = Jawabanmateri::where('mapel_id', $id_mapel)->where('materi_id', $materi_id)->where('siswa_id', Auth::id())->first();

            $jawaban = [];
            $jawaban_benar = 0;
            for ($no = 1; $no <= $soal_materi->count(); $no++) {
                $jawaban[] = [
                    'soal_id' => $request->input('soal_'.$no),
                    'jawaban_yang_dipilih' => $request->input('jawaban_'.$no),
                    'jawaban_materi_id' => $jawabanMateri->id,
                ];
            }
                
            Jawabandetailmateri::insert($jawaban);

            foreach($soal_materi as $hasil) {
                foreach($jawaban as $jwb) {
                    if($hasil->id == $jwb['soal_id'] && $hasil->jawaban_benar == $jwb['jawaban_yang_dipilih']) {
                        $jawaban_benar++;
                    }
                }
            }
            $jawaban_data = [
                'status_jawaban_materi' => 'Sudah Mengerjakan Soal',
                'nilai' => $jawaban_benar,
            ];

            $jawabanMateri->update($jawaban_data);
            $materi = Materi::findorfail($materi_id);
            return view('user.mapel.detail_materi', compact('mapel','id_mapel','materi','soal_materi','jawabanMateri'));
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
