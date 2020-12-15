<?php

namespace App\Http\Controllers;

use App\Exports\PrintTugas;
use App\Ruang;
use App\Tugas;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\PDF;
use Maatwebsite\Excel\Facades\Excel;

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

        $hari =  Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');

//        var_dump($tugas);
        return view('awal', compact('jobs', 'hari', 'tanggal', 'waktu'));
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
        $job->update([
            "status" => 'SUDAH',
        ]);

        $extensionfile = $request->bukti[0]->extension();
//        dd($extensionfile);
        return redirect()->back()
            ->with([
                'success' => 'File berhasil diupload.',
                'extensionfile' => $extensionfile,
            ]);
    }

    public function reset_tugas()
    {
        $jobs = Tugas::all();

        foreach ($jobs as $job){
            DB::table('history')->insert([
                'id_tugas' => $job->id_tugas,
                'id_cs' => $job->id_user,
                'id_ruang' => $job->id_ruang,
                'old_status' => $job->status,
                'old_bukti1' => $job->bukti1,
                'old_bukti2' => $job->bukti2,
                'old_bukti3' => $job->bukti3,
                'old_bukti4' => $job->bukti4,
                'old_bukti5' => $job->bukti5,
                'old_tanggal_penugasan' => $job->tanggal_penugasan,
                'old_tanggal_selesai' => $job->tanggal_selesai,
            ]);
            $job->update([
                'status' => 'BELUM',
                'bukti1' => null,
                'bukti2' => null,
                'bukti3' => null,
                'bukti4' => null,
                'bukti5' => null,
            ]);
        }
        return redirect()->route('dashboard_manager')
            ->with('success', 'Penugasan berhasil reset');

    }

    public function laporan()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();

        $hari =  Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');

        return view('manager.laporan', compact('jobs', 'hari', 'tanggal', 'waktu'));

    }

    public function laporan_daftar_tugas(Request $request)
    {
//        dd($request->all());
//        dd($request->input('datepicker'));
        $from = $request->datepicker . ' 00:00:00';
        $until = $request->datepicker . ' 24:00:00';
        $status = $request->status;
        $hari =  Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');

        if ($status == 'SEMUA') {
            $jobs = DB::table('tugas')
                ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
                ->join('users', 'tugas.id_user', '=', 'users.id_user')
                ->whereBetween('tugas.tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('ruang.nama_ruang', 'asc')
                ->get();
        } elseif ($status == 'SUDAH') {
            $jobs = DB::table('tugas')
                ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
                ->join('users', 'tugas.id_user', '=', 'users.id_user')
                ->where('tugas.status', '=', 'SUDAH')
                ->whereBetween('tugas.tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('ruang.nama_ruang', 'asc')
                ->get();
        } else{
            $jobs = DB::table('tugas')
                ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
                ->join('users', 'tugas.id_user', '=', 'users.id_user')
                ->where('tugas.status', '=', 'BELUM')
                ->whereBetween('tugas.tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('ruang.nama_ruang', 'asc')
                ->get();
        }
//        dd($jobs);

        return view('manager.laporan', compact('jobs', 'hari', 'tanggal', 'waktu'));

    }

    public function print_laporan_pdf()
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();
        $hari =  Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('manager.print_laporan', compact('jobs', 'hari', 'tanggal', 'waktu'));

        return $pdf->download("laporan_tugas_{$waktu}.pdf");
        //return view('manager.print_laporan', compact('jobs', 'waktu'));
    }

    public function print_laporan_excel()
    {
        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        return Excel::download(new PrintTugas(), "laporan_tugas_{$waktu}.xlsx");
    }
}
