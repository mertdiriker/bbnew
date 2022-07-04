<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Makine extends Model
{
    use HasFactory;

    protected $table = "makine";

    protected $fillable = ['makine_ad','makine_tip','makine_firma','makine_imalatyil','makine_yedek','makine_devretarih','makine_bolum','makine_saatlikurt',
    'makine_islem','makine_olcut','makine_kapasite','makine_orturun'];

}
