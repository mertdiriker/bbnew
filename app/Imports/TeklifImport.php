<?php

namespace App\Imports;

use App\Models\Teklif;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class TeklifImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Teklif([
            
            $hammadde="119",
            'teklif_aciklama' => $row['hammadde'],
            'teklif_figur' => $row['figur'],
            'teklif_tip' => $row['tip'],
            'teklif_soptarih' => $row['soptarih'],
            'teklif_eoptarih' => $row['eoptarih'],
            'teklif_hacim' => $row['hacim'],
            'teklif_projead' => $row['projead'],
            'teklif_projekod' => $row['projekod'],
            'teklif_fingerlift' => $row['fingerlift'],
            'teklif_linerchange' => $row['linerchange'],
            'teklif_sandwich' => $row['sandwich'],
            'teklif_urunen' => $row['urunen'],
            'teklif_urunboy' => $row['urunboy'],
            'teklif_kisi' => Auth::user()->id,
            'teklif_firmaID' => Auth::user()->firm_ID,
            'teklif_hammaddeID' => $hammadde,
            'teklif_hammadde2ID' => $hammadde,


         
           

        ]);
    }
}
