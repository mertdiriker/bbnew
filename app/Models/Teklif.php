<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Teklif extends Model
{
    use HasFactory;

    protected $table = "teklif";

    protected $fillable = ['teklif_figur','teklif_uruntip','teklif_pakettip','teklif_soptarih','teklif_hacim','teklif_projead','teklif_projekod',
    'teklif_fingerlift','teklif_linerchange','teklif_sandwich','teklif_hottrim','teklif_plaincut','teklif_edgeseal','teklif_urunen','teklif_urunboy'
    ,'teklif_kisi','teklif_aciklama','teklif_hammaddeID','teklif_hammadde2ID','teklif_firmaID'];

}
