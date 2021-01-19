<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $dupaks = DB::table('users')
        ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
        ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
        ->join('jabatans', 'jabatans.id', '=', 'biodatas.pangkat_golongan')
        ->select('users.id','users.name','users.email','users.password',DB::raw('CONCAT(" ",users.nip) as nip'),'jabatans.pangkat','jabatans.pangkat','biodatas.jenis_kelamin','biodatas.tempat_lahir','biodatas.tanggal_lahir',
        'biodatas.alamat','biodatas.agama',DB::raw('CONCAT(" ",biodatas.nuptk) as nuptk'),'biodatas.no_sk_cpns','biodatas.tmt_cpns','biodatas.tmt_pns','biodatas.pangkat_golongan',
        'biodatas.kartu_pegawai','biodatas.karsu','biodatas.no_hp','biodatas.jenis_guru','biodatas.tugas_tambahan','biodatas.pendidikan','sekolahs.npsn',
        'sekolahs.nama','sekolahs.alamat','sekolahs.jenis','sekolahs.status')
        ->get();
        return $dupaks;
        // return User::all();
    }

    public function headings(): array
    {
        return [      	
            'id',
            'name',
            'email',
            'password',
            'nip',
            'jenis_kelamin',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat',
            'agama',
            'nuptk',
            'no_sk_cpns',
            'tmt_cpns',
            'tmt_pns',
            'pangkat_golongan',
            'kartu_pegawai',
            'karsu',
            'Status Kenaikan Pangkat',
            'jenis_guru',
            'tugas_tambahan',
            'pendidikan',
            'npsn',
            'nama',
            'alamat',
            'jenis',
            'status',
        ];
    }
}
