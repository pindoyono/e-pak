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
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Tambah Usulan</h4>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-12 text-right">
                        <a href="{{route('dupaks.index')}}" class="btn btn-success">List Usulan <div class="ripple-container"></div></a>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('dupaks.update', Crypt::encrypt($dupaks->id) )}}" method="POST">
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-4 label-on-left">Periode Pengusulan</label>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div class="input-group date">
                                            <input type="text" name="awal" value="{{date('m/d/y',strtotime($dupaks->awal))}}" class="form-control datepicker"/>
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
                                            <input type="text" name="akhir" value="{{date('m/d/y',strtotime($dupaks->akhir))}}" class="form-control datepicker"/>
                                        </div>
                                        <span class="material-input"></span></div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-4 label-on-left">Surat Pengantar Dari Sekolah</label>
                                <div class="col-sm-8">
                                    <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->surat_pengantar)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('surat_pengantar')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">DUPAK</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->dupak)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('dupak')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Pembelajaran</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->surat_pernyataan1)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('surat_pernyataan1')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan Tugas Tambahan</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->surat_pernyataan2)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('surat_pernyataan2')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">Surat Pernyataan Melaksanakan PKB</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->surat_pernyataan3)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('surat_pernyataan3')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">SK Pembagian Tugas Ganjil</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->pembagian_tugas)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('pembagian_tugas')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">SK Pembagian Tugas Genap</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->pembagian_tugas_genap)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('pembagian_tugas_genap')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">PAK Terakhir / PAK Tahunan</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->pak)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('pak')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <label class="col-sm-4 label-on-left">Laporan / form PKG</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->pkg)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('pkg')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <label class="col-sm-4 label-on-left">SKP</label>
                                <div class="col-sm-8">
                                <div class="row" style="padding:2%">
                                        <a class="col-sm-2" target="_blank" href="{{asset('storage/'.$dupaks->skp)}}">
                                            <span class="btn btn-info btn-sm">
                                                lihat
                                            </span>
                                        </a>
                                        <a href="{{route('dupaks.ubah',['id'=>Crypt::encrypt($dupaks->id),'name'=>Crypt::encrypt('skp')])}}">
                                            <span class="btn btn-primary btn-sm">
                                                edit
                                            </span>
                                        </a>
                                    </div>
                                </div>

                        </div>
                            <div class="col-md-12">
                                <div id="sliderRegular" style="display:none" class="slider"></div>
                                <div id="sliderDouble" style="display:none"  class="slider slider-info"></div>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Save"/>
                        
                    </form>
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
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>

@endsection