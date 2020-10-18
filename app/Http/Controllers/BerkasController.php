<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Auth;


class BerkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $berkas = \App\Berkas::orderBy('id','asc')->get();
        $kegiatans = \App\Kegiatan::orderBy('id','asc')->get();

        return view('berkas.index', ['berkas' => $berkas, 'kegiatans' => $kegiatans]);
    }

    public function bukti($id)
    {
        //
        $id =  Crypt::decrypt($id);
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        return view('berkas.bukti',   ['berkas' => $berkas, 'dupak_id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($dupak_id)
    {
        //
        $dupak_id =  Crypt::decrypt($dupak_id);
        $dupaks = \App\Dupak::findOrFail($dupak_id);
        $kegiatans = \App\Kegiatan::orderBy('id','asc')->get();

        return view("berkas.create",   ['dupaks' => $dupaks, 'kegiatans' => $kegiatans]);
    }

    public function buat($id)
    {
        //
        $id =  Crypt::decrypt($id);
        $kegiatans = \App\Kegiatan::orderBy('id','asc')->get();

        return view("berkas.create",   ['dupak_id' => $id , 'kegiatans' => $kegiatans]);
    }

    public function simpan(Request $request, $id)
    {
        $id = Crypt::decrypt($id); 

        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "berkas" => "mimes:pdf|max:10048"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $berkas = new \App\Berkas;
        $berkas->nama = $request->get('nama');
        $berkas->dupak_id = $id;
        if($request->file('berkas')){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $berkas->berkas = $file;
        } 


        $berkas->save();
        

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('berkas.bukti', Crypt::encrypt($id) )->with('toast_success', 'Task Created Successfully!');
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
        $berkas = \App\Berkas::findOrFail($id);
        $kegiatans = \App\Kegiatan::orderBy('id','asc')->get();

        return view("berkas.edit",   ['berkas' => $berkas,'kegiatans' => $kegiatans]);
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
        $id = Crypt::decrypt($id); 

        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "berkas" => "mimes:pdf|max:10048"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $berkas = \App\Berkas::findOrFail($id);
        $berkas->nama = $request->get('nama');

        
        if( !empty($request->file('berkas')) && file_exists(storage_path('app/public/' . $berkas->berkas))){
            \Storage::delete('public/'.$berkas->berkas);
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $berkas->berkas = $file;
        }elseif(!empty($request->file('berkas'))){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $berkas->berkas = $file;
        }


        $berkas->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('berkas.bukti', Crypt::encrypt($berkas->dupak_id) )->with('toast_success', 'Task Created Successfully!');
   
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $id =  Crypt::decrypt($id);
        $berkas = \App\Berkas::findOrFail($id);
        if($berkas->berkas && file_exists(storage_path('app/public/' . $berkas->berkas))){
            \Storage::delete('public/'.$berkas->berkas);
        }
        $berkas->delete();
        return redirect()->route('berkas.bukti', Crypt::encrypt($berkas->dupak_id) )->with('success', 'Data Usulan Berhasil Di Hapus');
    }

    public function upload($dupak_id)
    {
        //
        $dupak_id =  Crypt::decrypt($dupak_id);
        $dupaks = \App\Dupak::findOrFail($dupak_id);
        return view("berkas.create",   ['dupaks' => $dupaks]);
    }
}
