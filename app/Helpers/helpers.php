<?php
   
function customTanggal($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}
    
function customImagePath($image_name)
{
    return public_path('folder_kamu/sub_folder_kamu/'.$image_name);
}


if (! function_exists('tgl_indo')) {
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return  $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }
}

if (! function_exists('nama_sekolah')) {
    function nama_sekolah($id){
        $sekolah = \App\Sekolah::findOrFail($id);
        return $sekolah;
    }
}

if (! function_exists('kegiatans')) {
    function kegiatans($id){
        $kegiatans = \App\Kegiatan::findOrFail($id);
        return $kegiatans;
    }
}

if (! function_exists('pangkat')) {
    function pangkat($id){
        $jabatan = \App\Jabatan::findOrFail($id);
        return $jabatan;
    }
}

if (! function_exists('tgl_indo_tahun')) {
    function tgl_indo_tahun($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
     
        return  $pecahkan[0];
    }
}