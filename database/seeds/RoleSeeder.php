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
            'id'  => 'adm',
            'nama'  => 'admin',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id'  => 'P',
            'nama'  => 'panitia',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id'  => 'Py',
            'nama'  => 'penyedia',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id'  => 'PPK',
            'nama'  => 'PPK',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id'  => 'A',
            'nama'  => 'Auditor',
            'created_at' => now(),
        ]);
        DB::table('roles')->insert([
            'id'  => 'L',
            'nama'  => 'Lain-lain',
            'created_at' => now(),
        ]);

    }
}
