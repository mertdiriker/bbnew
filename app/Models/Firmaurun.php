<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Firmaurun extends Model
{
    use HasFactory;

    protected $table = "firmaurun";

    protected $fillable = ['firmaurun_UrunID','firmaurun_FirmaID','firmaurun_Fiyat','firmaurun_Kur'];

}
