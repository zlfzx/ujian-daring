<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujian';

    public function rombel()
    {
        return $this->belongsTo(Rombel::class);
    }

    public function paketSoal()
    {
        return $this->belongsTo(PaketSoal::class);
    }
}
