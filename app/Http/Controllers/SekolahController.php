<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class SekolahController extends Controller
{
    function __construct()
    {
         $this->middleware('role:super admin');
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $sekolah = \App\Sekolah::orderBy('id','DESC')->get();
        return view('sekolahs.index', ['sekolahs' => $sekolah]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view("sekolahs.create");
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
        // var_dump($request->all());
        // exit;

        $validator = Validator::make($request->all(), [
            "npsn" => "required|min:8|unique:sekolahs|numeric",
            "nama" => "required|unique:sekolahs",
            "alamat" => "required",
            "jenis" => "required",
            "status" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $sekolah = new \App\Sekolah;
        $sekolah->npsn = $request->get('npsn');
        $sekolah->nama = $request->get('nama');
        $sekolah->alamat = $request->get('alamat');
        $sekolah->jenis = $request->get('jenis');
        $sekolah->status = $request->get('status');


        $sekolah->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('sekolahs.create')->with('toast_success', 'Task Created Successfully!');
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
        $sekolahs = \App\Sekolah::findOrFail($id);
        return view('sekolahs.edit',   ['sekolah' => $sekolahs]);
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
        // var_dump($request->all());
        // exit;

        $validator = Validator::make($request->all(), [
            "npsn" => "required|min:8|numeric",
            "nama" => "required",
            "alamat" => "required",
            "jenis" => "required",
            "status" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } 


        // return $request;
        $sekolah = \App\Sekolah::findOrFail($id);
        $sekolah->npsn = $request->get('npsn');
        $sekolah->nama = $request->get('nama');
        $sekolah->alamat = $request->get('alamat');
        $sekolah->jenis = $request->get('jenis');
        $sekolah->status = $request->get('status');


        $sekolah->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('sekolahs.index')->with('toast_success', 'Task Edited Successfully!');
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
        $sekolah = \App\Sekolah::findOrFail($id);
        $sekolah->delete();
        return redirect()->route('sekolahs.index')->with('success', 'Data Sekolah Berhasil Di Hapus');
    }
}
