<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Tugas;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $jobs = Tugas::all();

            foreach ($jobs as $job) {
                DB::table('history')->insert([
                    'nama_cs' => DB::table('users')->where('id_user', $job->id_user)->value('nama'),
                    'nama_ruang' => DB::table('ruang')->where('id_ruang', $job->id_ruang)->value('nama_ruang'),
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
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
