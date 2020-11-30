<?php

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            'nama_media' => 'aplikasi',
        ]);
        DB::table('media')->insert([
            'nama_media' => 'email',
        ]);
        DB::table('media')->insert([
            'nama_media' => 'telp',
        ]);
        DB::table('media')->insert([
            'nama_media' => 'surat',
        ]);
    }
}
