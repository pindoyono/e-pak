<?php

namespace App\Http\Controllers;

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
        // //
        // echo  setup('group_id');
        // exit;
        // $activity = Telegram::getUpdates();
        // dd($activity);
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

        $text = "A new contact us query\n"
            . "<b>Email Address: </b>\n"
            . "Patan Pindoyono\n"
            . "<b>Message: </b>\n"
            . 'test Bot';
 

            Telegram::sendMessage([
                'chat_id' => $telegram_id ,
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

                
    }

    public function email()
    {
       

        $user = \App\User::find(2);
        $details = [
                'from' => 'epakgurumalinau@gmail.com',
                'greeting' => 'Hi, '.$user->name,
                'body' => 'Berkas Usulan Anda Sudah di Periksa dan dinilai oleh tim Penilai',
                'thanks' => 'Terimakasih Sudah menggunakan Aplikasi E-Pak Guru',
                'list_notif' => 'Usulan Anda Lengkap dan Telah Terverifikasi',
                'link' => route('dupaks_penilai.index'),
                'subject' => 'Info E-pak Guru',
                'salutation' => 'Hormat Kami',
                'telegram_id' => env('TELEGRAM_CHANNEL_ID'),
                
        ];

        $user->notify(new \App\Notifications\TaskDupakComplete($details));

        $text = "A new contact us query\n"
            . "<b>Email Address: </b>\n"
            . "Patan Pindoyono\n"
            . "<b>Message: </b>\n"
            . 'test Bot';
 
        Telegram::sendMessage([
            'chat_id' => $user->chat_id,
            'parse_mode' => 'HTML',
            'text' => $text
        ]);

        return redirect()->route('dupaks_penilai.index')->with('toast_success', 'Email telah dikirim');
    }
}
