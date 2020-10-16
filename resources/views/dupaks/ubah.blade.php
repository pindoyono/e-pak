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
                    <h4 class="card-title">Form Ubah Berkas</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('dupaks.edit', Crypt::encrypt($dupaks->id))}}" class="btn btn-success">List Dupak <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('dupaks.update_ubah', Crypt::encrypt($dupaks->id) )}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                        
                        @if($kolom=='surat_pengantar')
                        <label class="col-sm-4 label-on-left"> Surat Pengantar Dari Sekolah </label>
                        @elseif($kolom=='dupak')
                        <label class="col-sm-4 label-on-left">DUPAK </label>
                        @elseif($kolom=='surat_pernyataan1')
                        <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Pembelajaran </label>
                        @elseif($kolom=='surat_pernyataan2')
                        <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Tugas Tambahan </label>
                        @elseif($kolom=='surat_pernyataan3')
                        <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan PKB </label>
                        @elseif($kolom=='pembagian_tugas')
                        <label class="col-sm-4 label-on-left">SK Pembagian Tugas </label>
                        @elseif($kolom=='pak')
                        <label class="col-sm-4 label-on-left">PAK Terakhir </label>
                        @elseif($kolom=='pkg')
                        <label class="col-sm-4 label-on-left">Laporan / form PKG </label>
                        @elseif($kolom=='skp')
                        <label class="col-sm-4 label-on-left">SKP </label>
                        @endif
                            <div class="col-sm-7">
                                    <label class="control-label"></label>
                                    <input type="file" style="margin-top:1%" name="berkas">
                                    <input type="hidden" value="{{$kolom}}" name="kolom">
                            </div>
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