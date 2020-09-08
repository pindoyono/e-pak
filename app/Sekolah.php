<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    //
    protected $fillable = [
        'npsn', 'nama', 'alamat','status',
    ];
    

    public function sekolah(){
        return $this->hasMany("App\Users");
      }
}
