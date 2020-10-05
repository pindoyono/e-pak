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
        return view("berkas.create",   ['dupaks' => $dupaks]);
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
    public function edit($dupak_id)
    {
        //
        $dupak_id =  Crypt::decrypt($dupak_id);
        $dupaks = \App\Dupak::findOrFail($dupak_id);
        return view("berkas.create",   ['dupaks' => $dupaks]);
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

    public function upload($dupak_id)
    {
        //
        $dupak_id =  Crypt::decrypt($dupak_id);
        $dupaks = \App\Dupak::findOrFail($dupak_id);
        return view("berkas.create",   ['dupaks' => $dupaks]);
    }
}
