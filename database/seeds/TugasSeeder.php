<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tugas')->insert([
            [
                'id_user' => '2',
                'id_ruang' => '1',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '5',
                'id_ruang' => '2',
                'status' => 'SUDAH',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '3',
                'id_ruang' => '3',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '4',
                'id_ruang' => '4',
                'status' => 'SUDAH',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
        ]);
    }
}
