<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Admin Lpse',
            'username' => 'admin',
            'nip' => '123456789',
            'kontak' => '123456789',
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(30),
            'role_id'   => 1,
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Coba',
            'username' => 'users',
            'nip' => '12345',
            'kontak' => '12345',
            'password' => bcrypt('pengguna'),
            'remember_token' => Str::random(30),
            'role_id'   => 2,
            'created_at' => now(),
        ]);
    }
}
