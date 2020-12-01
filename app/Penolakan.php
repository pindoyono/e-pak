<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penolakan extends Model
{
    //
    protected $fillable = [
        'lampiran_id','judul','berkas_id',
    ];
}
