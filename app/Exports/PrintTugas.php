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
    protected $waktutugas;
    protected $status;

    function __construct($waktutugas, $status) {
        $this->waktutugas = $waktutugas;
        $this->status = $status;
    }

    public function view(): View
    {
        if ($this->waktutugas == null) {
            $from = Carbon::today()->toDateString() . ' 00:00:00';
            $until = Carbon::today()->toDateString() . ' 24:00:00';
            $waktu_tugas = Carbon::now()->translatedFormat('l, d F Y');
        } else {
            $from = $this->waktutugas . ' 00:00:00';
            $until = $this->waktutugas . ' 24:00:00';
            $waktu_tugas = Carbon::parse($from)->translatedFormat('l, d F Y');
        }

        if ($this->status == null) {
            $this->status = 'SEMUA';
        }

        if ($this->status == 'SEMUA') {
            $jobs = DB::table('history')
                ->whereBetween('history.old_tanggal_penugasan', [Carbon::parse($from), Carbon::parse($until)])
                ->orderBy('nama_ruang', 'asc')
                ->get();
        } elseif ($this->status == 'SUDAH') {
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

        return view('manager.print_laporan_excel', compact('jobs', 'hari', 'tanggal', 'waktu', 'waktu_tugas'));

    }
}
