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
    function masakerja($date,$now)
    {
		$ts1 = strtotime($date);
		$ts2 = strtotime($now);
		$seconds_diff = $ts2 - $ts1;
		return floor($seconds_diff / (60 * 60 * 24 * 365))." Tahun";
    }
    
}

if (! function_exists('masakerja1')) {
    function masakerja1($date,$now)
    {
		$ts1 = strtotime($date);
		$ts2 = strtotime($now);
        $seconds_diff = $ts2 - $ts1;
        $mod = $seconds_diff % (60 * 60 * 24 * 365);
		return floor($mod / (60 * 60 * 24 * 30)).' Bulan';
    }
    
}


if (! function_exists('hitung_masa_kerja')) {

    function hitung_masa_kerja($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ".$m." bulan ";
    }
}
    
if (! function_exists('hitung_masa_kerja1')) {

    function hitung_masa_kerja1($cpns,$pns){
        $birthDate = new DateTime($cpns);
        $today = new DateTime($pns);
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ".$m." bulan ";
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

if (! function_exists('check_berita_acara')) {
    function check_berita_acara($id)
    {
        $data = \App\BeritaAcara::where('dupak_id',$id)->count();
		return $data;
    }
}

if (! function_exists('check_hapak')) {
    function check_hapak($id)
    {
        $data = \App\Hapak::where('dupak_id',$id)->count();
		return $data;
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

if (! function_exists('tgl_indo_tanpa_tahun')) {
    function tgl_indo_tanpa_tahun($tanggal){
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
     
        return  $pecahkan[2].' '.$bulan[ (int)$pecahkan[1] ];
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

if (! function_exists('hari_buat')) {
    function hari_buat($berita_acara){
        $hari = date('D', strtotime($berita_acara));
     
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

if (! function_exists('nama_bukti_fisik')) {
    function nama_bukti_fisik($id){
        $berkas = \App\Kegiatan::findOrFail($id);
        return $berkas;
    }
}

if (! function_exists('dinilai')) {
    function dinilai($id){
        $berita_acara = \App\BeritaAcara::where('dupak_id',$id)->count();
        if($berita_acara!=0){
            $berita = \App\BeritaAcara::where('dupak_id',$id)->first();
            $tgl = date('d M Y - H:i:s', $berita->created_at->timestamp);
        }else{
            $tgl = ' ';
        }
        return $tgl;
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


if (! function_exists('no_hapak')) {
    function no_hapak($dupak_id){
        $count = \App\Hapak::where('dupak_id', $dupak_id)->count();
        $no_hapak = \App\Hapak::where('dupak_id', $dupak_id)->first();
        if($count >0){
            return $no_hapak->no_pak;
        }else{
            return "Isikan No Pak";
        }
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


if (! function_exists('check_jabatan')) {
    function check_jabatan($id,$kolom){
        if($kolom!='target'){
            $id = $id + 1;
        }
        
        $data = \App\Jabatan::find($id)->$kolom;
        return $data;
    }
}

if (! function_exists('check_naik_pangkat')) {
    function check_naik_pangkat($id){
        $id = $id + 1;
        $data = \App\Jabatan::find($id);
        return $data;
    }
}


if (! function_exists('check_naik_pangkat_periode')) {
    function check_naik_pangkat_periode($berita_acara){
        $birthDate = new DateTime($berita_acara);
        $today = new DateTime("today");

        $tgl1= date('Y', strtotime($berita_acara));
        $tgl2= date('Y');

        if($tgl1 == $tgl2){
            return '1 April';
        }else{
            return '1 Oktober';
        }
        
    }
}