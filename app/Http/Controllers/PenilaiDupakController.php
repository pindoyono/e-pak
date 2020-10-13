<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;

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
        $dupaks = \App\Dupak::where('status', 'submit' )->orderBy('id','asc')->get();
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
        $berita_acara = \App\BeritaAcara::orderBy('id','asc')->get();
        return view('dupaks_penilai.berita_acara', ['berita_acara' => $berita_acara,
                                                    'dupak' => $dupak,
                                                    'biodatas' => $biodatas,
                                                    'users' => $user,
                                                    'now' => $now,
                                                    'kepegawaians' => $kepegawaians,
                                                    'berkas' => $berkas,]
                                                );
    }
}
