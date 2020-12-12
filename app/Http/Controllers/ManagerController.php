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
            ->orderBy('ruang.nama_ruang', 'asc')
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
        $manager = User::find($id);

        return view('manager.edit_profil', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $manager = User::find($id);
        $inputpass = Hash::check($request->password, $manager->password);
        if ($inputpass) {
            $manager->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'no_hp' => $request->no_hp,
                ]
            );

            return back()
                ->with('success', 'Data Anda berhasil diubah.');
        } else{
            return back()
                ->with('failed', 'Password yang Anda masukkan salah.')->withInput();
        }
    }

    public function destroy($id)
    {
        //
    }

    public function ubahPassword($id)
    {
        $manager = User::find($id);

        return view('manager.ubah_password', compact('manager'));
    }

    public function updatePassword(Request $request, $id)
    {
        $manager = User::find($id);
        $truepassword = Hash::check($request->password, $manager->password);
        if (($request->newpassword == $request->confirmnewpassword) && $truepassword) {
            $manager->update([
                    'password' => Hash::make($request->newpassword),
                ]
            );

            return back()
                ->with('success', 'Password berhasil diubah.');
        } elseif (!$truepassword){
            return back()
                ->with('failed', 'Password yang Anda masukkan salah.')->withInput();
        } else {
            return back()
                ->with('failed', 'Konfirmasi password salah, silahkan ulangi.')->withInput();
        }
    }

    public function resetPasswordCS($id)
    {
        $cs = User::find($id);
        $cs->update([
                'password' => Hash::make($cs->email),
            ]
        );

        return redirect()->route('daftar_cs')
            ->with('success', 'Password CS berhasil diubah.');
    }
}
