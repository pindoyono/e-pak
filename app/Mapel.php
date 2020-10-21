<?php

namespace App;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $fillable = [
        'nama', 'keterangan','jenis',
    ];
}
