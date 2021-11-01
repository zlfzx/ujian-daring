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
        return $this->hasMany(UjianSiswa::class);
    }
}
