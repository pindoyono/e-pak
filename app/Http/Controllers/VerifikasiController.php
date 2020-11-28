<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Auth;
use DB;
use User;
use Config;

use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Laravel\Facades\Telegram;

// Panggil SendMail yang telah dibuat
use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id = Crypt::decrypt($id);
        $verif = \App\Verifikasi::findOrFail($id);
        return view('verifikator.show',   ['verif' => $verif]);
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
        $id =  Crypt::decrypt($id);
        return view("verifikator.create" ,['dupak_id' => $id]);
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
        $id =  Crypt::decrypt($id);

        $validator = Validator::make($request->all(), [
            "pesan" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } 
        
        $dupak = \App\Dupak::findOrFail($id);
        $dupak->status = 'Perbaikan Data';
        $dupak->update();

        $user_id = $dupak->user_id;

        
        $verifikasi = new \App\Verifikasi;
        $verifikasi->pesan = $request->get('pesan');
        $verifikasi->user_id = $user_id;
        $verifikasi->status = 'baru';
        $verifikasi->save();


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
            . "Berkas Usulan Anda Masih ada beberapa kesalahan mohon untuk segera di perbaiki untuk lebih jelasnya silahkan tekan tombol perbaikan data dibawah  \n"
            . "Terimakasih Sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini \n";
            
            if(url('/') == 'http://localhost:8000'){

                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => 'http://e-pak.smkn2malinau.sch.id' ]),
                    Keyboard::inlineButton(['text' => 'Perbaikan Data', 'url' => 'http://e-pak.smkn2malinau.sch.id' ])
                );
            }else{
                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => route('sarans.create') ]),
                    Keyboard::inlineButton(['text' => 'Perbaiakan data', 'url' => route('verifikasi.show',Crypt::encrypt($verifikasi->id)) ])
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
                    'body' => 'Berkas Usulan Anda Masih ada beberapa kesalahan mohon untuk segera di perbaiki untuk lebih jelasnya silahkan tekan tombol perbaikan data dibawah',
                    'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                    'saran' => 'Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini ',
                    'tombol' => "http:/e-pakgurukaltara.com/sarans/create",
                    'list_notif' => 'Berkas Anda Perlu beberapa perbaikan',
                    'text_action' => 'Perbaikan Data',
                    'link1' => route('verifikasi.show',Crypt::encrypt($verifikasi->id)),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));
        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Pesan Perbaikan Telah Tersampaikan');
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
        var_dump($id);
        exit;

        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::findOrFail($id);
        $dupak->status = 'Terverifikasi';
        $dupak->update();

        $user_id = $dupak->user_id;

        
        $verifikasi = new \App\Verifikasi;
        $verifikasi->pesan = 'Usulan Anda Lengkap Dan Terverifikasi';
        $verifikasi->user_id = $user_id;
        $verifikasi->status = 'baru';
        $verifikasi->save();
        
        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Berhasil Verifikasi');
    }

    public function verified($id)
    {
        //
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::findOrFail($id);
        $dupak->status = 'Terverifikasi';
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
            . "Berkas Usulan Anda Sudah Kami Verifikasi.. selanjutnya akan di Di Nilai oleh tim Penilai Pak.  \n"
            . "Terimakasih Sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini \n";
            
            if(url('/') == 'http://localhost:8000'){

                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => 'http://e-pak.smkn2malinau.sch.id' ]),
                    Keyboard::inlineButton(['text' => 'Lihat Dupak', 'url' => 'http://e-pak.smkn2malinau.sch.id' ])
                );
            }else{
                $keyboard = Keyboard::make()
                ->inline()
                ->row(
                    Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => route('sarans.create') ]),
                    Keyboard::inlineButton(['text' => 'Lihat Dupak', 'url' => route('dupaks.index') ])
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
                    'body' => 'Berkas Usulan Anda Sudah Kami Verifikasi.. selanjutnya akan di Di Nilai oleh tim Penilai Pak. ',
                    'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                    'saran' => 'Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini ',
                    'tombol' => "http:/e-pak.smkn2malinau.sch.id/sarans/create",
                    'list_notif' => 'Usulan Anda Lengkap dan Telah Terverifikasi',
                    'text_action' => 'List Dupak',
                    'link1' => route('dupaks.index'),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));


        
        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Berhasil Verifikasi');
    }

    public function baca($id)
    {
        $id = Crypt::decrypt($id);
        $notification = auth()->user()->notifications()->find($id);
        if($notification) {
        $notification->markAsRead();
        }
        
        return redirect($notification->data['link1']);
    }

    public function email()
    {
      
    }
}
