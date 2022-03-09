<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'urun_Ad' => $row['urunad'],
            'urun_Kod' => $row['urunkod'],
            'urun_Olcut' => $row['urunolcut'],
            'urun_Fiyat' => $row['urunfiyat'],
            'urun_Kur' => $row['urunkur'],
            'urun_Alis' => $row['urunalis'],
            'urun_Satis' => $row['urunsatis'],
            'urun_Aktif' => $row['urunaktif'],
           

        ]);
    }
}
