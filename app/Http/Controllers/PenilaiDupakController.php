<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use PDF;
use DB; 
use Auth;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;
use Excel;
use App\Exports\RekapExport;
use App\Exports\RekapExport3B;
use App\Exports\RekapExportTahunan;
use LynX39\LaraPdfMerger\Facades\PdfMerger;





use Illuminate\Support\Facades\Validator;

class PenilaiDupakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //198808112019031005
        $user = Auth::user();
        $roles = $user->getRoleNames();
        if($roles == 'penilai'){
            $dupaks = DB::table('dupaks')
            ->join('users', 'users.id', '=', 'dupaks.user_id')
            ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
            ->where('dupaks.status','!=', 'Usulan Baru')
            ->where('dupaks.status','!=', 'Perbaikan Data')
            ->select('dupaks.*','sekolahs.nama' ,'users.name','biodatas.karsu')
            ->orderBy('created_at','asc')
            ->get();
        }else{
            $dupaks = DB::table('dupaks')
            ->join('users', 'users.id', '=', 'dupaks.user_id')
            ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
            ->select('dupaks.*','sekolahs.nama' ,'users.name','biodatas.karsu')
            ->orderBy('created_at','asc')
            ->get();
        }
        // $dupaks = \App\Dupak::where('status', 'submit' )->orderBy('id','asc')->get();
        return view('dupaks_penilai.index', ['dupaks' => $dupaks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->orderBy('nama','asc')->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();

        return view('dupaks_penilai.detail',   [    'dupak' => $dupak,
                                            'biodatas' => $biodatas,
                                            'users' => $user,
                                            'kepegawaians' => $kepegawaians,
                                            'berkas' => $berkas,
                                    ]
                                );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Penolakan::findOrFail($id);
        $dupak_id = $data->berkas_id;
        $data->delete();
        return redirect()->route( 'dupaks_penilai.lampiran', Crypt::encrypt($dupak_id))->with('toast_success', 'Task Delete Successfully!');

    }

    public function berita_acara($id)
    {
        //
        // var_dump($id);
        // exit;
        //
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();
        $now = date('Y-m-d');
        $berita_acara = \App\BeritaAcara::where('dupak_id', $id)->first();
        // $berita_acara = json_decode($berita_acara);
        
        return view('dupaks_penilai.berita_acara', ['berita_acara' => $berita_acara,
                                                    'dupak' => $dupak,
                                                    'biodatas' => $biodatas,
                                                    'users' => $user,
                                                    'now' => $now,
                                                    'kepegawaians' => $kepegawaians,
                                                    'dupak_id' => $id,
                                                    'berkas' => $berkas,
                                                    ]
                                                );
    }

    public function hapak($id)
    {
        //
        // var_dump($id);
        // exit;
        //
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();
        $now = date('Y-m-d');
        $berita_acara = \App\Hapak::where('dupak_id', $id)->first();
        // $berita_acara = json_decode($berita_acara);
        
        return view('dupaks_penilai.hapak', ['berita_acara' => $berita_acara,
                                                    'dupak' => $dupak,
                                                    'biodatas' => $biodatas,
                                                    'users' => $user,
                                                    'now' => $now,
                                                    'kepegawaians' => $kepegawaians,
                                                    'dupak_id' => $id,
                                                    'berkas' => $berkas,
                                                    ]
                                                );
    }

    public function create_or_update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        // var_dump($id);
        // exit;
        $berita_acara = \App\BeritaAcara::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'dupak_id'   => $id,
        ],[
            'dupak_id'   => $id,
            'dasus'   => $request->get('dasus'),
            'masa_kerja_baru'   => $request->get('baru'),
            'masa_kerja_lama'   => $request->get('lama'),
            'penilai'   => Auth::user()->name,
            'nip_penilai'   => Auth::user()->nip,
            'pendidikan' => json_encode([ 
                'lama' => $request->get('value1'),
                'baru' => $request->get('value2'),
                'total' => $request->get('sum'),
            ]),
            'prajabatan' =>json_encode([ 
                'lama' => $request->get('value1a'),
                'baru' => $request->get('value2a'),
                'total' => $request->get('suma'),
            ]),
            'pembelajaran' => json_encode([ 
                'lama' => $request->get('value1b'),
                'baru' => $request->get('value2b'),
                'total' => $request->get('sumb'),
            ]),
            'bimbingan' => json_encode([ 
                'lama' => $request->get('value1c'),
                'baru' => $request->get('value2c'),
                'total' => $request->get('sumc'),
            ]),
            'tugas_lain' => json_encode([ 
                'lama' => $request->get('value1d'),
                'baru' => $request->get('value2d'),
                'total' => $request->get('sumd'),
            ]),
            'pd' => json_encode([ 
                'lama' => $request->get('value1e'),
                'baru' => $request->get('value2e'),
                'total' => $request->get('sume'),
            ]),
            'pi' => json_encode([ 
                'lama' => $request->get('value1f'),
                'baru' => $request->get('value2f'),
                'total' => $request->get('sumf'),
            ]),
            'ki' => json_encode([ 
                'lama' => $request->get('value1g'),
                'baru' => $request->get('value2g'),
                'total' => $request->get('sumg'),
            ]),
            'ijazah_tdk_sesuai' => json_encode([ 
                'lama' => $request->get('value1h'),
                'baru' => $request->get('value2h'),
                'total' => $request->get('sumh'),
            ]),
            'pendukung' => json_encode([ 
                'lama' => $request->get('value1i'),
                'baru' => $request->get('value2i'),
                'total' => $request->get('sumi'),
            ]),
        ]);

        $dupak = \App\Dupak::findOrFail($id);
        $dupak->status="Sudah Dinilai";
        $dupak->update();
        
        $user = \App\User::find($dupak->user_id)->chat_id_verified;
        $group_id = \App\Setup::first()->group_id;
        $telegram_id = $group_id;

        // echo $user;
        // echo "<br>";
        // echo $telegram_id;
        if($user!=""){
            $telegram_id = $user;
        }
        // echo $telegram_id;
        
        $users = \App\User::find($dupak->user_id);

        $text = "Halo, ".$users->name."\n"
            . "Berkas usulan anda sudah dinilai \n"
            . "Terimakasih sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada saran dan masukan untuk pengembangan aplikasi ini.. silahkan klik link berikut ini \n";
            
            if(url('/') == 'http://localhost:8000'){

                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => 'http://e-pak.smkn2malinau.sch.id' ]),
                    Keyboard::inlineButton(['text' => 'List Dupak', 'url' => 'http://e-pak.smkn2malinau.sch.id' ])
                );
            }else{
                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => route('sarans.create') ]),
                    Keyboard::inlineButton(['text' => 'List Dupak', 'url' => route('dupaks.index') ])
                );
            }
                
            Telegram::sendMessage([
                'chat_id' => $telegram_id ,
                'parse_mode' => 'HTML',
                'reply_markup' => $keyboard,
                'text' => $text,
            ]);

            
            $details = [
                    'from' => 'admin@e-pakgurukaltara.com',
                    'greeting' => 'Halo, '.$users->name,
                    'body' => 'Berkasi Usulan Anda Sudah di Nilai',
                    'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                    'saran' => 'Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini ',
                    'tombol' => "http:/e-pakgurukaltara.com/sarans/create",
                    'list_notif' => 'Usulan Anda Sudah Dinilai oleh Tim Penilai',
                    'text_action' => 'List Dupak',
                    'link1' => route('dupaks.index'),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));

        $id = Crypt::encrypt($id);
        
        return redirect()->route('dupaks_penilai.index',$id)->with('toast_success', 'Task Created Successfully!');
    }


    public function create_or_update_hapak(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        // var_dump($id);
        // exit;
        $berita_acara = \App\Hapak::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'dupak_id'   => $id,
        ],[
            'dupak_id'   => $id,
            'masa_kerja_baru'   => $request->get('baru'),
            'dasus'   => $request->get('dasus'),
            'masa_kerja_lama'   => $request->get('lama'),
            'catatan'   => $request->get('catatan'),
            'penilai'   => Auth::user()->name,
            'nip_penilai'   => Auth::user()->nip,
            'pendidikan' => json_encode([ 
                'lama' => $request->get('value1'),
                'baru' => $request->get('value2'),
                'total' => $request->get('sum'),
            ]),
            'prajabatan' =>json_encode([ 
                'lama' => $request->get('value1a'),
                'baru' => $request->get('value2a'),
                'total' => $request->get('suma'),
            ]),
            'pembelajaran' => json_encode([ 
                'lama' => $request->get('value1b'),
                'baru' => $request->get('value2b'),
                'total' => $request->get('sumb'),
            ]),
            'bimbingan' => json_encode([ 
                'lama' => $request->get('value1c'),
                'baru' => $request->get('value2c'),
                'total' => $request->get('sumc'),
            ]),
            'tugas_lain' => json_encode([ 
                'lama' => $request->get('value1d'),
                'baru' => $request->get('value2d'),
                'total' => $request->get('sumd'),
            ]),
            'pd' => json_encode([ 
                'lama' => $request->get('value1e'),
                'baru' => $request->get('value2e'),
                'total' => $request->get('sume'),
            ]),
            'pi' => json_encode([ 
                'lama' => $request->get('value1f'),
                'baru' => $request->get('value2f'),
                'total' => $request->get('sumf'),
            ]),
            'ki' => json_encode([ 
                'lama' => $request->get('value1g'),
                'baru' => $request->get('value2g'),
                'total' => $request->get('sumg'),
            ]),
            'ijazah_tdk_sesuai' => json_encode([ 
                'lama' => $request->get('value1h'),
                'baru' => $request->get('value2h'),
                'total' => $request->get('sumh'),
            ]),
            'pendukung' => json_encode([ 
                'lama' => $request->get('value1i'),
                'baru' => $request->get('value2i'),
                'total' => $request->get('sumi'),
            ]),
        ]);

        $dupak = \App\Dupak::findOrFail($id);
        $dupak->status="Sudah Dinilai";
        $dupak->update();
        
        $user = \App\User::find($dupak->user_id)->chat_id_verified;
        $group_id = \App\Setup::first()->group_id;
        $telegram_id = $group_id;

        // echo $user;
        // echo "<br>";
        // echo $telegram_id;
        if($user!=""){
            $telegram_id = $user;
        }
        // echo $telegram_id;
        
        $users = \App\User::find($dupak->user_id);

        $text = "Halo, ".$users->name."\n"
            . "Berkas usulan anda sudah dinilai \n"
            . "Terimakasih sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada saran dan masukan untuk pengembangan aplikasi ini.. silahkan klik link berikut ini \n";
            
            if(url('/') == 'http://localhost:8000'){

                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => 'http://e-pak.smkn2malinau.sch.id' ]),
                    Keyboard::inlineButton(['text' => 'List Dupak', 'url' => 'http://e-pak.smkn2malinau.sch.id' ])
                );
            }else{
                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => route('sarans.create') ]),
                    Keyboard::inlineButton(['text' => 'List Dupak', 'url' => route('dupaks.index') ])
                );
            }
                
            Telegram::sendMessage([
                'chat_id' => $telegram_id ,
                'parse_mode' => 'HTML',
                'reply_markup' => $keyboard,
                'text' => $text,
            ]);

            
            $details = [
                    'from' => 'admin@e-pakgurukaltara.com',
                    'greeting' => 'Halo, '.$users->name,
                    'body' => 'Berkasi Usulan Anda Sudah di Nilai',
                    'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                    'saran' => 'Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini ',
                    'tombol' => "http:/e-pakgurukaltara.com/sarans/create",
                    'list_notif' => 'Usulan Anda Sudah Dinilai oleh Tim Penilai',
                    'text_action' => 'List Dupak',
                    'link1' => route('dupaks.index'),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));

        $id = Crypt::encrypt($id);
        
        return redirect()->route('dupaks_penilai.index',$id)->with('toast_success', 'Task Created Successfully!');
    }

    public function createPDF($id) {
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();
        $now = date('Y-m-d');
        $berita_acara = \App\BeritaAcara::where('dupak_id', $id)->first();
        $pdf = \PDF::loadView('dupaks_penilai.cetak_berita_acara', ['berita_acara' => $berita_acara,
                                                                    'dupak' => $dupak,
                                                                    'biodatas' => $biodatas,
                                                                    'users' => $user,
                                                                    'now' => $now,
                                                                    'kepegawaians' => $kepegawaians,
                                                                    'dupak_id' => $id,
                                                                    'berkas' => $berkas,
                                                                    ]
                                                                );
        $pdf->setPaper('letter', 'potrait');
        return $pdf->stream('Berita Acara.pdf');
    }

    public function create_pak_PDF($id) {
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();
        $now = date('Y-m-d');
        $berita_acara = \App\BeritaAcara::where('dupak_id', $id)->first();

        $pdf = \PDF::loadView('dupaks_penilai.cetak_pak', ['berita_acara' => $berita_acara,
                                                                    'dupak' => $dupak,
                                                                    'biodatas' => $biodatas,
                                                                    'users' => $user,
                                                                    'now' => $now,
                                                                    'kepegawaians' => $kepegawaians,
                                                                    'dupak_id' => $id,
                                                                    'berkas' => $berkas,
                                                                    ]
                                                                );
        $pdf->setPaper('F4', 'potrait');
        return $pdf->stream('Berita Acara.pdf');

    }

    public function hapakPDF($id) {
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail($dupak->user_id);
        $biodatas = \App\Biodata::where('user_id', $dupak->user_id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id', $dupak->user_id)->get();
        $now = date('Y-m-d');
        $berita_acara = \App\Hapak::where('dupak_id', $id)->first();

        $lampirans = DB::table('penolakans')
        ->join('lampirans', 'lampirans.id', '=', 'penolakans.lampiran_id')
        ->where('berkas_id', $id)
        ->get();

        $pdf = \PDF::loadView('dupaks_penilai.cetak_hapak', ['berita_acara' => $berita_acara,
                                                                    'dupak' => $dupak,
                                                                    'biodatas' => $biodatas,
                                                                    'users' => $user,
                                                                    'now' => $now,
                                                                    'kepegawaians' => $kepegawaians,
                                                                    'dupak_id' => $id,
                                                                    'berkas' => $berkas,
                                                                    'lampirans' => $lampirans,
                                                                    ]
                                                                );

        $pdf->setPaper('F4', 'potrait');
        return $pdf->stream('Hapak.pdf');
    }

    public function preview($pdf) {
        $pdf = Crypt::decrypt($pdf);
       return view('dupaks_penilai.preview', ['pdf' => $pdf]);
    }

    public function lampiran($id)
    {
        $id =  Crypt::decrypt($id);
        
        $data = DB::table('penolakans')
        ->join('lampirans', 'lampirans.id', '=', 'penolakans.lampiran_id')
        // ->join('berkas', 'berkas.dupak_id', '=', 'penolakans.berkas_id')
        ->where('penolakans.berkas_id', $id)
        ->select( '*', 'penolakans.id as idp')
        ->get();
        
        $lampirans = \App\Lampiran::get();
        return view('dupaks_penilai.l2pkb', [
                                            'id' => $id,
                                            'data' => $data,
                                            'lampirans' => $lampirans,
                                            ]);

    }


    public function lampiran_store(Request $request,$id)
    {
        $id =  Crypt::decrypt($id);
        $validator = Validator::make($request->all(), [
            "lampiran_id" => "required",
            "judul" => "required",
        ]);
        	
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $data = new \App\Penolakan;
        $data->lampiran_id = $request->get('lampiran_id');
        $data->judul = $request->get('judul');
        $data->berkas_id = $id;
        $data->save();

        return redirect()->route('dupaks_penilai.lampiran', Crypt::encrypt($id))->with('toast_success', 'Task Created Successfully!');
    }

    public function rekap()
    {
        $data = DB::table('users')
        ->join('dupaks', 'users.id', '=', 'dupaks.user_id')
        ->join('berita_acaras', 'berita_acaras.dupak_id', '=', 'dupaks.id')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('jabatans', 'jabatans.id', '=', 'biodatas.pangkat_golongan')
        ->select( 'berita_acaras.*', 'berita_acaras.id as baid', 'users.name','pangkat','jabatan','jabatans.id as idj','dupaks.id as dupak_id','dupaks.no_pak as no_pak_dupak','dupaks.awal','biodatas.pangkat_golongan as pangkat_golongan')
        ->where('biodatas.karsu', 'KENAIKAN PANGKAT')
        // ->where('biodatas.pangkat_golongan' ,'1')
        ->orderBy('berita_acaras.cek','asc')
        // ->groupBy('users.name')
        ->get();
        return view('dupaks_penilai.rekap', [
                                            'data' => $data,
                                            ]);
    }

    public function rekap_3b()
    {
        $data = DB::table('users')
        ->join('dupaks', 'users.id', '=', 'dupaks.user_id')
        ->join('hapaks', 'hapaks.dupak_id', '=', 'dupaks.id')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('jabatans', 'jabatans.id', '=', 'biodatas.pangkat_golongan')
        ->select( 'hapaks.*', 'hapaks.id as baid', 'users.name','pangkat','jabatan','jabatans.id as idj','dupaks.id as dupak_id','dupaks.no_pak as no_pak_dupak','biodatas.pangkat_golongan as pangkat_golongan')
        ->where('biodatas.karsu', 'KENAIKAN PANGKAT')
        ->where('biodatas.pangkat_golongan','!=' ,'1')
        ->orderBy('hapaks.cek','asc')
        // ->groupBy('users.name')
        ->get();
        return view('dupaks_penilai.rekap_3b', [
                                            'data' => $data,
                                            ]);

    }


    public function scrap_rekap()
    {
        return Excel::download(new RekapExport, 'RekapExport.xlsx');
    }

    public function rekap_pak_tahunan()
    {
        
        
        $data = DB::table('users')
        ->join('dupaks', 'users.id', '=', 'dupaks.user_id')
        ->join('berita_acaras', 'berita_acaras.dupak_id', '=', 'dupaks.id')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('jabatans', 'jabatans.id', '=', 'biodatas.pangkat_golongan')
        ->select( 'berita_acaras.*', 'users.name','pangkat','jabatan','jabatans.id as idj','dupaks.id as dupak_id','dupaks.awal','dupaks.no_pak as no_pak_dupak','biodatas.pangkat_golongan as pangkat_golongan')
        ->where('biodatas.karsu', '!=' ,'KENAIKAN PANGKAT')
        ->orderBy('users.name','asc')
        // ->groupBy('users.name')
        ->get();


        return view('dupaks_penilai.rekap_tahunan', [
                                            'data' => $data
                                            ]);

    }


    public function scrap_rekap_tahunan()
    {
        return Excel::download(new RekapExportTahunan, 'RekapExportTahunan.xlsx');
    }

    public function scrap_rekap_RekapExport3B()
    {
        return Excel::download(new RekapExport3B, 'RekapExport3B.xlsx');
    }

    

    public function cek_ok($id)
    {
        $id = Crypt::decrypt($id); 
        $dupak = \App\Dupak::where('id', $id )->first();
        $data = \App\BeritaAcara::where('dupak_id', $id)->first();
        $data->cek = 'OK';
        $data->update();
        return redirect()->route( 'dupaks_penilai.rekap')->with('toast_success', 'Task chek Successfully!');
        
    }

    public function no_pak(Request $request,$id)
    {

        $id = Crypt::decrypt($id); 
        $dupak = \App\Dupak::where('id', $id )->first();
        // $data = \App\Hapak::where('dupak_id', $id)->first();
        $dupak->no_pak = $request->get('no_pak');
        $dupak->update();
        return  back()->with('toast_success', 'Task set No PAK Successfully!');
        
    }

   
    
    public function cek_fail($id)
    {
        $id = Crypt::decrypt($id); 
        $dupak = \App\Dupak::where('id', $id )->first();
        $data = \App\BeritaAcara::where('dupak_id', $id)->first();
        $data->cek = 'FAIL';
        $data->update();
        return redirect()->route( 'dupaks_penilai.rekap')->with('toast_success', 'Task chek Successfully!');

    }

    public function cek_ok_3b($id)
    {
        $id = Crypt::decrypt($id); 
        $dupak = \App\Dupak::where('id', $id )->first();
        $data = \App\Hapak::where('dupak_id', $id)->first();
        $data->cek = 'OK';
        $data->update();
        return redirect()->route( 'dupaks_penilai.rekap')->with('toast_success', 'Task chek Successfully!');
        
    }

    public function no_hapak(Request $request,$id)
    {

        $id = Crypt::decrypt($id); 
        $data = \App\Hapak::where('dupak_id', $id)->first();
        $data->no_pak = $request->get('no_pak');
        $data->update();
        dd($data);
        return  back()->with('toast_success', 'Task set No PAK Successfully!');
        
    }
    
    public function cek_fail_3b($id)
    {
        $id = Crypt::decrypt($id); 
        $dupak = \App\Dupak::where('id', $id )->first();
        $data = \App\Hapak::where('dupak_id', $id)->first();
        $data->cek = 'FAIL';
        $data->update();
        return redirect()->route( 'dupaks_penilai.rekap')->with('toast_success', 'Task chek Successfully!');

    }

    public function merger_cpns(){
        $datas = DB::table('users')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('kepegawaians', 'kepegawaians.user_id', '=', 'users.id')
        ->select('*')
        ->whereIn('users.name', [
            "Adi Setiawan, S.Pd",
            "Agustoni Pujianto, S.Pd., M.Pd.",
            "Aini Fitriya Rahmawati, S.Pd",
            "Akbar Ginandar, S.Pd.",
            "Ali Budi Widodo, S.Pd",
            "Apriani Suyanti Veronika Tarigan, S.Pd",
            "Ari Setyawan, S.Pd",
            "Arifuddin Thalib, S.Pd",
            "Daberly, S.Pd",
            "Dahlia Habibi, S.Pd",
            "Darmawan Herwinanto, S.Pd",
            "Duwi Santo, S.Pd., Gr.",
            "Erickson Sinaga, S.Pd",
            "Hana Rifky Puspitasari, S.Pd",
            "Hariyanto, S.Pd.I",
            "Herlina Palinoan, S.Pd",
            "Iffah Nurfiati, S.Pd",
            "Imam Bashori, S.Pd",
            "Jerry Simon, S.Pd.",
            "Junaidy Alexander Sagala, S.Pd",
            "Juni Fernando Silalahi, S.Pd",
            "Lilik Budi Suryani,S.Pd.",
            "Lince Ului, S.Pd.K",
            "Maisyarah, S.Pd",
            "Marta Marampa' Pasinggi', S.Pd",
            "Mohamad Ari, S.Pd",
            "Niswanto, S.Pd",
            "Nopel Sem, S.Pd",
            "Nurwito, S.Pd",
            "Pangeran, S.Th",
            "Ramadhan Rema",
            "Respi Membunga, S.Pd.K",
            "REVI GUSWITA DEWI, S.Pd",
            "Ronaldi Pangadongan, S.Pd",
            "Rosadi, S.Pd",
            "Roshiana Maria Angelia Dewi Permata Gading, S.Pd",
            "Safriadi, S.Pd",
            "Septiasti, S.Pd.K",
            "Sri Minarti, S.Pd",
            "Sri Rahayu Rachman, S.S., S.Pd., Gr.",
            "Suwisser, S.Pd.",
            "Syafri bin Sakka, S.Pd",
            "Tri Afif Murtadlo, S.Pd",
            "Tri Lestari G, S.Pd",
            "Tri Saputro, S.Pd",
            "Viktornal",
            "Wahyu Rachmadayanti, S.Pd",
            "Wahyudi, S.Pd",
            "Yuliana , S.Pd",
        ])
        ->orderBy('users.name','asc')
        ->get();
        // dd($data);
        $pdfMerger = PDFMerger::init();

        foreach($datas as $key => $data) {
            if( file_exists(storage_path('app/public/' . $data->sk_cpns)) ){
                $pdfMerger->addPDF(( public_path('storage/'.$data->sk_cpns)  ), 'all');
            }
          }

        $pdfMerger->merge();
        $pdfMerger->save("CPNS.pdf", "download");

        // $pdfMerger->save("file_path.pdf");

    }


    public function merger_pns(){
        $datas = DB::table('users')
        ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
        ->join('kepegawaians', 'kepegawaians.user_id', '=', 'users.id')
        ->select('*')
        ->whereIn('users.name', [
            "Adi Setiawan, S.Pd",
            "Agustoni Pujianto, S.Pd., M.Pd.",
            "Aini Fitriya Rahmawati, S.Pd",
            "Akbar Ginandar, S.Pd.",
            "Ali Budi Widodo, S.Pd",
            "Apriani Suyanti Veronika Tarigan, S.Pd",
            "Ari Setyawan, S.Pd",
            "Arifuddin Thalib, S.Pd",
            "Daberly, S.Pd",
            "Dahlia Habibi, S.Pd",
            "Darmawan Herwinanto, S.Pd",
            "Duwi Santo, S.Pd., Gr.",
            "Erickson Sinaga, S.Pd",
            "Hana Rifky Puspitasari, S.Pd",
            "Hariyanto, S.Pd.I",
            "Herlina Palinoan, S.Pd",
            "Iffah Nurfiati, S.Pd",
            "Imam Bashori, S.Pd",
            "Jerry Simon, S.Pd.",
            "Junaidy Alexander Sagala, S.Pd",
            "Juni Fernando Silalahi, S.Pd",
            "Lilik Budi Suryani,S.Pd.",
            "Lince Ului, S.Pd.K",
            "Maisyarah, S.Pd",
            "Marta Marampa' Pasinggi', S.Pd",
            "Mohamad Ari, S.Pd",
            "Niswanto, S.Pd",
            "Nopel Sem, S.Pd",
            "Nurwito, S.Pd",
            "Pangeran, S.Th",
            "Ramadhan Rema",
            "Respi Membunga, S.Pd.K",
            "REVI GUSWITA DEWI, S.Pd",
            "Ronaldi Pangadongan, S.Pd",
            "Rosadi, S.Pd",
            "Roshiana Maria Angelia Dewi Permata Gading, S.Pd",
            "Safriadi, S.Pd",
            "Septiasti, S.Pd.K",
            "Sri Minarti, S.Pd",
            "Sri Rahayu Rachman, S.S., S.Pd., Gr.",
            "Suwisser, S.Pd.",
            "Syafri bin Sakka, S.Pd",
            "Tri Afif Murtadlo, S.Pd",
            "Tri Lestari G, S.Pd",
            "Tri Saputro, S.Pd",
            "Viktornal",
            "Wahyu Rachmadayanti, S.Pd",
            "Wahyudi, S.Pd",
            "Yuliana , S.Pd",
        ])
        ->orderBy('users.name','asc')
        ->get();
        // dd($data);
        $pdfMerger = PDFMerger::init();

        foreach($datas as $key => $data) {
            if( file_exists(storage_path('app/public/' . $data->sk_pangkat)) ){
                $pdfMerger->addPDF(( public_path('storage/'.$data->sk_pangkat)  ), 'all');
            }
          }

        $pdfMerger->merge();
        $pdfMerger->save("PNS.pdf", "download");

        // $pdfMerger->save("file_path.pdf");

    }

    public function merger_pak(){
        $datas = DB::table('users')
        ->join('dupaks', 'dupaks.user_id', '=', 'users.id')
        ->select('*')
        ->whereIn('users.name', [
            "Adi Setiawan, S.Pd",
            "Agustoni Pujianto, S.Pd., M.Pd.",
            "Aini Fitriya Rahmawati, S.Pd",
            "Akbar Ginandar, S.Pd.",
            "Ali Budi Widodo, S.Pd",
            "Apriani Suyanti Veronika Tarigan, S.Pd",
            "Ari Setyawan, S.Pd",
            "Arifuddin Thalib, S.Pd",
            "Daberly, S.Pd",
            "Dahlia Habibi, S.Pd",
            "Darmawan Herwinanto, S.Pd",
            "Duwi Santo, S.Pd., Gr.",
            "Erickson Sinaga, S.Pd",
            "Hana Rifky Puspitasari, S.Pd",
            "Hariyanto, S.Pd.I",
            "Herlina Palinoan, S.Pd",
            "Iffah Nurfiati, S.Pd",
            "Imam Bashori, S.Pd",
            "Jerry Simon, S.Pd.",
            "Junaidy Alexander Sagala, S.Pd",
            "Juni Fernando Silalahi, S.Pd",
            "Lilik Budi Suryani,S.Pd.",
            "Lince Ului, S.Pd.K",
            "Maisyarah, S.Pd",
            "Marta Marampa' Pasinggi', S.Pd",
            "Mohamad Ari, S.Pd",
            "Niswanto, S.Pd",
            "Nopel Sem, S.Pd",
            "Nurwito, S.Pd",
            "Pangeran, S.Th",
            "Ramadhan Rema",
            "Respi Membunga, S.Pd.K",
            "REVI GUSWITA DEWI, S.Pd",
            "Ronaldi Pangadongan, S.Pd",
            "Rosadi, S.Pd",
            "Roshiana Maria Angelia Dewi Permata Gading, S.Pd",
            "Safriadi, S.Pd",
            "Septiasti, S.Pd.K",
            "Sri Minarti, S.Pd",
            "Sri Rahayu Rachman, S.S., S.Pd., Gr.",
            "Suwisser, S.Pd.",
            "Syafri bin Sakka, S.Pd",
            "Tri Afif Murtadlo, S.Pd",
            "Tri Lestari G, S.Pd",
            "Tri Saputro, S.Pd",
            "Viktornal",
            "Wahyu Rachmadayanti, S.Pd",
            "Wahyudi, S.Pd",
            "Yuliana , S.Pd",
        ])
        ->orderBy('users.name','asc')
        ->get();
        // dd($datas);
        $pdfMerger = PDFMerger::init();

        foreach($datas as $key => $data) {
            if( file_exists(storage_path('app/public/' . $data->pak)) ){
                $pdfMerger->addPDF(( public_path('storage/'.$data->pak)  ), 'all');
            }
          }

        $pdfMerger->merge();
        $pdfMerger->save("PNS.pdf", "download");

        // $pdfMerger->save("file_path.pdf");

    }

    public function merger_skp(){
        $datas = DB::table('users')
        ->join('dupaks', 'dupaks.user_id', '=', 'users.id')
        ->select('*')
        ->whereIn('users.name', [
            "Adi Setiawan, S.Pd",
            "Agustoni Pujianto, S.Pd., M.Pd.",
            "Aini Fitriya Rahmawati, S.Pd",
            "Akbar Ginandar, S.Pd.",
            "Ali Budi Widodo, S.Pd",
            "Apriani Suyanti Veronika Tarigan, S.Pd",
            "Ari Setyawan, S.Pd",
            "Arifuddin Thalib, S.Pd",
            "Daberly, S.Pd",
            "Dahlia Habibi, S.Pd",
            "Darmawan Herwinanto, S.Pd",
            "Duwi Santo, S.Pd., Gr.",
            "Erickson Sinaga, S.Pd",
            "Hana Rifky Puspitasari, S.Pd",
            "Hariyanto, S.Pd.I",
            "Herlina Palinoan, S.Pd",
            "Iffah Nurfiati, S.Pd",
            "Imam Bashori, S.Pd",
            "Jerry Simon, S.Pd.",
            "Junaidy Alexander Sagala, S.Pd",
            "Juni Fernando Silalahi, S.Pd",
            "Lilik Budi Suryani,S.Pd.",
            "Lince Ului, S.Pd.K",
            "Maisyarah, S.Pd",
            "Marta Marampa' Pasinggi', S.Pd",
            "Mohamad Ari, S.Pd",
            "Niswanto, S.Pd",
            "Nopel Sem, S.Pd",
            "Nurwito, S.Pd",
            "Pangeran, S.Th",
            "Ramadhan Rema",
            "Respi Membunga, S.Pd.K",
            "REVI GUSWITA DEWI, S.Pd",
            "Ronaldi Pangadongan, S.Pd",
            "Rosadi, S.Pd",
            "Roshiana Maria Angelia Dewi Permata Gading, S.Pd",
            "Safriadi, S.Pd",
            "Septiasti, S.Pd.K",
            "Sri Minarti, S.Pd",
            "Sri Rahayu Rachman, S.S., S.Pd., Gr.",
            "Suwisser, S.Pd.",
            "Syafri bin Sakka, S.Pd",
            "Tri Afif Murtadlo, S.Pd",
            "Tri Lestari G, S.Pd",
            "Tri Saputro, S.Pd",
            "Viktornal",
            "Wahyu Rachmadayanti, S.Pd",
            "Wahyudi, S.Pd",
            "Yuliana , S.Pd",
        ])
        ->orderBy('users.name','asc')
        ->get();
        // dd($datas);
        $pdfMerger = PDFMerger::init();

        foreach($datas as $key => $data) {
            if( file_exists(storage_path('app/public/' . $data->skp)) ){
                $pdfMerger->addPDF(( public_path('storage/'.$data->skp)  ), 'all');
            }
          }

        $pdfMerger->merge();
        $pdfMerger->save("PNS.pdf", "download");

        // $pdfMerger->save("file_path.pdf");

    }

}
