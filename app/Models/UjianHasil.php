<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianHasil extends Model
{
    use HasFactory;

    protected $table = 'ujian_hasil';

    public function ujianSiswa()
    {
        return $this->belongsTo(UjianSiswa::class);
    }

    public function soal()
    {
        return $this->belongsTo(Soal::class);
    }
}
