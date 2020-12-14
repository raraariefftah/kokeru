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
use Barryvdh\DomPDF\PDF;

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
            'created_at' => Carbon::now(),
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

    public function upload_bukti($id_tugas)
    {
        $job = Tugas::find($id_tugas);
//        dd($job);

        return view('cs.upload_bukti', compact('job'));
    }

    public function update_bukti(Request $request, $id_tugas)
    {
//        dd($request->bukti);
        $job = Tugas::find($id_tugas);
        $i = 0;
        foreach($request->file('bukti') as $file)
        {
            $i++;
//            $name = $file;
//            $file->move(public_path().'/uploads/', $name);
            $bukti = $file->store('images', 'public');
//            $imgData[] = $name;
//            dd($bukti);
            $job->update([
                "bukti{$i}" => $bukti,
            ]);
        }

        $extensionfile = $request->bukti[0]->extension();
//        dd($extensionfile);
        return redirect()->back()
            ->with([
                'success' => 'File berhasil diupload.',
                'extensionfile' => $extensionfile,
            ]);
    }

    public function laporan()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();
        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        return view('manager.laporan', compact('jobs', 'waktu'));

    }

    public function print_laporan_pdf()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();
        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');
//        $pdf = app('dompdf.wrapper');
//        $pdf->loadView('manager.print_laporan', compact('jobs', 'waktu'));
//
//        return $pdf->download("laporan_tugas_{$waktu}.pdf");
        return view('manager.print_laporan', compact('jobs', 'waktu'));
    }
}
