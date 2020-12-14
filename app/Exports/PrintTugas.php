<?php

namespace App\Exports;

use App\Tugas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class PrintTugas implements FromView
{
    public function view(): View
    {
        $jobs = DB::table('tugas')
            ->join('ruang', 'tugas.id_ruang', '=', 'ruang.id_ruang')
            ->join('users', 'tugas.id_user', '=', 'users.id_user')
            ->orderBy('ruang.nama_ruang', 'asc')
            ->get();
        $waktu = Carbon::now()->translatedFormat('l, d F Y H:i');

        return view('manager.print_laporan', compact('jobs', 'waktu'));
    }
}
