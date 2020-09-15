<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Storage;
use Crypt;


class KepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepegawaians = \App\Kepegawaian::where('user_id',Auth::user()->id)->get();
        return view('kepegawaians.index', ['kepegawaians' => $kepegawaians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("kepegawaians.create");
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
        $validator = Validator::make($request->all(), [
            "nama" => "required",
            "berkas" => "required|mimes:pdf|max:2048"
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $kepegawaian = new \App\Kepegawaian;
        $kepegawaian->nama = $request->get('nama');
        $kepegawaian->user_id = Auth::user()->id;
        if($request->file('berkas')){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $kepegawaian->berkas = $file;
        } 

        $kepegawaian->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('kepegawaians.create')->with('toast_success', 'Task Created Successfully!');
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
        $kepegawaian = \App\Kepegawaian::findOrFail($id);
        return view('kepegawaians.edit',   ['kepegawaian' => $kepegawaian
                                    ]
                                );
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
            // "nama" => "required",
            "berkas" => "mimes:pdf|max:2048"
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $kepegawaian = \App\Kepegawaian::findOrFail($id);
        $kepegawaian->nama = $request->get('nama');

        if( !empty($request->file('berkas')) && $kepegawaian->berkas && file_exists(storage_path('app/public/' . $kepegawaian->berkas))){
            \Storage::delete('public/'.$kepegawaian->berkas);
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $kepegawaian->berkas = $file;
        }elseif(!empty($request->file('avatar'))){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            $kepegawaian->berkas = $file;
        }

        $kepegawaian->update();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('kepegawaians.index')->with('toast_success', 'Task Created Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepegawaian = \App\Kepegawaian::findOrFail($id);
        if($kepegawaian->berkas && file_exists(storage_path('app/public/' . $kepegawaian->berkas))){
            \Storage::delete('public/'.$kepegawaian->berkas);
        }
        $kepegawaian->delete();
        return redirect()->route('kepegawaians.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }
   
}
