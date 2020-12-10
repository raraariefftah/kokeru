<?php

namespace App\Http\Controllers;

use App\Tugas;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TugasController extends Controller
{
    public function index()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->get();

//        var_dump($tugas);
        return view('awal', compact('jobs'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function show()
    {
        $id = Auth::user()->id_user;

//        $cs_jobs = Tugas::;
//        dd($cs_jobs);
        $cs_jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->where('tugas.id_user', '=', $id)
            ->get();

        return view('/cs/dashboard_cs', compact('cs_jobs'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function daftarTugas(){
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->get();

//        var_dump($tugas);
        return view('manager.daftar_tugas', compact('jobs'));
    }
}
