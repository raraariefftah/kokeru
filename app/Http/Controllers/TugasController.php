<?php

namespace App\Http\Controllers;

use App\Ruang;
use App\Tugas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();

        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

//        var_dump($tugas);
        return view('awal', compact('jobs', 'waktu'));
    }

    public function create()
    {
        $cs = User::where('role', 'cs')->get();
//        $rooms = DB::table('ruang')
//            ->whereNotIn('id_ruang', DB::table('tugas')->select('id_ruang')->get())
//            ->get();
        $rooms = Ruang::whereNotIn('id_ruang', Tugas::select('id_ruang')->get())->get();
//        dd($cs, $rooms);

        return view('manager.tambah_tugas', compact('cs', 'rooms'));
    }

    public function store(Request $request)
    {
//        dd($request->nama_cs, $request->ruang, $request->status);
        $cs = User::where('nama', $request->nama_cs)->first();
        $ruang = Ruang::where('nama_ruang', $request->ruang)->first();
        $iduser = $cs['id_user'];
        $idruang = $ruang['id_ruang'];
//        dd($iduser, $idruang);
        DB::table('tugas')->insert([
            'id_user' => $iduser,
            'id_ruang' => $idruang,
            'status' => $request->status,
            'tanggal_penugasan' => Carbon::now(),
        ]);

        return redirect()->route('dashboard_manager')
            ->with('success', 'Data tugas berhasil ditambahkan.');
    }

    public function show()
    {
        $id = Auth::user()->id_user;

        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        if(Auth::user()->role=='cs'){
            $cs_jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->where('tugas.id_user', '=', $id)
            ->get();

            return view('/cs/dashboard_cs', compact('cs_jobs', 'waktu'));
        }
        else{
            return abort(404);
        }
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

}
