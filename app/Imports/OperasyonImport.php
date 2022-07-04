<?php

namespace App\Imports;

use App\Models\Operasyon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class OperasyonImport implements ToModel,WithHeadingRow
{
    private $process; 

    public function __construct($process)
    {
        $this->process = $process; 
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          
       


            return new Operasyon([
            'operasyon_ad'=> $row['ad'],
            'operasyon_process' => $this->process,
            'operasyon_seribas1' => $row['seribas'],
            'operasyon_serison1' => $row['serison'],
            'operasyon_seri1' => $row['seri'],
            'operasyon_sorumlu1' => $row['sorumlu'],
            'operasyon_arac1' => $row['arac'],
            'operasyon_kayit1' => $row['kayit'],
            'operasyon_seribas2' => $row['seribas2'],
            'operasyon_serison2' => $row['serison2'],
            'operasyon_seri2' => $row['seri2'],
            'operasyon_sorumlu2' => $row['sorumlu2'],
            'operasyon_arac2' => $row['arac2'],
            'operasyon_kayit2' => $row['kayit2']

         
           

        ]);
            
       
    }
}
