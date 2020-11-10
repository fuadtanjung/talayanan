<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nama'  => 'admin',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'nama'  => 'pengguna',
            'created_at' => now(),
        ]);
    }
}
