<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;
use App\Exports\LampiransExport;
use App\Imports\LampiransImport;
use Maatwebsite\Excel\Facades\Excel;


class LampiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Lampiran::orderBy('jenis','asc')->get();
        return view('lampirans.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("lampirans.create");
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
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required", 
            "saran" => "required"
        ]);
        	
        					


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $lampiran = new \App\Lampiran;
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->save();

        return redirect()->route('lampirans.create')->with('toast_success', 'Task Created Successfully!');
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
        $data = \App\Lampiran::findOrFail($id);

        return view('lampirans.edit',   ['data' => $data
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
        $validator = Validator::make($request->all(), [
            "jenis" => "required",
            "kode" => "required",
            "diskripsi" => "required", 
            "saran" => "required"
        ]);
        	
        					


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $lampiran =  \App\Lampiran::findOrFail($id);
        $lampiran->jenis = $request->get('jenis');
        $lampiran->kode = $request->get('kode');
        $lampiran->diskripsi = $request->get('diskripsi');
        $lampiran->saran = $request->get('saran');
        $lampiran->Update();

        return redirect()->route('lampirans.index')->with('toast_success', 'Task Created Successfully!');
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
        $data = \App\Lampiran::findOrFail($id);
        $data->delete();
        return redirect()->route('lampirans.index')->with('toast_success', 'Task Delete Successfully!');

    }

    public function export() 
    {
        return Excel::download(new LampiransExport, 'lampirans.xlsx');
    }

    public function import(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            "file" => "required",
        ]);
        	
        					


        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }
        Excel::import(new LampiransImport,request()->file('file'));
           
        return back();
    }
}
