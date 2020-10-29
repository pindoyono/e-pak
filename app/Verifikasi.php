<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verifikasi extends Model
{
    //
    protected $fillable = [
        'pesan', 'user_id', 'status',
    ];
}
