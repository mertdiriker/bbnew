<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Process extends Model
{
    use HasFactory;

    protected $table = "process";

    protected $fillable = ['process_ad','process_aciklama','process_departman','process_sira'];

}
