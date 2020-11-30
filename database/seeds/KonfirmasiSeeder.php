<?php

use Illuminate\Database\Seeder;

class KonfirmasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_konfirmasis')->insert([
            'nama_konfirmasi' => 'Telah Ditindaklanjuti'
        ]);
        DB::table('status_konfirmasis')->insert([
            'nama_konfirmasi' => 'Terdaftar'
        ]);
        DB::table('status_konfirmasis')->insert([
            'nama_konfirmasi' => 'Terdownload'
        ]);
        DB::table('status_konfirmasis')->insert([
            'nama_konfirmasi' => 'Jadwal Telah di Ubah'
        ]);
    }
}
