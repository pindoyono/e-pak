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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController')->middleware('role:super admin');
    Route::resource("users", "UserController");
    Route::resource("sarans", "SaranController");
    Route::resource("jabatans", "JabatanController")->middleware('role:super admin');
    Route::resource("lampirans", "LampiranController")->middleware('role:super admin');
    Route::resource("sekolahs", "SekolahController")->middleware('role:super admin');
    Route::resource("setups", "SetupController")->middleware('role:super admin');
    Route::resource("mapels", "MapelController")->middleware('role:super admin');
    Route::resource("kegiatans", "KegiatanController")->middleware('role:super admin|penilai|verifikator');
    Route::resource("kepegawaians", "KepegawaianController")->middleware('role:guru|penilai|verifikator');
    Route::resource("dupaks", "DupakController")->middleware('role:guru|penilai|verifikator');
    Route::resource("dupaks_penilai", "PenilaiDupakController")->middleware('role:guru|penilai|verifikator|admin provinsi');
    Route::resource("verifikasi", "VerifikasiController")->middleware('role:guru|penilai|verifikator');
    Route::resource("berkas", "BerkasController")->middleware('role:guru|penilai|verifikator');
    Route::get('/upload/{id}', 'BerkasController@upload')->name('upload')->middleware('role:guru|super admin|penilai|verifikator');
    
    //dupaks penilai
    Route::get('/preview/{id}', 'PenilaiDupakController@preview')->name('dupaks_penilai.preview')->middleware('role:guru|penilai|verifikator');
    Route::get('/berita_acara/{id}', 'PenilaiDupakController@berita_acara')->name('dupaks_penilai.berita_acara')->middleware('role:guru|penilai|verifikator');
    Route::get('/hapak/{id}', 'PenilaiDupakController@hapak')->name('dupaks_penilai.hapak')->middleware('role:guru|penilai|verifikator');
    Route::get('/createPDF/{id}', 'PenilaiDupakController@createPDF')->name('dupaks_penilai.createPDF')->middleware('role:guru|penilai|verifikator');
    Route::get('/create_pak_PDF/{id}', 'PenilaiDupakController@create_pak_PDF')->name('dupaks_penilai.create_pak_PDF')->middleware('role:guru|penilai|verifikator|admin provinsi');
    Route::get('/hapakPDF/{id}', 'PenilaiDupakController@hapakPDF')->name('dupaks_penilai.hapakPDF')->middleware('role:guru|penilai|verifikator');
    Route::put('/cou_berita_acara/{id}', 'PenilaiDupakController@create_or_update')->name('dupaks_penilai.create_or_update')->middleware('role:guru|penilai|verifikator|super admin');
    Route::put('/couh_berita_acara/{id}', 'PenilaiDupakController@create_or_update_hapak')->name('dupaks_penilai.create_or_update_hapak')->middleware('role:guru|penilai|verifikator|super admin');
    Route::get('/lampiran/{id}', 'PenilaiDupakController@lampiran')->name('dupaks_penilai.lampiran')->middleware('role:guru|penilai|verifikator|super admin');

    Route::get('/bukti/{id}', 'BerkasController@bukti')->name('berkas.bukti')->middleware('role:guru|penilai|verifikator');
    Route::put('/berkas/simpan/{id}', 'BerkasController@simpan')->name('berkas.simpan')->middleware('role:guru|penilai|verifikator');
    Route::get('/berkas/buat/{id}','BerkasController@buat')->name('berkas.buat')->middleware('role:guru|penilai|verifikator');
    
    Route::get('/submit/{id}', 'DupakController@submit')->name('dupaks.submit')->middleware('role:guru|penilai|verifikator');
    Route::get('/dupaks/ubah/{id}/{name}','DupakController@ubah')->name('dupaks.ubah')->middleware('role:guru|penilai|verifikator');
    Route::put('/dupaks/update_ubah/{id}','DupakController@update_ubah')->name('dupaks.update_ubah')->middleware('role:guru|penilai|verifikator');
    Route::get('/dupaks/detail/{id}','DupakController@detail')->name('dupaks.detail')->middleware('role:guru|penilai|verifikator');
    
    Route::get('/verified/{id}', 'VerifikasiController@verified')->name('verifikasi.verified')->middleware('role:guru|penilai|verifikator');
    Route::get('/kirim-email', 'VerifikasiController@email')->name('verifikasi.email')->middleware('role:guru|penilai|verifikator');
    Route::get('/baca/{id}', 'VerifikasiController@baca')->name('verifikasi.baca')->middleware('role:guru|penilai|verifikator');

    //user
    Route::get('/profile/{id}', 'UserController@profile')->name('users.profile')->middleware('role:guru|super admin|penilai|verifikator');
    Route::put('/update_profile/{id}', 'UserController@update_profile')->name('users.update_profile')->middleware('role:guru|penilai|verifikator|super admin');
    
    // biodata
    Route::get('/create_biodata/{id}', 'BiodataController@create_biodata')->name('biodatas.create_biodata');
    Route::put('/create_or_update/{id}', 'BiodataController@create_or_update')->name('biodatas.create_or_update');
    
    Route::get('users.export', 'UserController@export')->name('users.export')->middleware('role:super admin');
    Route::get('importExportView', 'UserController@importExportView')->middleware('role:super admin');
    Route::post('users.import', 'UserController@import')->name('users.import')->middleware('role:super admin');
    Route::get('export', 'KegiatanController@export')->name('kegiatans.export')->middleware('role:super admin');
    // Route::get('importExportView', 'KegiatanController@importExportView')->middleware('role:super admin');
    Route::post('import', 'KegiatanController@import')->name('kegiatans.import')->middleware('role:super admin');
    Route::post('importlampiran', 'LampiranController@import')->name('lampirans.import')->middleware('role:super admin');
    Route::get('exportlampiran', 'LampiranController@export')->name('lampirans.export')->middleware('role:super admin');
    Route::get('exportmapel', 'MapelController@export')->name('mapels.export')->middleware('role:super admin');
    Route::post('importmapel', 'MapelController@import')->name('mapels.import')->middleware('role:super admin');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
