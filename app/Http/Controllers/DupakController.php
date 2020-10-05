<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Auth;

class DupakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $jabatans = \App\Dupak::orderBy('id','asc')->get();
        $dupaks = \App\Dupak::orderBy('id','asc')->get();
        return view('dupaks.index', ['dupaks' => $dupaks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("dupaks.create");
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
            "awal" => "required",
            "akhir" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $dupak = new \App\Dupak;
        $dupak->awal = date('y-m-d',strtotime($request->get('awal')));
        $dupak->akhir = date('y-m-d',strtotime($request->get('akhir')));
        $dupak->user_id = Auth::user()->id;
        $dupak->status =  "Usulan Baru";


        $dupak->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('dupaks.index')->with('toast_success', 'Task Created Successfully!');
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
        $dupaks = \App\Dupak::findOrFail($id);
        return view('dupaks.edit',   ['dupaks' => $dupaks]);
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
        
        $id =  Crypt::decrypt($id);
        //
         //
         $validator = Validator::make($request->all(), [
            "awal" => "required",
            "akhir" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $dupak = \App\Dupak::findOrFail($id);
        $dupak->awal = date('y-m-d',strtotime($request->get('awal')));
        $dupak->akhir = date('y-m-d',strtotime($request->get('akhir')));
        // $dupak->status =  "Usulan Baru";


        $dupak->update();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('dupaks.index')->with('toast_success', 'Task Update Successfully!');
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
         //
         $id =  Crypt::decrypt($id);
         $dupak = \App\Dupak::findOrFail($id);
         $dupak->delete();
         return redirect()->route('dupaks.index')->with('success', 'Data Usulan Berhasil Di Hapus');
    }
}
