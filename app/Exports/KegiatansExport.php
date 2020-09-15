<?php

namespace App\Exports;

use App\Kegiatan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KegiatansExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Kegiatan::all();
    }
}
