<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $table = "urun";

    protected $fillable = ['urun_Ad','urun_Kod','urun_Olcut','urun_Fiyat','urun_Kur','urun_Alis','urun_Satis','urun_Aktif'];

}
