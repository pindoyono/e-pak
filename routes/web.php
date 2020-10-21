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
    Route::resource("mapels", "MapelController")->middleware('role:super admin');
    Route::resource("kegiatans", "KegiatanController")->middleware('role:super admin|penilai');
    Route::resource("kepegawaians", "KepegawaianController")->middleware('role:guru|penilai');
    Route::resource("dupaks", "DupakController")->middleware('role:guru|penilai');
    Route::resource("dupaks_penilai", "PenilaiDupakController")->middleware('role:guru|penilai');
    Route::resource("berkas", "BerkasController")->middleware('role:guru|penilai');
    Route::get('/upload/{id}', 'BerkasController@upload')->name('upload')->middleware('role:guru|super admin|penilai');
    
    Route::get('/berita_acara/{id}', 'PenilaiDupakController@berita_acara')->name('dupaks_penilai.berita_acara')->middleware('role:guru|penilai');
    Route::get('/createPDF/{id}', 'PenilaiDupakController@createPDF')->name('dupaks_penilai.createPDF')->middleware('role:guru|penilai');
    
    Route::get('/bukti/{id}', 'BerkasController@bukti')->name('berkas.bukti')->middleware('role:guru|penilai');
    Route::put('/berkas/simpan/{id}', 'BerkasController@simpan')->name('berkas.simpan')->middleware('role:guru|penilai');
    Route::get('/berkas/buat/{id}','BerkasController@buat')->name('berkas.buat')->middleware('role:guru|penilai');
    
    Route::get('/submit/{id}', 'DupakController@submit')->name('dupaks.submit')->middleware('role:guru|penilai');
    Route::get('/dupaks/ubah/{id}/{name}','DupakController@ubah')->name('dupaks.ubah')->middleware('role:guru|penilai');
    Route::put('/dupaks/update_ubah/{id}','DupakController@update_ubah')->name('dupaks.update_ubah')->middleware('role:guru|penilai');
    Route::get('/dupaks/detail/{id}','DupakController@detail')->name('dupaks.detail')->middleware('role:guru|penilai');

    //user
    Route::get('/profile/{id}', 'UserController@profile')->name('users.profile')->middleware('role:guru|super admin|penilai');
    Route::put('/update_profile/{id}', 'UserController@update_profile')->name('users.update_profile')->middleware('role:guru|penilai|super admin');
    
    // biodata
    Route::get('/create_biodata/{id}', 'BiodataController@create_biodata')->name('biodatas.create_biodata')->middleware('role:guru|penilai|super admin ');
    Route::put('/create_or_update/{id}', 'BiodataController@create_or_update')->name('biodatas.create_or_update')->middleware('role:guru|penilai|super admin');



    Route::get('users.export', 'UserController@export')->name('users.export')->middleware('role:super admin');
    Route::get('importExportView', 'UserController@importExportView')->middleware('role:super admin');
    Route::post('users.import', 'UserController@import')->name('users.import')->middleware('role:super admin');
    Route::get('export', 'KegiatanController@export')->name('kegiatans.export')->middleware('role:super admin');
    // Route::get('importExportView', 'KegiatanController@importExportView')->middleware('role:super admin');
    Route::post('import', 'KegiatanController@import')->name('kegiatans.import')->middleware('role:super admin');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
