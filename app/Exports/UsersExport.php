<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dupaks = DB::table('dupaks')
        ->join('users', 'users.id', '=', 'dupaks.user_id')
        ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
        ->select('users.name','sekolahs.nama','biodatas.karsu','dupaks.status','dupaks.awal','dupaks.akhir')
        ->get();
        return $dupaks;
        // return User::all();
    }
}
