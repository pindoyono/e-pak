@extends("layouts.global")

@section('title')
    Berkas Kepegawaian
@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Berkas Kepegawaian</h4>
                </div>
                <div class="card-content">
                <div class="alert alert-warning">
                        <button type="button" aria-hidden="true" class="close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                            <b> Warning - </b>
                            Untuk Mengunggah file yg di izin kan dalam bentuk PDF dan berukuran Maksimal 2 Mb 
                            </span>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('kepegawaians.index')}}" class="btn btn-success">List Berkas <div class="ripple-container"></div></a>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kepegawaians.store')}}" method="POST">

                        @csrf
                        <div class="row">
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SK CPNS</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="sk_cpns">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SK Pangkat Terakhir</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="sk_pangkat">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SK Jafung Terakhir</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="sk_jafung">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Ijazah</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="ijazah">
                                    <span> ***	IJAZAH YANG SUDAH KELUAR ANGKA KREDITNYA / DINILAI </span>
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Kartu Pegawai</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="karpeg">
                                    <span> *** Yang Ada No Seri</span>
                            </div>
                            </div>
                            </div>
                            @if($tahun_nip<='2017')
                            <div class="row">
                                <label class="col-sm-4 label-on-left">SK Penyesuaian</label>
                                <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="sk_penyesuaian" required >
                                </div>
                            </div>
                            @endif
                        
                        </div>
                        
                        <input class="btn btn-primary" type="submit" value="Save"/>
                    </form>
                <div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>   

@endsection