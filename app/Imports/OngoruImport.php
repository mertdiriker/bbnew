<?php

namespace App\Imports;

use App\Models\Ongoru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use DB;

class OngoruImport implements ToModel,WithHeadingRow
{
    private $firm; 

    public function __construct($firm)
    {
        $this->firm = $firm; 
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          
       


            return new Ongoru([
            'ongoru_termintarih'=> \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tarih'])->format('Y-m-d'),
            'ongoru_urunkod'=> $row['urunkod'],
            'ongoru_firmaID' => $this->firm,
            'ongoru_miktar' => $row['miktar'],
            'ongoru_tarih' => \Carbon\Carbon::now()->format('Y-m-d')
         
           

        ]);
            
       
    }
}
