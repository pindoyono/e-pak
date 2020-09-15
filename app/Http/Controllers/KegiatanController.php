<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

use App\Exports\KegiatansExport;
use App\Imports\KegiatansImport;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kegiatans = \App\Kegiatan::orderBy('kode','asc')->get();
        return view('kegiatans.index', ['kegiatans' => $kegiatans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('kegiatans.create');
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
            "unsur" => "required",
            "sub_unsur" => "required",
            "kegiatan" => "required", 
            "kode" => "required",
            "satuan_hasil" => "required",
            "angka_kredit" => "required",
            "pelaksana" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

         // return $request;
         $kegiatan = new \App\Kegiatan;
         $kegiatan->unsur = $request->get('unsur');
         $kegiatan->sub_unsur = $request->get('sub_unsur');
         $kegiatan->kegiatan = $request->get('kegiatan');
         $kegiatan->kode = $request->get('kode');
         $kegiatan->satuan_hasil = $request->get('satuan_hasil');
         $kegiatan->angka_kredit = $request->get('angka_kredit');
         $kegiatan->pelaksana = $request->get('pelaksana');
         $kegiatan->save();
 
         return redirect()->route('kegiatans.create')->with('toast_success', 'Task Created Successfully!');

        	
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
        $kegiatans = \App\Kegiatan::findOrFail($id);

        return view('kegiatans.edit',   ['kegiatans' => $kegiatans
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
            "unsur" => "required",
            "sub_unsur" => "required",
            "kegiatan" => "required", 
            "kode" => "required",
            "satuan_hasil" => "required",
            "angka_kredit" => "required",
            "pelaksana" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

         // return $request;
         $kegiatan = \App\Kegiatan::findOrFail($id);
         $kegiatan->unsur = $request->get('unsur');
         $kegiatan->sub_unsur = $request->get('sub_unsur');
         $kegiatan->kegiatan = $request->get('kegiatan');
         $kegiatan->kode = $request->get('kode');
         $kegiatan->satuan_hasil = $request->get('satuan_hasil');
         $kegiatan->angka_kredit = $request->get('angka_kredit');
         $kegiatan->pelaksana = $request->get('pelaksana');
         $kegiatan->update();
 
         return redirect()->route('kegiatans.index')->with('toast_success', 'Task Created Successfully!');
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

    public function importExportView()
    {
       return view('kegiatans.import');
    }
   
    public function export() 
    {
        return Excel::download(new KegiatansExport, 'users.xlsx');
    }
   
    public function import(Request $request) 
    {
        $file = $request->file('file')->store('import');
        $import = new KegiatansImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
