<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $administrator = new \App\Sekolah;
        $administrator->npsn = "0000";
        $administrator->nama = "Belum Ada";
        $administrator->alamat = "Belum ADA";
        $administrator->status = "Negeri";

        $administrator->save();
    }
}
