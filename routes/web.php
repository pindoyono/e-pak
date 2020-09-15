<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function(){
//     return view('auth.login');
// });


// Route::get('/', function(){
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController')->middleware('role:super admin');
    Route::resource("users", "UserController")->middleware('role:super admin');
    Route::resource("jabatans", "JabatanControler")->middleware('role:super admin');
    Route::resource("sekolahs", "SekolahController")->middleware('role:super admin');
    Route::resource("kegiatans", "KegiatanController")->middleware('role:super admin');
    Route::resource("kepegawaians", "KepegawaianController");
   
    //user
    Route::get('/profile/{id}', 'UserController@profile')->name('users.profile')->middleware('role:guru|super admin');
    Route::put('/update_profile/{id}', 'UserController@update_profile')->name('users.update_profile')->middleware('role:guru');
    // biodata
    Route::get('/create_biodata/{id}', 'BiodataController@create_biodata')->name('biodatas.create_biodata')->middleware('role:guru');
    Route::put('/create_or_update/{id}', 'BiodataController@create_or_update')->name('biodatas.create_or_update')->middleware('role:guru');



    Route::get('users.export', 'UserController@export')->name('users.export')->middleware('role:super admin');
    Route::get('importExportView', 'UserController@importExportView')->middleware('role:super admin');
    Route::post('users.import', 'UserController@import')->name('users.import')->middleware('role:super admin');
    Route::get('export', 'KegiatanController@export')->name('kegiatans.export')->middleware('role:super admin');
    // Route::get('importExportView', 'KegiatanController@importExportView')->middleware('role:super admin');
    Route::post('import', 'KegiatanController@import')->name('kegiatans.import')->middleware('role:super admin');

});
