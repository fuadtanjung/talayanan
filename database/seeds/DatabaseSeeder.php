<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MediaSeeder::class);
        $this->call(KonfirmasiSeeder::class);
        $this->call(JenisSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(PrioritasSeeder::class);
        $this->call(TipeSeeder::class);
        $this->call(UrgensiSeeder::class);
        $this->call(DampakSeeder::class);
    }
}
