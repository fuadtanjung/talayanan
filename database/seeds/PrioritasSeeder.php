<?php

use Illuminate\Database\Seeder;

class PrioritasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prioritas')->insert([
            'id_prioritas' => 'T',
            'nama_prioritas' => 'Tinggi',
        ]);
        DB::table('prioritas')->insert([
            'id_prioritas' => 'M',
            'nama_prioritas' => 'Menengah',
        ]);
        DB::table('prioritas')->insert([
            'id_prioritas' => 'R',
            'nama_prioritas' => 'Rendah',
        ]);
    }
}
