<?php
   
use Spatie\Permission\Models\Role;


function customTanggal($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);    
}

function customTanggal1($date,$date_format){
    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format($date_format);    
}
    
function customImagePath($image_name)
{
    return public_path('folder_kamu/sub_folder_kamu/'.$image_name);
} 

if (! function_exists('masakerja')) {
    function masakerja($date)
    {
		$ts1 = strtotime($date);
		$ts2 = strtotime(date("Y-m-d H:i:s"));
		$seconds_diff = $ts2 - $ts1;
		return floor($seconds_diff / (60 * 60 * 24 * 365))." Tahun";
    }
}

if (! function_exists('jumlah')) {
    function jumlah($role)
    {
        $roles = Role::where('name',$role)->count();
        if($roles!=0){
            $users = \App\User::role($role)->count();
        }else{
            $users = 0;
        }
        return $users;
    }
}

if (! function_exists('jumlah_sekolah')) {
    function jumlah_sekolah()
    {
        $sekolah = \App\Sekolah::count();
		return $sekolah;
    }
}

if (! function_exists('jumlah_usulan')) {
    function jumlah_usulan()
    {
        $dupak = \App\Dupak::count();
		return $dupak;
    }
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

if (! function_exists('hari_ini')) {
function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return  $hari_ini;
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

if (! function_exists('parsing')) {
    function parsing($data){
        // $content=file_get_contents($data);
        // $content=utf8_encode($content);
        $result=json_decode($data,true);

        return $result;
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


if (! function_exists('notif')) {
    function notif($user_id){
        $notif = \App\Verifikasi::where('user_id', $user_id)
                                    ->where('status', 'baru')
                                    ->count();

        return $notif;
    }
}

if (! function_exists('get_notif')) {
    function get_notif($user_id){
        $notif = \App\Verifikasi::where('user_id', $user_id)
                                    ->where('status', 'baru')
                                    ->get();

        return $notif;
    }
}


if (! function_exists('setup')) {
    function setup($kolom){
        $setup = \App\Setup::first()->$kolom;
        return $setup;
    }
}