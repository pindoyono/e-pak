<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;

class BiodataController extends Controller
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

    public function create_biodata(Request $request, $id)
    {
        //

        $id = Crypt::decrypt($id);

        $jabatans = \App\Jabatan::orderBy('target','asc')->get();
        $biodatas = \App\Biodata::where('user_id',$id)->get();
        $sekolah = \App\Sekolah::all();

        // $biodatas = \App\Biodata::findOrFail($id);
        if(count($biodatas)==0){
            $biodatas = (object) array(
                'jenis_kelamin' => '',
                'tempat_lahir' => '',
                'tanggal_lahir' => '',
                'alamat' => '',
                'agama' => '',
                'nuptk' => '',
                'no_sk_cpns' => '',
                'tmt_cpns' => '',
                'tmt_pns' => '',
                'pangkat_golongan' => '',
                'kartu_pegawai' => '',
                'karsu' => '',
                'no_hp' => '',
                'jenis_guru' => '',
                'tugas_tambahan' => '',
                'pendidikan' => '',
                'sekolah_id' => '',
            );
            return view('biodatas.create_or_update',['jabatans' => $jabatans,
                                                    'biodatas' => json_decode(json_encode($biodatas)), 
                                                    'sekolahs' => $sekolah, 
                                                ]);
        }else{
            $biodata_id = \App\Biodata::where('user_id',$id)->get();
                return view('biodatas.create_or_update',['jabatans' => $jabatans,
                                                'biodatas' => $biodata_id[0],
                                                'sekolahs' => $sekolah, 
                                                ]);

            
        }
        
    }

    public function create_or_update(Request $request, $id)
    {
        $id =  Crypt::decrypt($id);
        
        // $data = 
        //
          $biodata = \App\Biodata::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'user_id'   => $id,
        ],[
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'tanggal_lahir' => date('y-m-d',strtotime($request->get('tanggal_lahir'))),
            'alamat' => $request->get('alamat'),
            'agama' => $request->get('agama'),
            'nuptk' => $request->get('nuptk'),
            'no_sk_cpns' => $request->get('no_sk_cpns'),
            'tmt_cpns' => date('y-m-d',strtotime($request->get('tmt_cpns'))),
            'tmt_pns' => date('y-m-d',strtotime($request->get('tmt_pns'))),
            'pangkat_golongan' => $request->get('pangkat_golongan'),
            'kartu_pegawai' => $request->get('kartu_pegawai'),
            'karsu' => $request->get('karsu'),
            'user_id'   => $id,
            'no_hp' => $request->get('no_hp'),
            'jenis_guru' => $request->get('jenis_guru'),
            'tugas_tambahan' => $request->get('tugas_tambahan'),
            'pendidikan' => $request->get('pendidikan'),
            'sekolah_id' => $request->get('sekolah_id'),
        ]);

 

        $jabatans = \App\Jabatan::orderBy('target','asc')->get();
        $biodatas = \App\Biodata::orderBy('id','asc')->get();
        // $biodatas = \App\Biodata::findOrFail($id);
        if(!empty($biodatas)){
            $biodatas = (object) array(
                'jenis_kelamin' => '',
                'tempat_lahir' => '',
                'tanggal_lahir' => '',
                'alamat' => '',
                'agama' => '',
                'nuptk' => '',
                'no_sk_cpns' => '',
                'tmt_cpns' => '',
                'tmt_pns' => '',
                'pangkat_golongan' => '',
                'kartu_pegawai' => '',
                'karsu' => '',
                'no_hp' => '',
                'jenis_guru' => '',
                'tugas_tambahan' => '',
                'pendidikan' => '',
                'sekolah_id' => '',
            );

            // return view('biodatas.create_or_update',['jabatans' => $jabatans,
            //                                         'biodatas' => json_decode(json_encode($biodatas)), 
            //                                     ]);
                $id = Crypt::encrypt($id);
                return redirect()->route('biodatas.create_biodata',$id)->with('toast_success', 'Task Update Successfully!');
            
            }else{
                $id = Crypt::encrypt($id);
                $biodata_id = \App\Biodata::where('user_id',$id)->get();
                return redirect()->route('biodatas.create_biodata',$id)->with('toast_success', 'Task Update Successfully!');
                // return view('biodatas.create_or_update',['jabatans' => $jabatans,
                //                                     'biodatas' => $biodata_id[0]
                //                                     ]);
            }

    }
}
