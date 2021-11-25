<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    private $rombelId;

    public function __construct($rombelId)
    {
        $this->rombelId = $rombelId;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return Siswa::updateOrCreate([
            'rombel_id' => $this->rombelId,
            'nis' => $row['nis']
        ], [
            'nama' => $row['nama'],
            'password' => Hash::make($row['nis']),
            'jenis_kelamin' => $row['jenis_kelamin_lp']
        ]);
    }

    public function rules()
    {
        return [
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin_lp' => 'required'
        ];
    }
}
