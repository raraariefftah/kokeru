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
                'nama' => 'Honestea',
                'email' => 'honestea@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'manager',
            ],
            [
                'nama' => 'Rochmad',
                'email' => 'rochmad@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'cs',
            ],
            [
                'nama' => 'Wahyu',
                'email' => 'wahyu@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'cs',
            ],
            [
                'nama' => 'Aji',
                'email' => 'aji@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'cs',
            ],
            [
                'nama' => 'Fatah',
                'email' => 'fatah@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => 'cs',
            ],
        ]);
    }
}
