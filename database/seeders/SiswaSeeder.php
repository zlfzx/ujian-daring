<?php

namespace Database\Seeders;

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
        $faker = Factory::create('id_ID');

        $rombels = Rombel::get();
        foreach ($rombels as $key => $rombel) {
            for ($i=0; $i < 5; $i++) {
                $siswa = new Siswa;
                $siswa->rombel_id = $rombel->id;
                $siswa->nama = $faker->name;
                $siswa->nis = $faker->randomNumber(6);
                $siswa->password = Hash::make('siswa');
                $siswa->jenis_kelamin = $key % 2 == 0 ? 'L' : 'P';
                $siswa->save();
            }
        }

    }
}
