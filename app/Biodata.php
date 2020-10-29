<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    //
    protected $fillable = [
        'jenis_kelamin','tugas_tambahan','tempat_lahir','tanggal_lahir','alamat','agama','nuptk','no_sk_cpns','tmt_cpns','tmt_pns','pangkat_golongan','kartu_pegawai','karsu','no_hp','user_id','jenis_guru','pendidikan','sekolah_id'
    ];

    
    public function user(){
        return $this->belongsTo("App\User");
      }
}
