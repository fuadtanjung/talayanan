<?php

use Illuminate\Database\Seeder;

class DampakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dampaks')->insert([
            'id_dampak' => 'B',
            'nama_dampak' => 'Besar',
        ]);
        DB::table('dampaks')->insert([
            'id_dampak' => 'S',
            'nama_dampak' => 'Sedang',
        ]);
        DB::table('dampaks')->insert([
            'id_dampak' => 'K',
            'nama_dampak' => 'Kecil',
        ]);
    }
}
