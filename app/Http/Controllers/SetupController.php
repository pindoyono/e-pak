<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        //
        $setups = \App\Setup::orderBy('id','DESC')->get();
        return view('setups.index', ['setups' => $setups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("setups.create");
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
        $setup = new \App\Setup;
        $setup->deadline_guru = date('y-m-d',strtotime($request->get('deadline_guru')));
        $setup->deadline_verifikator = date('y-m-d',strtotime($request->get('deadline_verifikator')));
        $setup->deadline_penilai = date('y-m-d',strtotime($request->get('deadline_penilai')));
        $setup->group_id = $request->get('group_id');

        $setup->save();

        return redirect()->route('setups.index')->with('toast_success', 'Task Created Successfully!');
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
        $setups = \App\Setup::findOrFail($id);
        return view('setups.edit',   ['setup' => $setups]);

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

        $setup = \App\Setup::findOrFail($id);
        $setup->deadline_guru = date('y-m-d',strtotime($request->get('deadline_guru')));
        $setup->deadline_verifikator = date('y-m-d',strtotime($request->get('deadline_verifikator')));
        $setup->deadline_penilai = date('y-m-d',strtotime($request->get('deadline_penilai')));
        $setup->group_id = $request->get('group_id');

        $setup->update();

        return redirect()->route('setups.index')->with('toast_success', 'Task Created Successfully!');
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
}
