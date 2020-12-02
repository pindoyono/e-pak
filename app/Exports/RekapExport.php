<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;


class RekapExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function view(): View
    {
        $data = DB::table('users')
        ->join('dupaks', 'users.id', '=', 'dupaks.user_id')
        ->join('berita_acaras', 'berita_acaras.dupak_id', '=', 'dupaks.id')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('jabatans', 'jabatans.id', '=', 'biodatas.pangkat_golongan')
        ->select( 'berita_acaras.*', 'users.name','pangkat','jabatan','jabatans.id as idj','dupaks.id as dupak_id','biodatas.pangkat_golongan as pangkat_golongan')
        ->where('biodatas.karsu', 'KENAIKAN PANGKAT')
        ->orderBy('users.name','asc')
        // ->groupBy('users.name')
        ->get();


        return view('dupaks_penilai.scrap_rekap', [
            'data' => $data,
        ]);
    }
}
