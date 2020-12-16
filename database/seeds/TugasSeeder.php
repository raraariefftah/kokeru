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
                'id_user' => '3',
                'id_ruang' => '1',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '4',
                'id_ruang' => '2',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '5',
                'id_ruang' => '3',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '6',
                'id_ruang' => '4',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '7',
                'id_ruang' => '5',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '8',
                'id_ruang' => '6',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '9',
                'id_ruang' => '7',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '10',
                'id_ruang' => '8',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '10',
                'id_ruang' => '9',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
            [
                'id_user' => '11',
                'id_ruang' => '10',
                'status' => 'BELUM',
                'tanggal_penugasan' => Carbon::now(),
                'tanggal_selesai' => Carbon::now(),
            ],
        ]);
    }
}
