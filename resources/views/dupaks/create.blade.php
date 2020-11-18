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
                    <h4 class="card-title">Form Tambah Usulan</h4>
                </div>
                <div class="card-content">
                    <div class="alert alert-warning">
                        <button type="button" aria-hidden="true" class="close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                            <b> Warning - </b>
                            Untuk Mengunggah file yg di izin kan dalam bentuk PDF dan berukuran Maksimal 2 Mb 
                            Khusus untuk SK Pembagian Tugas Maksimal 5 Mb
                            </span>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('dupaks.index')}}" class="btn btn-success">List Dupak <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('dupaks.store')}}" method="POST">

                        @csrf
                        <div class="row">
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Periode Pengusulan</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <div class="input-group date">
                                                <input type="text" name="awal"  class="form-control datepicker"/>
                                            </div>
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="label-on-left">S/D</label>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                <div class="input-group date">
                                                <input type="text" name="akhir"  class="form-control datepicker"/>
                                            </div>
                                            <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Surat Pengantar Dari Sekolah</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="surat_pengantar">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">DUPAK</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="dupak">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Pembelajaran</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="surat_pernyataan1">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Bimbingan/Tugas Tertentu</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="surat_pernyataan2">
                                    <span>** Jika Tidak ada Silahkkan Di Kosongkan</span>
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Unsur Penunjang </label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="surat_pernyataan4">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan PKB</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="surat_pernyataan3">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SK Pembagian Tugas Ganjil</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="pembagian_tugas">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SK Pembagian Tugas Genap</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="pembagian_tugas_genap">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">PAK Terakhir / PAK Tahunan</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="pak">
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">Laporan / form PKG/PKKS</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="pkg">
                                   <br> 
                                   <span>*** FORM PERSETUJUAN, FORM 1C DAN 1D</span>
                                   <span>*** Rekapitulasi 14 Kompetensi Guru</span>
                            </div>
                            </div>
                            <div class="row">
                            <label class="col-sm-4 label-on-left">SKP</label>
                            <div class="col-sm-8">
                                    <label class="control-label"></label>
                                    <input type="file" name="skp">
                            </div>
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

@section('js')
<div class="col-md-6">
    <div id="sliderRegular" style="display:none" class="slider"></div>
    <div id="sliderDouble" style="display:none"  class="slider slider-info"></div>
</div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $('#sandbox-container .input-group.date').datepicker({
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>

@endsection