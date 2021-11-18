<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UjianSiswa extends Model
{
    use HasFactory;

    protected $table = 'ujian_siswa';

    protected $fillable = ['ujian_id', 'siswa_id', 'mulai', 'selesai', 'user_agent'];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function ujianHasil()
    {
        return $this->hasMany(UjianHasil::class);
    }
}
