<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kelas = [
            'X',
            'XI',
            'XII'
        ];

        foreach ($kelas as $key => $value) {
            $count = Kelas::where('nama', $value)->count();
            if ($count < 1) {
                $k = new Kelas;
                $k->nama = $value;
                $k->save();
            }
        }
    }
}
