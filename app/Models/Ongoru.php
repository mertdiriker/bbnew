<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ongoru extends Model
{
    use HasFactory;

    protected $table = "ongoru";

    protected $fillable = ['ongoru_urunkod','ongoru_miktar','ongoru_firmaID','ongoru_tarih','ongoru_termintarih'];

}
