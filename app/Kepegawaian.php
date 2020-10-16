<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepegawaian extends Model
{
    //
    protected $fillable = [
        'nama','berkas',
        'sk_penyesuaian',
    ];
}
