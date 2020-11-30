<?php

namespace App\Imports;

use App\Lampiran;
use Maatwebsite\Excel\Concerns\ToModel;

class LampiransImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Lampiran([
            'jenis'     => $row[0],
            'kode'    => $row[1], 
            'diskripsi'    => $row[2], 
            'saran'    => $row[3], 
        ]);

       
    }
}
