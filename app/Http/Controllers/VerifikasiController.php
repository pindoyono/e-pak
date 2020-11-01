<?php

namespace App\Http\Controllers;
use Telegram\Bot\Keyboard\Keyboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Auth;
use DB;
use User;
use Config;

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



        // return redirect()->route('users.create')->with('status', 'User successfully created');
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

        $user_id = $dupak->user_id;

        
        $verifikasi = new \App\Verifikasi;
        $verifikasi->pesan = 'Usulan Anda Lengkap Dan Terverifikasi';
        $verifikasi->user_id = $user_id;
        $verifikasi->link = route('dupaks.index' );
        $verifikasi->status = 'baru';
        $verifikasi->save();
        
        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Berhasil Verifikasi');
    }

    public function baca($id)
    {

        $user = \App\User::find($id)->chat_id_verified;
        $group_id = \App\Setup::first()->group_id;
        $telegram_id = $group_id;

        echo $user;
        echo "<br>";
        echo $telegram_id;
        if($user!=""){
            $telegram_id = $user;
        }
        echo $telegram_id;
        
        $users = \App\User::find($id);

        $text = "Halo, ".$users->name."\n"
            . "Berkas Usulan Anda Sudah Kami Terima.. selanjutnya akan di veifikasi oleh tim verifikator. \n"
            . "Terimakasih Sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini \n";
            
            $keyboard = Keyboard::make()
            ->inline()
            ->row(
                Keyboard::inlineButton(['text' => 'Saran Dan Masukan', 'url' => route('sarans.create') ]),
                // Keyboard::inlineButton(['text' => 'Btn 2', 'callback_data' => 'data_from_btn2'])
            );

            Telegram::sendMessage([
                'chat_id' => $telegram_id ,
                'parse_mode' => 'HTML',
                'reply_markup' => $keyboard,
                'text' => $text,
            ]);

            
            $details = [
                    'from' => 'epakgurumalinau@gmail.com',
                    'greeting' => 'Halo, '.$users->name,
                    'body' => 'Berkas Usulan Anda Sudah Kami Terima.. selanjutnya akan di veifikasi oleh tim verifikator. ',
                    'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                    'saran' => 'Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini ',
                    'list_notif' => 'Usulan Anda Lengkap dan Telah Terverifikasi',
                    'link' => route('sarans.create'),
                    'subject' => 'Info E-pak Guru',
                    'salutation' => 'Hormat Kami',
                    'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                    
            ];
    
            $users->notify(new \App\Notifications\TaskDupakComplete($details));
            return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Email telah dikirim');

                
    }

    public function email()
    {
       

        $user = \App\User::find(2);
        $details = [
                'from' => 'epakgurumalinau@gmail.com',
                'greeting' => 'Halo, '.$user->name,
                'body' => 'Berkas Usulan Anda Sudah Kami Terima.. selanjutnya akan di veifikasi oleh tim verifikator. ',
                'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru <br>
                            Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini',
                'list_notif' => 'Usulan Anda Lengkap dan Telah Terverifikasi',
                'link' => route('sarans.create'),
                'subject' => 'Info E-pak Guru',
                'salutation' => 'Hormat Kami',
                'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                
        ];

        $user->notify(new \App\Notifications\TaskDupakComplete($details));

        $text = "Halo, ".$user->name."\n"
            . "Berkas Usulan Anda Sudah Kami Terima.. selanjutnya akan di veifikasi oleh tim verifikator. \n"
            . "Terimakasih Sudah menggunakan Aplikasi E-Pak Guru\n"
            . "Jika ada Saran dan Masukan Untuk Pengembang Aplikasi Ini.. silahkan klik link berikut ini \n"
            . "<a href='".route('sarans.create')."'> Saran dan Masukan </a> \n"
            . '';
 
        Telegram::sendMessage([
            'chat_id' => $user->chat_id,
            'parse_mode' => 'HTML',
            'text' => $text,
            $keyboard = array(
                "inline_keyboard" => array(array(array(
                "text" => "Saran dan Masukan",
                "url" => route('sarans.create')
                )))
                ),
        ]);

        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Email telah dikirim');
    }
}
