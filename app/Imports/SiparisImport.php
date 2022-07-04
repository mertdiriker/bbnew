<?php

namespace App\Imports;

use App\Models\Siparis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class SiparisImport implements ToModel,WithHeadingRow
{
    private $firm;
    private $sevk; 

    public function __construct($firm,$sevk)
    {
        $this->firm = $firm;
        $this->sevk = $sevk; 
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          
       


            return new Siparis([
            'siparis_urunkod'=> $row['urunkod'],
            'siparis_firmaID' => $this->firm,
            'siparis_miktar' => $row['miktar'],
            'siparis_termintarih' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tarih'])->format('Y-m-d'),
            'siparis_no' => $row['siparisno'],
            'siparis_sevkiyat' => $this->sevk,
            'siparis_tarih' => \Carbon\Carbon::now()->format('Y-m-d')

         
           

        ]);
            
       
    }
}
