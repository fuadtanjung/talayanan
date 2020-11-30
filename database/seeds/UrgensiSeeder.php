<?php

use Illuminate\Database\Seeder;

class UrgensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('urgensis')->insert([
            'id_urgensi' => 'M',
            'nama_urgensi' => 'Mendesak',
        ]);

        DB::table('urgensis')->insert([
            'id_urgensi' => 'T',
            'nama_urgensi' => 'Tidak Mendesak',
        ]);
    }
}
