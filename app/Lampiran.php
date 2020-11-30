<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    //
    protected $fillable = [
        'kode', 'diskripsi','jenis','saran',
    ];

}
