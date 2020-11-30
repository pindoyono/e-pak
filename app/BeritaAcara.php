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
        'tugas_lain',
        'pd',
        'pi',
        'ki',
        'ijazah_tdk_sesuai',
        'pendukung',
        'dupak_id',
        'masa_kerja_baru',
        'masa_kerja_lama',
        'penilai',
        'nip_penilai',
        'dasus',
    ];

}
