<?php

namespace App\Http\Controllers;

use App\Ruang;
use App\Tugas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->get();
        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        $jumlahcs = User::where('role', 'cs')->count();
        $jumlahruang = Ruang::all()->count();
        $jumlahtugas = Tugas::all()->count();
        $tugasselesai = Tugas::where('status', 'SUDAH')->count();

        if(Auth::user()->role=='manager'){
            return view('manager.dashboard', compact('jobs', 'waktu', 'jumlahcs', 'jumlahruang', 'jumlahtugas', 'tugasselesai'));
        }
        else{
            return abort(404);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
