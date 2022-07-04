<?php

namespace App\Imports;

use App\Models\Makine;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Auth;

class MakineImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        return new Makine([
            
            
            'makine_ad' => $row['makineadi'],
            'makine_tip' => $row['makinetipi'],
            'makine_firma' => $row['firma'],
            'makine_imalatyil' => $row['imalatyili'],
            'makine_yedek' => $row['yedekmakine'],
            'makine_devretarih' => $row['devre'],
            'makine_bolum' => $row['bolum'],
            'makine_islem' => $row['islem'],
            'makine_saatlikurt' => $row['saatlikurt'],
            'makine_olcut' => $row['olcut'],
            'makine_kapasite' => $row['kapasite'],
            'makine_orturun' => $row['ortcikanurun'],
            


         
           

        ]);
    }
}
