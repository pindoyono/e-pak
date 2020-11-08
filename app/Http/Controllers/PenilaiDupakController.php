<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use PDF;
use DB; 
use Auth;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

class PenilaiDupakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $roles = $user->getRoleNames();
        if($roles == 'penilai'){
            $dupaks = DB::table('dupaks')
            ->join('users', 'users.id', '=', 'dupaks.user_id')
            ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
            ->where('dupaks.status','!=', 'Usulan Baru')
            ->where('dupaks.status','!=', 'Perbaikan Data')
            ->select('dupaks.*','sekolahs.nama' ,'users.name')
            ->get();
        }else{
            $dupaks = DB::table('dupaks')
            ->join('users', 'users.id', '=', 'dupaks.user_id')
            ->join('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->join('sekolahs', 'sekolahs.id', '=', 'biodatas.sekolah_id')
            ->select('dupaks.*','sekolahs.nama' ,'users.name')
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
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
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
        //
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
            . "Berkasi Usulan Anda Sudah di Nilai \n"
            . "Terimakasih Sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini \n";
            
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
                    'tombol' => "http:/e-pak.smkn2malinau.sch.id/sarans/create",
                    'list_notif' => 'Usulan Anda Sudah Dinilai oleh Tim Penilai',
                    'text_action' => 'List Dupak',
                    'link1' => route('dupaks.index'),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));

        $id = Crypt::encrypt($id);
        
        return redirect()->route('dupaks_penilai.berita_acara',$id)->with('toast_success', 'Task Created Successfully!');
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
        $pdf->setPaper('A4', 'potrait');
        return $pdf->stream('Berita Acara.pdf');
    }

}
