<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($k = 0; $k < 30; $k++){
            for ($i = 0; $i < 10; $i++){
                $dp = Carbon::create(2020, 12, 16, 0);
                $ds = Carbon::create(2020, 12, 16, 0);
                DB::table('history')->insert([
                    [
                        'id_tugas' => (string)$i+1,
                        'id_cs' => (string)$i+3,
                        'id_ruang' => (string)$i+1,
                        'old_status' => 'SUDAH',
                        'old_bukti1' => 'https://www.invistaperforms.org/wp-content/uploads/2014/11/Classroom-Desks.jpg',
                        'old_bukti2' => 'https://www.invistaperforms.org/wp-content/uploads/2014/11/Classroom-Desks.jpg',
                        'old_bukti3' => 'https://www.invistaperforms.org/wp-content/uploads/2014/11/Classroom-Desks.jpg',
                        'old_bukti4' => 'https://www.invistaperforms.org/wp-content/uploads/2014/11/Classroom-Desks.jpg',
                        'old_bukti5' => 'https://www.invistaperforms.org/wp-content/uploads/2014/11/Classroom-Desks.jpg',
                        'old_tanggal_penugasan' => $dp->subDays(30-$k),
                        'old_tanggal_selesai' => $ds->subDays(30-$k)->addHours(17)->addMinutes(20+$k)->addSeconds(10+$i),
                    ],
                ]);
            }
        }
    }
}
