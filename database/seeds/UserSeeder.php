<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'Andre Pangestu',
                'email' => 'andreandre01@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'manager',
            ],
            [
                'nama' => 'Bakti Samosir',
                'email' => 'baktispd@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'manager',
            ],
            [
                'nama' => 'Luthfi Agung',
                'email' => 'luthung@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Galih Kurniawan',
                'email' => 'galihkun@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Paiman Setiawan',
                'email' => 'paimanwan@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'bagus Siregar',
                'email' => 'bagussiregar@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'hendra Raharja',
                'email' => 'heraharja@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Dhika Damanik',
                'email' => 'dhiman@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Sofyan Agus Prasetyo',
                'email' => 'sofaset@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Yusuf Sidiq Ardianto',
                'email' => 'yusanto@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Salman Al Faridi',
                'email' => 'alsalman@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],
            [
                'nama' => 'Wawan Wahyudin',
                'email' => 'wawahyudin@gmail.com',
                'password' => Hash::make('12345678'),
                'no_hp' => '089849827928',
                'role' => 'cs',
            ],

        ]);
    }
}
