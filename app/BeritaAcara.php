<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    //
    protected $fillable = [
        'pendidikan',
        'prajabatan',
        'pembelajaran',
        'bimbingan',
        'ugas_lain',
        'pd',
        'pi',
        'ki',
        'jazah_tdk_sesuai',
        'pendukung',
    ];

}
