<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soal';

    public function pilihan()
    {
        return $this->hasMany(SoalPilihan::class);
    }

    public function pilihanBenar()
    {
        return $this->hasOne(SoalPilihan::class)->where('status', 1);
    }

    public function paketSoal()
    {
        return $this->belongsTo(PaketSoal::class);
    }

    public function hasil()
    {
        return $this->hasOne(UjianHasil::class)->whereHas('ujianSiswa', function ($q) {
            $q->where('siswa_id', auth()->id());
        });
    }
}
