<?php

use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            'id_jenis' => 'H',
            'nama_jenis' => 'Hardware',
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 'S',
            'nama_jenis' => 'Software',
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 'P',
            'nama_jenis' => 'Prosedur',
        ]);
        DB::table('jenis')->insert([
            'id_jenis' => 'L',
            'nama_jenis' => 'Lain-lain',
        ]);
    }
}
