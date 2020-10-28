<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $users = \App\User::get();
        // foreach($users as $key => $user){
        //     $user->assignRole('guru');
        //     $user->givePermissionTo('guru');
        // }
        return view('dashboard.dashboard');

        // $user = Role::all()->pluck('name');
        // return $user;
    }
}
