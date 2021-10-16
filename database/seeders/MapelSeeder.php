<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrMapel = [
            'IND' => 'Bahasa Indonesia',
            'MTK' => 'Matematika',
            'IPA' => "Ilmu Pengetahuan Alam",
            'IPS' => 'Ilmu Pengetahuan Sosial',
            'PKN' => 'Pendidikan Kewarganegaraan',
            'PAI' => "Pendidikan Agama Islam"
        ];

        foreach ($arrMapel as $key => $value) {
            $count = Mapel::where([
                'kode' => $key,
                'nama' => $value
            ])->count();

            if ($count < 1) {
                $mapel = new Mapel;
                $mapel->kode = $key;
                $mapel->nama = $value;
                $mapel->save();
            }
        }
    }
}
