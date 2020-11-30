<?php

namespace App\Exports;

use App\Lampiran;
use Maatwebsite\Excel\Concerns\FromCollection;

class LampiransExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lampiran::all();
    }
}
