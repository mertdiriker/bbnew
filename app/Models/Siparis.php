<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Siparis extends Model
{
    use HasFactory;

    protected $table = "siparis";

    protected  $primaryKey = 'siparis_ID';

    protected $fillable = ['siparis_urunkod','siparis_miktar','siparis_firmaID','siparis_tarih','siparis_sevkiyat','siparis_no','siparis_termintarih','siparis_kalanmiktar'];

}
