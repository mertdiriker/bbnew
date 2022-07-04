<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Operasyon extends Model
{
    use HasFactory;

    protected $table = "operasyon";

    protected $fillable = ['operasyon_ad','operasyon_seribas1','operasyon_serison1','operasyon_seri1','operasyon_sorumlu1','operasyon_arac1','operasyon_kayit1',
    'operasyon_seribas2','operasyon_serison2','operasyon_seri2','operasyon_sorumlu2','operasyon_arac2','operasyon_kayit2'
    ,'operasyon_process'
    ];

}
