@extends('layouts.global')
@section('title')
    Usulan DupaK
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card">
                <!-- <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div> -->
                <div class="card-content">
                    <h2 class="card-title text-center">BERITA ACARA PENILAIAN ANGKA KREDIT</h2>
                    <!-- <h2 class="card-title text-center">TAHUN {{tgl_indo_tahun($dupak->awal)}}</h2> -->
                    <p>
                        Pada hari Ini {{ hari_ini().", ".tgl_indo($now)}} bertempat di Kantor Cabang Dinas Pendidikan Dan Kebudayaan Provinsi Kalimantan Utara
                        Wilayah Malinau dan Tana Tidung di Malinau telah dilakukan penilaian terhadap usulan penilaian angka kredit jabatan fungsional guru dengan hasil sebagai berikut:
                    
                    </p>
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('dupaks_penilai.create_or_update', Crypt::encrypt($dupak->id) )}}" method="POST">
                    
                    

                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <h6>
                                    <td colspan=3>Instansi : Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Utara</td>
                                    <td colspan=4 class="td-actions text-right">Masa penilaian : {{tgl_indo($dupak->awal).' - '.tgl_indo($dupak->awal)}}</td>
                                    </h6>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td width="5%">I</td>
                                    <td colspan=5 class="text-left"> KETERANGAN PERORANGAN</td>
                                </tr>
                                <tr>
                                    <td rowspan=14></td>
                                    <td width="5%"> 1</td>
                                    <td width="40%" colspan=2>Nama</td>
                                    <td colspan=2>{{$users->name}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 2</td>
                                    <td colspan=2>NIP</td>
                                    <td colspan=2>{{$users->nip}}</td>
                                </tr>
                                @if(!empty($biodatas))
                                <tr>
                                    <td width="5%"> 3</td>
                                    <td colspan=2>NUPTK</td>
                                    <td colspan=2>{{$biodatas->nuptk}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 4</td>
                                    <td colspan=2>Tempat, Tanggal Lahir</td>
                                    <td colspan=2>{{$biodatas->tempat_lahir.', '.tgl_indo($biodatas->tanggal_lahir)}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 5</td>
                                    <td colspan=2>Jenis Kelamin</td>
                                    <td colspan=2>{{$biodatas->jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 6</td>
                                    <td colspan=2>Pendidikan yang telah diperhitungkan angka kreditnya</td>
                                    <td colspan=2>{{$biodatas->pendidikan}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 7</td>
                                    <td colspan=2>Pangkat / Golongan ruang / TMT</td>
                                    <td colspan=2>{{  pangkat($biodatas->pangkat_golongan)->pangkat }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 8</td>
                                    <td colspan=2>Jabatan Guru / TMT</td>
                                    <td colspan=2>{{  pangkat($biodatas->pangkat_golongan)->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td rowspan=2> 9</td>
                                    <td rowspan=2>Masa Kerja Golongan</td>
                                    <td>Lama</td>
                                    @if(!empty($berita_acara->pendidikan))
                                    <td colspan=2> <input name="lama" value="{{ $berita_acara->masa_kerja_lama }}" placeholder="LAMA" required /></td>
                                    @else
                                    <td colspan=2> <input name="lama" value="" placeholder="LAMA" required /></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>Baru</td>
                                    @if(!empty($berita_acara->pendidikan))
                                    <td colspan=2> <input name="baru" value="{{ $berita_acara->masa_kerja_baru}}" placeholder="BARU" required /></td>
                                    @else
                                    <td colspan=2> <input name="baru" value="" placeholder="BARU" required /></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td width="5%"> 10</td>
                                    <td colspan=2>Jenis Guru </td>
                                    <td colspan=2>{{  $biodatas->jenis_guru }}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 11</td>
                                    <td colspan=2>Unit Kerja </td>
                                    <td colspan=2>{{  nama_sekolah($biodatas->sekolah_id)->nama }}</td>
                                </tr>
                                <tr>
                                    <td rowspan=2> 12</td>
                                    <td rowspan=2>Alamat</td>
                                    <td>Sekolah</td>
                                    <td colspan=2>{{nama_sekolah($biodatas->sekolah_id)->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Rumah</td>
                                    <td colspan=2>{{$biodatas->alamat}}</td>
                                </tr>
                                <tr>
                                    <td colspan=7></td>
                                </tr>
                                @else
                                    <div class="alert alert-warning">
                                        <button type="button" aria-hidden="true" class="close">
                                            <i class="material-icons">close</i>
                                        </button>
                                        <span>
                                            <b> Warning - </b>
                                                Biodata Belum di Lengkapi Oleh Guru Yg bersangkutan
                                            </span>
                                    </div>
                                @endif
                               @if(!empty($berita_acara->pendidikan))
                                <tr>
                                    <td width="5%">II</td>
                                    <td colspan=2> PENETAPAN ANGKA KREDIT</td>
                                    <td width="10%">AK Lama *)</td>
                                    <td width="10%">AK Diperoleh **)</td>
                                    <td width="10%">Jumlah AK</td>
                                </tr>
                                <tr>
                                    <td width="5%" rowspan="20"></td>
                                    <td width="2%" >1</td>
                                    <td> <b>Unsur Utama</b></td>
                                    <td ></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="5%" rowspan="20"></td>
                                    <td width="2%" >1</td>
                                    <td> <b>Unsur Utama</b></td>
                                    <td ></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="2%" rowspan="12"></td>
                                    <td> a. Pendidikan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               <tr>
                                    <td>1) Pendidikan sekolah dan memperoleh gelar ijazah </td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pendidikan)->lama }}" name="value1" id="value1" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pendidikan)->baru }}" name="value2" id="value2" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input   step="any" type="number" value="{{ json_decode($berita_acara->pendidikan)->total }}" name="sum" id="sum" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2) Mengikuti pelatihan prajabatan</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->prajabatan)->lama }}" name="value1a" id="value1a" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->prajabatan)->baru }}" name="value2a" id="value2a" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->prajabatan)->total }}" name="suma" id="suma" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>    1) Proses pembelajaran	</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pembelajaran)->lama }}" name="value1b" id="value1b" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pembelajaran)->baru }}" name="value2b" id="value2b" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pembelajaran)->total }}" name="sumb" id="sumb" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>    2) Proses bimbingan	</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->bimbingan)->lama }}" name="value1c" id="value1c" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->bimbingan)->baru }}" name="value2c" id="value2c" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->bimbingan)->total }}" name="sumc" id="sumc" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>    3) Tugas lain yang relevan</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->tugas_lain)->lama }}" name="value1d" id="value1d" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->tugas_lain)->baru }}" name="value2d" id="value2d" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->tugas_lain)->total }}" name="sumd" id="sumd" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>c. Pengembangan Keprofesian</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td> 1) Pengembangan diri</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pd)->lama }}" name="value1e" id="value1e" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pd)->baru }}" name="value2e" id="value2e" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pd)->total }}" name="sume" id="sume" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2) Publikasi ilmiah</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pi)->lama }}" name="value1f" id="value1f" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pi)->baru }}" name="value2f" id="value2f" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pi)->total }}" name="sumf" id="sumf" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>  3) Karya Inovatif</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ki)->lama }}" name="value1g" id="value1g" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ki)->baru }}" name="value2g" id="value2g" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ki)->total }}" name="sumg" id="sumg" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td> <b>Jumlah Unsur Utama</b></td>
                                    <td><input  step="any" placeholder="total utama"
                                    value="{{ json_decode($berita_acara->ki)->lama + 
                                            json_decode($berita_acara->pendidikan)->lama +
                                            json_decode($berita_acara->prajabatan)->lama +
                                            json_decode($berita_acara->pembelajaran)->lama +
                                            json_decode($berita_acara->bimbingan)->lama +
                                            json_decode($berita_acara->tugas_lain)->lama +
                                            json_decode($berita_acara->pd)->lama +
                                            json_decode($berita_acara->pi)->lama }}"
                                     type="number" name="total_utama_lama" id="total_utama_lama" class="form-control" readonly /></td>
                                    <td><input  step="any" placeholder="total utama"
                                    value="{{ json_decode($berita_acara->ki)->baru + 
                                            json_decode($berita_acara->pendidikan)->baru +
                                            json_decode($berita_acara->prajabatan)->baru +
                                            json_decode($berita_acara->pembelajaran)->baru +
                                            json_decode($berita_acara->bimbingan)->baru +
                                            json_decode($berita_acara->tugas_lain)->baru +
                                            json_decode($berita_acara->pd)->baru +
                                            json_decode($berita_acara->pi)->baru }}"
                                     type="number" name="total_utama_baru" id="total_utama_baru" class="form-control" readonly /></td>
                                    <td><input  step="any" placeholder="total utama" 
                                    value="{{ json_decode($berita_acara->ki)->total + 
                                            json_decode($berita_acara->pendidikan)->total +
                                            json_decode($berita_acara->prajabatan)->total +
                                            json_decode($berita_acara->pembelajaran)->total +
                                            json_decode($berita_acara->bimbingan)->total +
                                            json_decode($berita_acara->tugas_lain)->total +
                                            json_decode($berita_acara->pd)->total +
                                            json_decode($berita_acara->pi)->total }}"
                                    type="number" name="total_utama_semua" id="total_utama_semua" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td width="2%" >2</td>
                                    <td><b>Unsur Penunjang</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="2%" rowspan="12"></td>
                                    <td>1. Ijazah yang tidak sesuai</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->lama }}" name="value1h" id="value1h" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->baru }}" name="value2h" id="value2h" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->total }}" name="sumh" id="sumh" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2. Pendukung tugas guru</td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pendukung)->lama }}" name="value1i" id="value1i" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pendukung)->baru }}" name="value2i" id="value2i" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="{{ json_decode($berita_acara->pendukung)->total }}" name="sumi" id="sumi" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Unsur Penunjang	</b></td>
                                    <td><input  step="any" placeholder="Total Penunjang" 
                                    value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->lama + 
                                            json_decode($berita_acara->pendukung)->lama }}"
                                    type="number" name="total_penunjang_lama" id="total_penunjang_lama" class="form-control" readonly /></td>
                                    <td><input  step="any" placeholder="Total Penunjang" 
                                    value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->baru + 
                                            json_decode($berita_acara->pendukung)->baru }}"
                                     type="number" name="total_penunjang_baru" id="total_penunjang_baru" class="form-control" readonly /></td>
                                    <td><input  step="any" placeholder="Total Penunjang" 
                                    value="{{ json_decode($berita_acara->ijazah_tdk_sesuai)->total + 
                                            json_decode($berita_acara->pendukung)->total }}"
                                     type="number" name="total_penunjang_semua" id="total_penunjang_semua" class="form-control" readonly /></td>
                               </tr>
                               @else
                               <tr>
                                    <td width="5%">II</td>
                                    <td colspan=2> PENETAPAN ANGKA KREDIT</td>
                                    <td width="10%">AK Lama *)</td>
                                    <td width="10%">AK Diperoleh **)</td>
                                    <td width="10%">Jumlah AK</td>
                                </tr>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="2%" >0</td>
                                    <td> <b>Daerah Khusus</b></td>
                                    <td ></td>
                                    <td></td>
                                    <td><input  step="any" type="number" value=0 name="dasus" id="dasus" class="form-control" min="0" placeholder="LAMA" required /></td>
                                </tr>
                                <tr>
                                    <td width="5%" rowspan="20"></td>
                                    <td width="2%" >1</td>
                                    <td> <b>Unsur Utama</b></td>
                                    <td ></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="2%" rowspan="12"></td>
                                    <td> a. Pendidikan</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                               <tr>
                                    <td>1) Pendidikan sekolah dan memperoleh gelar ijazah</td>
                                    <td><input  step="any" type="number" value=0 name="value1" id="value1" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value=0 name="value2" id="value2" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value=0 name="sum" id="sum" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2) Mengikuti pelatihan prajabatan</td>
                                    <td><input  step="any" value=0 type="number" name="value1a" id="value1a" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2a" id="value2a" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="suma" id="suma" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>    1) Proses pembelajaran	</td>
                                    <td><input  step="any" value=0 type="number" name="value1b" id="value1b" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2b" id="value2b" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumb" id="sumb" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>    2) Proses bimbingan	</td>
                                    <td><input  step="any" value=0 type="number" name="value1c" id="value1c" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2c" id="value2c" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumc" id="sumc" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>    3) Tugas lain yang relevan</td>
                                    <td><input  step="any" value=0 type="number" name="value1d" id="value1d" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2d" id="value2d" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumd" id="sumd" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>c. Pengembangan Keprofesian</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td> 1) Pengembangan diri</td>
                                    <td><input  step="any" value=0 type="number" name="value1e" id="value1e" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2e" id="value2e" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sume" id="sume" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2) Publikasi ilmiah</td>
                                    <td><input  step="any" value=0 type="number" name="value1f" id="value1f" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2f" id="value2f" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumf" id="sumf" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>  3) Karya Inovatif</td>
                                    <td><input  step="any" value=0 type="number" name="value1g" id="value1g" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2g" id="value2g" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumg" id="sumg" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td> <b>Jumlah Unsur Utama</b></td>
                                    <td><input  step="any"  value=0 placeholder="total utama" type="number" name="total_utama_lama" id="total_utama_lama" class="form-control" readonly /></td>
                                    <td><input  step="any" value=0 placeholder="total utama"  type="number" name="total_utama_baru" id="total_utama_baru" class="form-control" readonly /></td>
                                    <td><input  step="any" value=0 placeholder="total utama"  type="number" name="total_utama_semua" id="total_utama_semua" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td width="2%" >2</td>
                                    <td><b>Unsur Penunjang</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td width="2%" rowspan="12"></td>
                                    <td>1. Ijazah yang tidak sesuai</td>
                                    <td><input  step="any" value=0 type="number" name="value1h" id="value1h" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2h" id="value2h" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumh" id="sumh" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td>2. Pendukung tugas guru</td>
                                    <td><input  step="any" value=0 type="number" name="value1i" id="value1i" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" value=0 type="number" name="value2i" id="value2i" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" value=0 type="number" name="sumi" id="sumi" class="form-control" readonly /></td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Unsur Penunjang	</b></td>
                                    <td><input  step="any" value=0 placeholder="Total Penunjang" type="number" name="total_penunjang_lama" id="total_penunjang_lama" class="form-control" readonly /></td>
                                    <td><input  step="any" value=0 placeholder="Total Penunjang"  type="number" name="total_penunjang_baru" id="total_penunjang_baru" class="form-control" readonly /></td>
                                    <td><input  step="any" value=0 placeholder="Total Penunjang"  type="number" name="total_penunjang_semua" id="total_penunjang_semua" class="form-control" readonly /></td>
                               </tr>
                               @endif
                               <tr>
                                    <td><b>Total</b></td>
                                    <td><input  step="any" type="number" value="0" name="total_lama" id="total_lama" class="form-control" min="0" placeholder="LAMA" required /></td>
                                    <td><input  step="any" type="number" value="0" name="total_baru" id="total_baru" class="form-control" min="0" placeholder="BARU" required /></td>
                                    <td><input  step="any" type="number" value="0" name="total_semua" id="total_semua" class="form-control" readonly /></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    @if(!empty(Auth::user()->nip == $users->nip))
                    <div class="col-sm-3">
                       
             
                    </div>
                    <div class="col-sm-3">
                   
                    </div>
                    @else

                   

                    @if(!empty($berita_acara->pendidikan) && !empty($biodatas))
                    <div class="col-sm-3">
                   
                    </div>
                    <div class="col-sm-3">
                   
                    </div>
                    
                    <!-- <div class="col-sm-3">
                        <a  class="btn btn-primary btn-round" target="_blank" href="{{route('dupaks_penilai.createPDF', Crypt::encrypt($dupak_id))}}">
                                <i class="fas fa-print"></i> Cetak Berita Acara
                                <div class="ripple-container"></div>
                        </a>
                    </div> -->
                    
                    @else
                    <div class="col-sm-3">
                   
                    </div>
                    
                    <div class="col-sm-3">
                        <button type="submit"  class="btn btn-info btn-round">
                            <i class="fas fa-save"></i> Simpan
                            <div class="ripple-container"></div>
                        </button>
                    </div>
                    @endif

                    @endif
                </form>
                    <div class="col-sm-2">
                    <a href="{{route('dupaks_penilai.index')}}" class="btn btn-rose btn-round">List Usulan <div class="ripple-container"></div></a>
                    </div>

                    <div class="col-sm-4">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">

                        <br>
                            @if(!empty($berita_acara->created_at))
                                Malinau, {{tgl_indo( customTanggal1($berita_acara->created_at,"Y-m-d") )}}
                            @else
                                Malinau, {{tgl_indo( $now )}}        
                            @endif
                        <br>
                        <br>
                        <br>
                        <br>
                        @if(!empty($berita_acara->penilai ))
                            {{  $berita_acara->penilai }} 
                            <br>
                            NIP. {{  $berita_acara->nip_penilai }}       
                        @endif
                        <br>
                        <br>
                        <br>
                    </div>
                    </div>
                </div>


            </div>    
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>         
@endsection

@section('js')
  <script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });

    $(function(){
            $('#value1, #value2').keyup(function(){
               var value1 = parseFloat($('#value1').val()) || 0;
               var value2 = parseFloat($('#value2').val()) || 0;
               $('#sum').val(value1 + value2);
            });
            $('#value1a, #value2a').keyup(function(){
               var value1 = parseFloat($('#value1a').val()) || 0;
               var value2 = parseFloat($('#value2a').val()) || 0;
               $('#suma').val(value1 + value2);
            });
            $('#value1b, #value2b').keyup(function(){
               var value1 = parseFloat($('#value1b').val()) || 0;
               var value2 = parseFloat($('#value2b').val()) || 0;
               $('#sumb').val(value1 + value2);
            });
            $('#value1c, #value2c').keyup(function(){
               var value1 = parseFloat($('#value1c').val()) || 0;
               var value2 = parseFloat($('#value2c').val()) || 0;
               $('#sumc').val(value1 + value2);
            });
            $('#value1d, #value2d').keyup(function(){
               var value1 = parseFloat($('#value1d').val()) || 0;
               var value2 = parseFloat($('#value2d').val()) || 0;
               $('#sumd').val(value1 + value2);
            });
            $('#value1e, #value2e').keyup(function(){
               var value1 = parseFloat($('#value1e').val()) || 0;
               var value2 = parseFloat($('#value2e').val()) || 0;
               $('#sume').val(value1 + value2);
            });
            $('#value1f, #value2f').keyup(function(){
               var value1 = parseFloat($('#value1f').val()) || 0;
               var value2 = parseFloat($('#value2f').val()) || 0;
               $('#sumf').val(value1 + value2);
            });
            $('#value1g, #value2g').keyup(function(){
               var value1 = parseFloat($('#value1g').val()) || 0;
               var value2 = parseFloat($('#value2g').val()) || 0;
               $('#sumg').val(value1 + value2);
            });
            $('#value1h, #value2h').keyup(function(){
               var value1 = parseFloat($('#value1h').val()) || 0;
               var value2 = parseFloat($('#value2h').val()) || 0;
               $('#sumh').val(value1 + value2);
            });
            $('#value1i, #value2i').keyup(function(){
               var value1 = parseFloat($('#value1i').val()) || 0;
               var value2 = parseFloat($('#value2i').val()) || 0;
               $('#sumi').val(value1 + value2);
            });
            $('#value1, #value2,#value1a, #value2a,#value1b, #value2b,#value1c, #value2c,#value1d, #value2d,#value1e, #value2e,#value1f, #value2f,#value1g, #value2g, #dasus').keyup(function(){
               var value1 = parseFloat($('#value1').val()) || 0;
               var value1a = parseFloat($('#value1a').val()) || 0;
               var value1b = parseFloat($('#value1b').val()) || 0;
               var value1c = parseFloat($('#value1c').val()) || 0;
               var value1d = parseFloat($('#value1d').val()) || 0;
               var value1e = parseFloat($('#value1e').val()) || 0;
               var value1f = parseFloat($('#value1f').val()) || 0;
               var value1g = parseFloat($('#value1g').val()) || 0;
               var value2 = parseFloat($('#value2').val()) || 0;
               var value2a = parseFloat($('#value2a').val()) || 0;
               var value2b = parseFloat($('#value2b').val()) || 0;
               var value2c = parseFloat($('#value2c').val()) || 0;
               var value2d = parseFloat($('#value2d').val()) || 0;
               var value2e = parseFloat($('#value2e').val()) || 0;
               var value2f = parseFloat($('#value2f').val()) || 0;
               var value2g = parseFloat($('#value2g').val()) || 0;
               var dasus = parseFloat($('#dasus').val()) || 0;
               $('#total_utama_lama').val(value1 + value1a + value1b + value1c + value1d + value1e + value1f +value1g);
               $('#total_utama_baru').val(value2 + value2a + value2b + value2c + value2d + value2e + value2f + value2g);
               $('#total_utama_semua').val(value1 + value1a + value1b + value1c + value1d + value1e + value1f +value1g 
               + value2 + value2a + value2b + value2c + value2d + value2e + value2f + value2g + dasus);

               var total_utama_lama = parseFloat($('#total_utama_lama').val()) || 0;
               var total_utama_baru = parseFloat($('#total_utama_baru').val()) || 0;
               var total_utama_semua = parseFloat($('#total_utama_semua').val()) || 0;

               var total_penunjang_lama = parseFloat($('#total_penunjang_lama').val()) || 0;
               var total_penunjang_baru = parseFloat($('#total_penunjang_baru').val()) || 0;
               var total_penunjang_semua = parseFloat($('#total_penunjang_semua').val()) || 0;


               $('#total_lama').val(total_utama_lama + total_penunjang_lama);
               $('#total_baru').val(total_utama_baru + total_penunjang_baru);
               $('#total_semua').val(total_utama_semua + total_penunjang_semua);
               
            });
            $('#value1h, #value2h,#value1i, #value2i').keyup(function(){
               var value1h = parseFloat($('#value1h').val()) || 0;
               var value2h = parseFloat($('#value2h').val()) || 0;
               var value1i = parseFloat($('#value1i').val()) || 0;
               var value2i = parseFloat($('#value2i').val()) || 0;

               $('#total_penunjang_lama').val(value1h + value1i);
               $('#total_penunjang_baru').val(value2h + value2i);
               var lama = parseFloat($('#total_penunjang_lama').val()) || 0;
               var baru = parseFloat($('#total_penunjang_baru').val()) || 0;
               $('#total_penunjang_semua').val(lama + baru);


               var total_utama_lama = parseFloat($('#total_utama_lama').val()) || 0;
               var total_utama_baru = parseFloat($('#total_utama_baru').val()) || 0;
               var total_utama_semua = parseFloat($('#total_utama_semua').val()) || 0;

               var total_penunjang_lama = parseFloat($('#total_penunjang_lama').val()) || 0;
               var total_penunjang_baru = parseFloat($('#total_penunjang_baru').val()) || 0;
               var total_penunjang_semua = parseFloat($('#total_penunjang_semua').val()) || 0;


               $('#total_lama').val(total_utama_lama + total_penunjang_lama);
               $('#total_baru').val(total_utama_baru + total_penunjang_baru);
               $('#total_semua').val(total_utama_semua + total_penunjang_semua);

            });
            
         });


</script>
@endsection
