<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Storage;
use Crypt;
use DB;


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
        $jumlah = \App\Kepegawaian::where('user_id',Auth::user()->id)->count();
        
        return view('kepegawaians.index', ['kepegawaians' => $kepegawaians, 'jumlah' => $jumlah, ]);
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
            "sk_cpns" => "required|mimes:pdf|max:2048",
            "sk_pangkat" => "required|mimes:pdf|max:2048",
            "sk_jafung" => "required|mimes:pdf|max:2048",
            "ijazah" => "required|mimes:pdf|max:2048",
            "karpeg" => "required|mimes:pdf|max:2048",
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $kepegawaian = new \App\Kepegawaian;
        $kepegawaian->sk_cpns = $request->get('sk_cpns');
        $kepegawaian->sk_pangkat = $request->get('sk_pangkat');
        $kepegawaian->sk_jafung = $request->get('sk_jafung');
        $kepegawaian->ijazah = $request->get('ijazah');
        $kepegawaian->karpeg = $request->get('karpeg');

        $kepegawaian->user_id = Auth::user()->id;
        if($request->file('sk_cpns')){
            $file = $request->file('sk_cpns')->store('kepegawaian/'.Auth::user()->nip, 'public');
            $kepegawaian->sk_cpns = $file;
        } 
        if($request->file('sk_pangkat')){
            $file = $request->file('sk_pangkat')->store('kepegawaian/'.Auth::user()->nip, 'public');
            $kepegawaian->sk_pangkat = $file;
        } 
        if($request->file('sk_jafung')){
            $file = $request->file('sk_jafung')->store('kepegawaian/'.Auth::user()->nip, 'public');
            $kepegawaian->sk_jafung = $file;
        }  
        if($request->file('ijazah')){
            $file = $request->file('ijazah')->store('kepegawaian/'.Auth::user()->nip, 'public');
            $kepegawaian->ijazah = $file;
        }
        if($request->file('karpeg')){
            $file = $request->file('karpeg')->store('kepegawaian/'.Auth::user()->nip, 'public');
            $kepegawaian->karpeg = $file;
        } 



        $kepegawaian->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('kepegawaians.index')->with('toast_success', 'Task Created Successfully!');
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
        $kolom =  Crypt::decrypt($id);
        $kepegawaian = \App\Kepegawaian::where('user_id', Auth::id() )->first();
        return view('kepegawaians.edit',   ['kepegawaian' => $kepegawaian, 'kolom' => $kolom,
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

        $kepegawaian = \App\Kepegawaian::where('user_id', Auth::id() )->first();


        if( !empty($request->file('berkas')) && file_exists(storage_path('app/public/' . $kepegawaian->berkas))){
            \Storage::delete('public/'.$kepegawaian->berkas);
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            DB::table('kepegawaians')->where('user_id', Auth::id() )->update([ $id => $file ]); 
        }elseif(!empty($request->file('berkas'))){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            DB::table('kepegawaians')->where('user_id', Auth::id() )->update([ $id => $file ]); 
        }

          

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
