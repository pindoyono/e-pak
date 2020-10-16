<?php
// Usulan Baru
// submit
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Auth;
use DB;

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
        $dupaks = \App\Dupak::where('user_id', Auth::user()->id )->orderBy('id','asc')->get();
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
            "surat_pengantar" => "required|mimes:pdf|max:2048",
            "dupak" => "required|mimes:pdf|max:10048",
            "surat_pernyataan1" => "required|mimes:pdf|max:2048",
            "surat_pernyataan2" => "required|mimes:pdf|max:2048",
            "surat_pernyataan3" => "required|mimes:pdf|max:2048",
            "pembagian_tugas" => "required|mimes:pdf|max:10048",
            "pak" => "required|mimes:pdf|max:2048",
            "pkg" => "required|mimes:pdf|max:2048",
            "skp" => "required|mimes:pdf|max:2048",
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $dupak = new \App\Dupak;
        $dupak->awal =  date('y-m-d',strtotime($request->get('awal')));
        $dupak->akhir =  date('y-m-d',strtotime($request->get('akhir')));
        $dupak->surat_pengantar = $request->get('surat_pengantar');
        $dupak->dupak = $request->get('dupak');
        $dupak->surat_pernyataan1 = $request->get('surat_pernyataan1');
        $dupak->surat_pernyataan2 = $request->get('surat_pernyataan2');
        $dupak->surat_pernyataan3 = $request->get('surat_pernyataan3');
        $dupak->pembagian_tugas = $request->get('pembagian_tugas');
        $dupak->pak = $request->get('pak');
        $dupak->pkg = $request->get('pkg');
        $dupak->status = "Usulan Baru";

        $dupak->user_id = Auth::user()->id;

        if($request->file('surat_pengantar')){
            $file = $request->file('surat_pengantar')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->surat_pengantar = $file;
        } 
        if($request->file('skp')){
            $file = $request->file('skp')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->skp = $file;
        } 
        if($request->file('dupak')){
            $file = $request->file('dupak')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->dupak = $file;
        } 
        if($request->file('surat_pernyataan1')){
            $file = $request->file('surat_pernyataan1')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->surat_pernyataan1 = $file;
        }  
        if($request->file('surat_pernyataan2')){
            $file = $request->file('surat_pernyataan2')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->surat_pernyataan2 = $file;
        }
        if($request->file('surat_pernyataan3')){
            $file = $request->file('surat_pernyataan3')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->surat_pernyataan3 = $file;
        } 
        if($request->file('pembagian_tugas')){
            $file = $request->file('pembagian_tugas')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->pembagian_tugas = $file;
        } 
        if($request->file('pembagian_tugas')){
            $file = $request->file('pembagian_tugas')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->pembagian_tugas = $file;
        } 
        if($request->file('pak')){
            $file = $request->file('pak')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->pak = $file;
        }   
        if($request->file('pkg')){
            $file = $request->file('pkg')->store('dupak/'.Auth::user()->nip, 'public');
            $dupak->pkg = $file;
        } 


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

   

    public function ubah($id,$name){

        $kolom =  Crypt::decrypt($name);
        $id =  Crypt::decrypt($id);

        $dupak = \App\Dupak::where('id', $id )->first();
        return view('dupaks.ubah',   ['dupaks' => $dupak, 'kolom' => $kolom,
                                    ]
                                );

    }


    
    public function detail($id){
        
        $id =  Crypt::decrypt($id);
        $dupak = \App\Dupak::where('id', $id )->first();
        $berkas = \App\Berkas::where('dupak_id', $id )->get();
        $user = \App\User::findOrFail(Auth::user()->id);
        $biodatas = \App\Biodata::where('user_id', Auth::user()->id)->first();
        $kepegawaians = \App\Kepegawaian::where('user_id',Auth::user()->id)->get();

        return view('dupaks.detail',   [    'dupak' => $dupak,
                                            'biodatas' => $biodatas,
                                            'users' => $user,
                                            'kepegawaians' => $kepegawaians,
                                            'berkas' => $berkas,
                                    ]
                                );

    }

    public function submit($id)
    {

        $id = Crypt::decrypt($id); 
        // var_dump($id);
        // exit;

        $dupak = \App\Dupak::where('id', $id )->first();
        $dupak->status = "submit";
        $dupak->update();

        return redirect()->route('dupaks.index')->with('success', 'Usulan Anda Telah Di Kirim');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_ubah(Request $request, $id)
    {

        $id = Crypt::decrypt($id); 
        $kolom = $request->get('kolom');

        $validator = Validator::make($request->all(), [
            // "nama" => "required",
            "berkas" => "mimes:pdf|max:2048"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $dupak = \App\Dupak::where('id', $id )->first();


        if( !empty($request->file('berkas')) && file_exists(storage_path('app/public/' . $dupak->berkas))){
            \Storage::delete('public/'.$dupak->berkas);
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            DB::table('dupaks')->where('id', $id )->update([ $kolom => $file ]); 
        }elseif(!empty($request->file('berkas'))){
            $file = $request->file('berkas')->store('berkas/'.Auth::user()->nip, 'public');
            DB::table('dupaks')->where('id', $id )->update([ $kolom => $file ]); 
        }

          

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        $dupaks = \App\Dupak::findOrFail($id);
        return view('dupaks.edit',   ['dupaks' => $dupaks])->with('toast_success', 'Task Created Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id =  Crypt::decrypt($id);

        $jumlah = \App\Berkas::where('dupak_id', $id )->count();;

        if($jumlah>0){
            return redirect()->route('dupaks.index')->with('success', 'Silahkan Hapus Semua Berkas Bukti Fisik yg Terkait Dengan Usulan ini terlebih Dahulu');
        }

        $dupak = \App\Dupak::findOrFail($id);
        if($dupak->surat_pengantar && file_exists(storage_path('app/public/' . $dupak->surat_pengantar))){
            \Storage::delete('public/'.$dupak->surat_pengantar);
        }
        if($dupak->dupak && file_exists(storage_path('app/public/' . $dupak->dupak))){
            \Storage::delete('public/'.$dupak->dupak);
        }
        if($dupak->surat_pernyataan1 && file_exists(storage_path('app/public/' . $dupak->surat_pernyataan1))){
            \Storage::delete('public/'.$dupak->surat_pernyataan1);
        }
        if($dupak->surat_pernyataan2 && file_exists(storage_path('app/public/' . $dupak->surat_pernyataan2))){
            \Storage::delete('public/'.$dupak->surat_pernyataan2);
        }
        if($dupak->surat_pernyataan3 && file_exists(storage_path('app/public/' . $dupak->surat_pernyataan3))){
            \Storage::delete('public/'.$dupak->surat_pernyataan3);
        }
        if($dupak->pembagian_tugas && file_exists(storage_path('app/public/' . $dupak->pembagian_tugas))){
            \Storage::delete('public/'.$dupak->pembagian_tugas);
        }
        if($dupak->pak && file_exists(storage_path('app/public/' . $dupak->pak))){
            \Storage::delete('public/'.$dupak->pak);
        }
        if($dupak->pkg && file_exists(storage_path('app/public/' . $dupak->pkg))){
            \Storage::delete('public/'.$dupak->pkg);
        }

         $dupak->delete();
         return redirect()->route('dupaks.index')->with('success', 'Data Usulan Berhasil Di Hapus');
    }
}