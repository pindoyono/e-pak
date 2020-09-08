<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
        // $users = \App\User::paginate(10);

        $users = \App\User::orderBy('id','DESC')->get();
        return view('users.index', ['users' => $users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        
        $roles = Role::all();
        return view("users.create", ['roles' => $roles]);
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
            "name" => "required|min:5|max:100",
            "nip" => "required|min:18|max:19|unique:users",
            "roles" => "required", 
            "email" => "required|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password",
            "avatar" => "required"
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        // return $request;
        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->nip = $request->get('nip');
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));
        $new_user->assignRole($request->get('roles'));

        if($request->file('avatar')){
            $file = $request->file('avatar')->store('avatars', 'public');
            $new_user->avatar = $file;
        } 

        $new_user->save();

        // return redirect()->route('users.create')->with('status', 'User successfully created');
        return redirect()->route('users.create')->with('toast_success', 'Task Created Successfully!');
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
        $user = \App\User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit',   ['user' => $user],
                                    ['roles' => $roles]
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

        // var_dump($request->file('avatar'));
        // exit;
        // $validation = \Validator::make($request->all(),[
        //     "name" => "required|min:5|max:100",
        //     "username" => "required|min:5|max:20|unique:users",
        //     "avatar" => "required",
        //     "email" => "required|email|unique:users",
        //   ])->validate();
          $validator = Validator::make($request->all(), [
            "name" => "required|min:5|max:100",
            'nip' => 'min:18|numeric|unique:users,nip,' . $id,
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }


        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->nip = $request->get('nip');
        $user->email = $request->get('email');
        if( $request->get('password') ){
            $user->password = \Hash::make($request->get('password'));
        }
 
        if( !empty($request->file('avatar')) && $user->avatar && file_exists(storage_path('app/public/' . $user->avatar))){
            \Storage::delete('public/'.$user->avatar);
            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }
        $user->update();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->get('roles'));

        return redirect()->route('users.edit', [$id])->with('toast_success', 'Berhasil Merubah Data Pengguna');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
            if($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))){
                \Storage::delete('public/'.$user->avatar);
            }
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Berhasil Menghapus data Pengguna');
    }

}
