<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use App\Exports\MapelExport;
use App\Imports\MapelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
        $mapel = \App\Mapel::orderBy('id','DESC')->get();
        return view('mapels.index', ['mapels' => $mapel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("mapels.create");
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
            "nama" => "required|unique:sekolahs",
            "jenis" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $mapel = new \App\Mapel;
        $mapel->nama = $request->get('nama');
        $mapel->keterangan = $request->get('keterangan');
        $mapel->jenis = $request->get('jenis');


        $mapel->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('mapels.create')->with('toast_success', 'Task Created Successfully!');
 
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
        $mapels = \App\Mapel::findOrFail($id);
        return view('mapels.edit',   ['mapel' => $mapels]);
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
            "nama" => "required|unique:sekolahs",
            "jenis" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $mapel = \App\Mapel::findOrFail($id);
        $mapel->nama = $request->get('nama');
        $mapel->jenis = $request->get('jenis');
        $mapel->keterangan = $request->get('keterangan');


        $mapel->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('mapels.index')->with('toast_success', 'Task Created Successfully!');
 
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
        $mapel = \App\Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('mapels.index')->with('success', 'Data Sekolah Berhasil Di Hapus');
    }

    public function export() 
    {
        return Excel::download(new MapelExport, 'mapels.xlsx');
    }
    
    public function import(Request $request) 
    {
          $validator = Validator::make($request->all(), [
            "file" => "required",
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $file = $request->file('file')->store('import');

        $import = new MapelImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
