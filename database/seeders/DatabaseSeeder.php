<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        $this->call(PengaturanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(RombelSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(MapelSeeder::class);
    }
}
