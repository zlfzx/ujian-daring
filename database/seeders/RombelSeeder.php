<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Rombel;
use Illuminate\Database\Seeder;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrRombel = [
            'IPA',
            'IPS',
            'Bahasa'
        ];

        $kelas = Kelas::get();

        foreach ($kelas as $key => $k) {
            foreach ($arrRombel as $key => $value) {
                $count = Rombel::where([
                    'kelas_id' => $k->id,
                    'nama' => $value
                ])->count();
                if ($count < 1) {
                    $rombel = new Rombel;
                    $rombel->kelas_id = $k->id;
                    $rombel->nama = $value;
                    $rombel->save();
                }
            }
        }
    }
}
