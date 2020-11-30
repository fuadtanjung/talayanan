<?php

use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipes')->insert([
            'id_tipe' => 'G',
            'nama_tipe' => 'Gangguan',
        ]);
        DB::table('tipes')->insert([
            'id_tipe' => 'M',
            'nama_tipe' => 'Masalah',
        ]);
        DB::table('tipes')->insert([
            'id_tipe' => 'P',
            'nama_tipe' => 'Permintaan Layanan',
        ]);
    }
}
