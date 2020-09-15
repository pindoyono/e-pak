<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    //
    protected $fillable = [
        'unsur','sub_unsur','kegiatan','kode','satuan_hasil','angka_kredit','pelaksana',
    ];


}
