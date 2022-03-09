<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Recipe extends Model
{
    use HasFactory;

    protected $table = "recete";

    protected $fillable = ['recete_Urun1ID','recete_Urun2ID','recete_Oran','recete_Oranfire','recete_Silindi','recete_Silen','recete_Silinditarih'];

}
