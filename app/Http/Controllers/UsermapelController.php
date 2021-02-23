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
            ->select('users.*', 'mapels.*','admins.name as nama_guru')
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
        //
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
