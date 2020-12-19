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
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
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

        $hari = Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');

//        var_dump($tugas);
        if(Auth::check()){
            if(Auth::user()->role=='manager'){
                return redirect()->route('dashboard_manager');
            }
            else{
                return redirect()->route('dashboard_cs');
            }
        }
        else{
            return view('awal', compact('jobs','hari', 'tanggal', 'waktu'));
        }
    }

    public function create()
    {
        $title = 'Tambah Tugas';
        $cs = User::where('role', 'cs')->get();
//        $rooms = DB::table('ruang')
//            ->whereNotIn('id_ruang', DB::table('tugas')->select('id_ruang')->get())
//            ->get();
        $foreignruang = Tugas::select('id_ruang')->get();
        $rooms = Ruang::whereNotIn('id_ruang', $foreignruang)->get();
//        dd($foreruang);

        return view('manager.tambah_tugas', compact('cs', 'rooms', 'title'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'ruang' => 'required',
            'nama_cs' => 'required',
            'status' => 'required',
        ],
            [
                'ruang.required' => 'Silahkan pilih ruang',
                'nama_cs.required' => 'Silahkan pilih nama CS',
                'status.required' => 'Silahkan pilih status'
            ])->validate();
//        if ($validator->fails()) {
//            return redirect()->back()
//                ->withErrors($validator)
//                ->withInput();
//        }

        $cs = User::where('nama', $request->nama_cs)->first();
        $ruang = Ruang::where('nama_ruang', $request->ruang)->first();
        $iduser = $cs['id_user'];
        $idruang = $ruang['id_ruang'];

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
        $title = 'Dashboard CS';

        $id = Auth::user()->id_user;

        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        if (Auth::user()->role == 'cs') {
            $cs_jobs = DB::table('tugas')
                ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
                ->join('users', 'tugas.id_user', '=', 'users.id_user')
                ->where('tugas.id_user', '=', $id)
                ->get();

            return view('/cs/dashboard_cs', compact('cs_jobs', 'waktu', 'title'));
        } else {
            return abort(404);
        }
    }

    public function edit($id)
    {
        $title = 'Edit Tugas';
//        dd($id);
        $job = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->where('tugas.id_tugas', '=', $id)
            ->get();
//        dd($job);

        $cs = User::where('role', 'cs')->get();

        return view('manager.edit_tugas', compact('job', 'cs', 'title'));
    }

    public function update(Request $request, $id)
    {
        $job = Tugas::find($id);

        $cs = User::where('nama', $request->nama_cs)->first();
        $iduser = $cs['id_user'];
//        dd($iduser, $request->status);

        $job->update([
                'id_user' => $iduser,
                'status' => $request->status,
            ]
        );
        return back()
            ->with('success', 'Tugas berhasil diubah.');
    }

    public function destroy($id)
    {
        $job = Tugas::where('id_ruang',$id);
        $job->delete();
        return back()
            ->with('success', 'Tugas berhasil dihapus.');
    }

    public function upload_bukti($id_tugas)
    {
        $title = 'Upload Bukti';

        $job = Tugas::find($id_tugas);

        return view('cs.upload_bukti', compact('job', 'title'));
    }

    public function delete_bukti($id_tugas)
    {
        $job = Tugas::find($id_tugas);
        $job->update([
            "bukti1" => null,
            "bukti2" => null,
            "bukti3" => null,
            "bukti4" => null,
            "bukti5" => null,
        ]);
        $job->update([
            "status" => 'BELUM',
        ]);
        return redirect()->back()
        ->with([
            'success' => 'File berhasil dihapus.',
        ]);
    }

    public function update_bukti(Request $request, $id_tugas)
    {
        $bukti1 = $request->bukti1;
        $bukti2 = $request->bukti2;
        $bukti3 = $request->bukti3;
        $bukti4 = $request->bukti4;
        $bukti5 = $request->bukti5;
        $job = Tugas::find($id_tugas);
        $i = 0;
        if($bukti1!=null){
            $bukti = $bukti1->store('images', 'public');
            $job->update([
                    "bukti1" => $bukti,
            ]);
            $bukti1 = $job->bukti1;
            $i++;
        }
        if($bukti2!=null){
            $bukti = $bukti2->store('images', 'public');
            $job->update([
                    "bukti2" => $bukti,
            ]);
            $bukti2 = $job->bukti2;
            $i++;
        }
        if($bukti3!=null){
            $bukti = $bukti3->store('images', 'public');
            $job->update([
                    "bukti3" => $bukti,
            ]);
            $bukti3 = $job->bukti3;
            $i++;
        }
        if($bukti4!=null){
            $bukti = $bukti4->store('images', 'public');
            $job->update([
                    "bukti4" => $bukti,
            ]);
            $bukti4 = $job->bukti4;
            $i++;
        }
        if($bukti5!=null){
            $bukti = $bukti5->store('images', 'public');
            $job->update([
                    "bukti5" => $bukti,
            ]);
            $bukti5 = $job->bukti5;
            $i++;
        }
        if($i>0){
            $job->update([
                "status" => 'SUDAH',
            ]);
        }
        if($bukti1==null && $bukti2==null && $bukti3==null && $bukti4==null && $bukti5==null){
            return redirect()->back()
                ->with([
                    'failed' => 'Tidak ada file yang diupload',
                ]);
        }
        else{
            return redirect()->back()
                ->with([
                    'success' => 'File berhasil diupload.',
                ]);
        }
    }

    public function reset_tugas()
    {
        $jobs = Tugas::all();

        foreach ($jobs as $job) {
            DB::table('history')->insert([
                'nama_cs' => DB::table('users')->where('id_user',$job->id_user)->value('nama'),
                'nama_ruang' => DB::table('ruang')->where('id_ruang',$job->id_ruang)->value('nama_ruang'),
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
        $title = 'Laporan Tugas';

        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();

        $hari = Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');

        $waktutugas = Carbon::now()->translatedFormat('l, d F Y');
        $waktu_tugas = Carbon::today()->toDateString();

        return view('manager.laporan', compact('jobs', 'title', 'hari', 'tanggal', 'waktu', 'waktutugas', 'waktu_tugas'));

    }

    public function laporan_daftar_tugas(Request $request)
    {
        $title = 'Laporan Tugas';
//        dd($request->all());
//        dd($request->input('datepicker'));
        $tanggalprint = $request->datepicker;
        $from = $request->datepicker . ' 00:00:00';
        $until = $request->datepicker . ' 24:00:00';
        $status = $request->status;
        $hari = Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');
        if ($request->datepicker != null) {
            $waktutugas = Carbon::parse($request->datepicker)->translatedFormat('l, d F Y');
        } else {
            $waktutugas = Carbon::now()->translatedFormat('l, d F Y');
        }

        if ($status == 'SEMUA') {
            $jobs = DB::table('history')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        } elseif ($status == 'SUDAH') {
            $jobs = DB::table('history')
                ->where('history.old_status', '=', 'SUDAH')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        } else {
            $jobs = DB::table('history')
                ->where('history.old_status', '=', 'BELUM')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        }
//        dd($jobs);

        return view('manager.laporan_print', compact('jobs', 'title', 'hari', 'tanggal', 'waktu', 'waktutugas', 'status', 'tanggalprint'));

    }

    public function print_laporan_pdf($waktutugas, $status)
    {
//        dd($waktutugas, $status);

        if ($waktutugas == null) {
            $from = Carbon::today()->toDateString() . ' 00:00:00';
            $until = Carbon::today()->toDateString() . ' 24:00:00';
            $waktu_tugas = Carbon::now()->translatedFormat('l, d F Y');
        } else {
            $from = $waktutugas . ' 00:00:00';
            $until = $waktutugas . ' 24:00:00';
            $waktu_tugas = Carbon::parse($from)->translatedFormat('l, d F Y');
        }

        if ($status == null) {
            $status = 'SEMUA';
        }

        if ($status == 'SEMUA') {
            $jobs = DB::table('history')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        } elseif ($status == 'SUDAH') {
            $jobs = DB::table('history')
                ->where('history.old_status', '=', 'SUDAH')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        } else {
            $jobs = DB::table('history')
                ->where('history.old_status', '=', 'BELUM')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        }

        $hari = Carbon::now()->translatedFormat('l');
        $tanggal = Carbon::now()->translatedFormat('d F Y');
        $waktu = Carbon::now()->translatedFormat('H:i');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('manager.print_laporan_pdf', compact('jobs', 'hari', 'tanggal', 'waktu', 'waktu_tugas'));

        return $pdf->download("laporan_tugas_{$waktutugas}.pdf");
        //return view('manager.print_laporan', compact('jobs', 'waktu'));
    }

    public function print_laporan_excel($waktutugas, $status)
    {

        return Excel::download(new PrintTugas($waktutugas, $status), "laporan_tugas_{$waktutugas}.xlsx");
    }
}
