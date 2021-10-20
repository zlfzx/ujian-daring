<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Rombel;
use App\Models\Siswa;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rombel = Rombel::first();
        for ($i = 0; $i < 5; $i++) {
            $nis = 10000 . $i;

            $siswa = new Siswa;
            $siswa->rombel_id = $rombel->id;
            $siswa->nama = " Siswa $i";
            $siswa->nis = (int)$nis;
            $siswa->password = Hash::make('siswa');
            $siswa->jenis_kelamin = $i % 2 == 0 ? 'L' : 'P';
            $siswa->save();
        }
    }
}
