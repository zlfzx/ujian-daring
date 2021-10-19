<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pengaturan = Pengaturan::first();

        if (!$pengaturan) {
            $pengaturan = new Pengaturan;
        }

        $pengaturan->nama_institusi = 'Ujian Daring';
        $pengaturan->tagline = 'Lorem ipsum dolor sit amet';
        $pengaturan->slug_admin = 'admin';
        $pengaturan->save();
    }
}
