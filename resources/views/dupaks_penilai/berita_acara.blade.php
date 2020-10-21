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
                    <h2 class="card-title text-center">TAHUN {{tgl_indo_tahun($dupak->awal)}}</h2>
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
                                <tr>
                                    <td width="5%"> 3</td>
                                    <td colspan=2>NUPTK</td>
                                    <td colspan=2>{{$biodatas->nuptk}}</td>
                                </tr>
                                <tr>
                                    <td width="5%"> 4</td>
                                    <td colspan=2>Tempat dan Tanggal Lahir</td>
                                    <td colspan=2>{{$biodatas->tempat_lahir.' dan '.$biodatas->tanggal_lahir}}</td>
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
                                    <td rowspan=2>Masa kerja Golongan</td>
                                    <td>Lama</td>
                                    <td colspan=2>{{$biodatas->tmt_cpns}}</td>
                                </tr>
                                <tr>
                                    <td>Baru</td>
                                    <td colspan=2>{{$biodatas->tmt_cpns}}</td>
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


                                <tr>
                                    <td width="5%">II</td>
                                    <td colspan=2> PENETAPAN ANGKA KREDIT</td>
                                    <td width="10%"></td>
                                    <td width="10%"></td>
                                    <td width="10%"></td>
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
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>2) Mengikuti pelatihan prajabatan</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>b. Pembelajaran /  bimbingan dan tugas tertentu</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>    1) Proses pembelajaran	</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>    2) Proses bimbingan	</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>    3) Tugas lain yang relevan</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>c. Pengembangan Keprofesian</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td> 1) Pengembangan diri</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>2) Publikasi ilmiah</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>  3) Karya Inovatif</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td> <b>Jumlah Unsur Utama</b></td>
                                    <td>total utama</td>
                                    <td>total utama</td>
                                    <td>total utama</td>
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
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td>2. Pendukung tugas guru</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>
                                <tr>
                                    <td><b>Jumlah Unsur Penunjang	</b></td>
                                    <td>total penunjang</td>
                                    <td>total penunjang</td>
                                    <td>total penunjang</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                    
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('dupaks_penilai.createPDF', Crypt::encrypt($dupak_id))}}">
                            <button class="btn btn-primary btn-round">
                                <i class="fas fa-print"></i> Cetak Berita Acara
                                <div class="ripple-container"></div>
                            </button>
                        </a>
                    </div>
                    <div class="col-sm-4">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">

                        <br>
                            Malinau, {{tgl_indo($now)}}
                        <br>
                        <br>
                        <br>
                        <br>
                            {{Auth::user()->name}} 
                        <br>
                            NIP. {{Auth::user()->nip}}
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
</script>
@endsection
