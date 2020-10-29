<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setup extends Model
{
    //
    protected $fillable = [
        'deadline_guru', 'deadline_verifikator','deadline_penilai',
    ];
}
