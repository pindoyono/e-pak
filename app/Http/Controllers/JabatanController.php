<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jabatans = \App\Jabatan::orderBy('target','asc')->get();
        return view('jabatans.index', ['jabatans' => $jabatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view("jabatans.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // var_dump($request->get('avatar'));
        // exit;
        // $validation = \Validator::make($request->all(),[
        //     "name" => "required|min:5|max:100",
        //     "username" => "required|min:5|max:20|unique:users",
        //     "avatar" => "required",
        //     "email" => "required|email|unique:users",
        //     "password" => "required",
        //     "password_confirmation" => "required|same:password"
        //   ])->validate();

        $validator = Validator::make($request->all(), [
            "jabatan" => "required",
            "pangkat" => "required",
            "target" => "required|numeric", 
            "akk" => "required|numeric",
            "akpkbpd" => "required|numeric",
            "akpkbpiki" => "required|numeric",
            "akp" => "required|numeric"
        ]);
        	
        					


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $jabatan = new \App\Jabatan;
        $jabatan->jabatan = $request->get('jabatan');
        $jabatan->pangkat = $request->get('pangkat');
        $jabatan->target = $request->get('target');
        $jabatan->akk = $request->get('akk');
        $jabatan->akpkbpd = $request->get('akpkbpd');
        $jabatan->akpkbpiki = $request->get('akpkbpiki');
        $jabatan->akp = $request->get('akp');
        $jabatan->save();

        return redirect()->route('jabatans.create')->with('toast_success', 'Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $jabatans = \App\Jabatan::findOrFail($id);

        return view('jabatans.edit',   ['jabatans' => $jabatans
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
         //
         $validator = Validator::make($request->all(), [
            "jabatan" => "required",
            "pangkat" => "required",
            "target" => "required|numeric", 
            "akk" => "required|numeric",
            "akpkbpd" => "required|numeric",
            "akpkbpiki" => "required|numeric",
            "akp" => "required|numeric"
        ]);
        	
        					


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // return $request;
        $jabatan = \App\Jabatan::findOrFail($id);
        $jabatan->jabatan = $request->get('jabatan');
        $jabatan->pangkat = $request->get('pangkat');
        $jabatan->target = $request->get('target');
        $jabatan->akk = $request->get('akk');
        $jabatan->akpkbpd = $request->get('akpkbpd');
        $jabatan->akpkbpiki = $request->get('akpkbpiki');
        $jabatan->akp = $request->get('akp');
        $jabatan->update();

        return redirect()->route('jabatans.index')->with('toast_success', 'Task Created Successfully!');
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
        $jabatan = \App\Jabatan::findOrFail($id);
        $jabatan->delete();
        return redirect()->route('jabatans.index')->with('toast_success', 'Task Delete Successfully!');


    }
}
