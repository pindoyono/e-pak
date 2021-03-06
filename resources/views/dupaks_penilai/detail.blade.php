@extends('layouts.global')
@section('title')
    Usulan DupaK
@endsection

@section('content')      
<div class="container-fluid">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Usulan</h4>
            <a href="{{route('dupaks_penilai.index')}}" class="btn btn-success">List Usulan <div class="ripple-container"></div></a>
        </div>
        <div class="col-12 text-right">
        </div>
        <div class="card-content">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                            <h4 class="panel-title">
                                Data Profile 
                                <i class="material-icons">keyboard_arrow_down</i>
                            </h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="card-content">
                                <h4 class="card-title"></h4>
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th width=50%></th>
                                                    <th width=50%></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($biodatas))
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>{{$users->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>NIP</td>
                                                    <td>{{$users->nip}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$users->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Jenis Kelamin</td>
                                                    <td>{{$biodatas->jenis_kelamin}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Sekolah</td>
                                                    <td>{{ nama_sekolah($biodatas->sekolah_id)->nama}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pendidikan</td>
                                                    <td>{{$biodatas->pendidikan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tugas Tambahan</td>
                                                    <td>{{$biodatas->tugas_tambahan}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat / Tanggal Lahir</td>
                                                    <td>{{$biodatas->tempat_lahir.' / '.tgl_indo($biodatas->tanggal_lahir)}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>{{$biodatas->alamat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Agama</td>
                                                    <td>{{$biodatas->agama}}</td>
                                                </tr>
                                                <tr>
                                                    <td>NUPTK</td>
                                                    <td>{{$biodatas->nuptk}}</td>
                                                </tr>
                                                <tr>
                                                    <td>No SK Terakhir</td>
                                                    <td>{{$biodatas->no_sk_cpns}}</td>
                                                </tr>
                                                <tr>
                                                    <td>TMT CPNS</td>
                                                    <td>{{$biodatas->tmt_cpns}}</td>
                                                </tr>
                                                <tr>
                                                    <td>TMT PNS</td>
                                                    <td>{{$biodatas->tmt_pns}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pangkat Dan Golongan</td>
                                                    <td>{{pangkat($biodatas->pangkat_golongan)->pangkat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>No Kartu Pegawai</td>
                                                    <td>{{$biodatas->kartu_pegawai}}</td>
                                                </tr>
                                                <tr>
                                                    <td>No HP</td>
                                                    <td>{{$biodatas->no_hp}}</td>
                                                </tr>
                                                @else
                                                <div class="alert alert-warning">
                                                    <button type="button" aria-hidden="true" class="close">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <span>
                                                        <b> Warning - </b>
                                                            Biodata Tidak Lengkap
                                                        </span>
                                                </div>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-profile">
                                        <div class="card-avatar">
                                            <a href="#pablo">
                                            @if($users->avatar == 'avatars/saat-ini-tidak-ada-file.jpg')
                                                <img src="{{asset('material/img/saat-ini-tidak-ada-file.jpg')}}" alt="...">
                                            @else 
                                                <img src="{{asset('storage/'.$users->avatar)}}" width="10px"/> 
                                            @endif
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <h2 class="category text-gray">{{$users->getRoleNames()[0]}}</h2> 
                                            <h4 class="card-title">{{$users->name}}</h4>
                                            <p class="description">
                                                Unggul dan Profesional
                                            </p>
                                            <p class="description">
                                                Dalam Layanan Pendididkan dan Kebudayaan
                                            </p>
                                            <p class="description">
                                                Demi Terwujudnya Masyarakat Kalimantan Utara yang kompetitif dan Bermartabat
                                            </p>
                                            <!-- <a href="#pablo" class="btn btn-rose btn-round">Follow</a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">
                                Berkas Kepegawaian
                                <i class="material-icons">keyboard_arrow_down</i>
                            </h4>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                        @foreach($kepegawaians as $key => $kepegawaian )
                            <div class="col-md-12">
                                <div class="table-responsive table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    NO
                                                </td>
                                                <td>
                                                    Nama Berkas
                                                </td>
                                                <td>Data</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    1                                            
                                                </td>
                                                <td>
                                                    SK CPNS
                                                </td>
                                                <!-- <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_cpns)}}">Download</a></td> -->
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->sk_cpns)) ) }}" >lihat</a></td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                    2                                            
                                                </td>
                                                <td>
                                                    SK Pangkat Terakhir
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->sk_pangkat)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3                                            
                                                </td>
                                                <td>
                                                    SK Jafung Terakhir
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->sk_jafung)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4                                            
                                                </td>
                                                <td>
                                                    IJAZAH
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->ijazah)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5                                            
                                                </td>
                                                <td>
                                                    Kartu Pegawai
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->karpeg)) ) }}" >lihat</a></td>
                                            </tr>
                                            @if(substr($users->nip,8,4)<='2016')
                                            <tr>
                                                <td>
                                                    6                                            
                                                </td>
                                                <td>
                                                    SK Pengalihan Kab ke Prov
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->sk_penyesuaian)) ) }}" >lihat</a></td>
                                            </tr>
                                            @elseif(substr($users->nip,8,6)=='201708')
                                            <tr>
                                                <td>
                                                    6                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Khusus GGD
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$kepegawaian->sk_penyesuaian)) ) }}" >lihat</a></td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach 
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">
                                Berkas Usulan Penilaian Angka Kredit
                                <i class="material-icons">keyboard_arrow_down</i>
                            </h4>
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="table-responsive table-sales">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    NO
                                                </td>
                                                <td>
                                                    Nama Berkas
                                                </td>
                                                <td>Data</td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    1                                            
                                                </td>
                                                <td>
                                                    Surat Pengantar Dari Sekolah
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->surat_pengantar)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Tidak Pernah Di Hukum Disiplin
                                                </td>
                                                @if($dupak->tidak_dihukum==NULL)
                                                <td><b>Tidak Ada</b></td>
                                                @else
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->tidak_dihukum)) ) }}" >lihat</a></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    3                                            
                                                </td>
                                                <td>
                                                    DUPAK
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->dupak)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Melaksanakan Pembelajaran
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->surat_pernyataan1)) ) }}" >lihat</a></td>
                                            <tr>
                                                <td>
                                                    5                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Melaksanakan Bimbingan / Tugas Tertentu / Tugas Tambahan
                                                </td>
                                                @if($dupak->surat_pernyataan2==NULL)
                                                <td><b>Tidak Ada</b></td>
                                                @else
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->surat_pernyataan2)) ) }}" >lihat</a></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    6                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Melaksanakan Unsur penunjang
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->surat_pernyataan4)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7                                            
                                                </td>
                                                <td>
                                                    Surat Pernyataan Melaksanakan PKB
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->surat_pernyataan3)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8                                            
                                                </td> 
                                                <td>
                                                    SK Pembagian Tugas Ganjil
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->pembagian_tugas)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9                                            
                                                </td>
                                                <td>
                                                    SK Pembagian Tugas Genap 
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->pembagian_tugas_genap)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10                                           
                                                </td>
                                                <td>
                                                    PAK Terakhir
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->pak)) ) }}" >lihat</a></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    11                                            
                                                </td>
                                                <td>
                                                    Laporan / form PKG
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->pkg)) ) }}" >lihat</a></td>
                                            </tr>
                                            </tr>
                                                <td>
                                                    12                                           
                                                </td>
                                                <td>
                                                    SKP
                                                </td>
                                                <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$dupak->skp)) ) }}" >lihat</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h4 class="panel-title">
                            Daftar bukti fisik Tugas Tambahan, PKB dn Penunjang
                                <i class="material-icons">keyboard_arrow_down</i>
                            </h4>
                        </a>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                <thead>
                                    <tr>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Berkas</th>
                                        <th>Angka Kredit</th>
                                        <th>Satuan Hasil</th>
                                        <th>Lihat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($berkas as $key => $berkas)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{kegiatans($berkas->nama)->kegiatan}}</td>
                                        <td>{{kegiatans($berkas->nama)->angka_kredit}}</td>
                                        <td>{{kegiatans($berkas->nama)->satuan_hasil}}</td>
                                        <td><a target="_blank" class="btn btn-info" href="{{route('dupaks_penilai.preview', Crypt::encrypt(asset('storage/'.$berkas->berkas)) ) }}" >lihat</a></td>

                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

</div> 
     
@endsection

@section('js')
  <script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
@endsection
