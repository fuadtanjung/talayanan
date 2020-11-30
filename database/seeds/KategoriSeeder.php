<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'id_kategori' => 'T',
            'nama_kategori' => 'Teknis',
        ]);

        DB::table('kategoris')->insert([
            'id_kategori' => 'N',
            'nama_kategori' => 'Non Teknis',
        ]);
    }
}
