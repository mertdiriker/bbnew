<?php

namespace App\Imports;

use App\Models\Process;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProcessImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Process([
            'process_aciklama' => $row['aciklama'],
            'process_ad' => $row['ad'],
            'process_sira' => $row['sira'],
            'process_departman' => $row['departman']
         
           

        ]);
    }
}
