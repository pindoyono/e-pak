@extends("layouts.global")

@section('title')
    Managemen Sekolah
@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Sekolah</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('sekolahs.index')}}" class="btn btn-success">List Sekolah <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('sekolahs.update',$sekolah->id)}}" method="POST">

                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">NPSN</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="NPSN Sekolah" value="{{$sekolah->npsn}}" type="text" name="npsn"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Jenis Sekolah</label>
                            <div class="col-sm-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$sekolah->jenis == "SMA" ? "checked" : ""}} name="jenis" value="SMA" checked="true">  <b> SMA </b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$sekolah->jenis == "SMK" ? "checked" : ""}} value="SMK" name="jenis"> <b>SMK</b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$sekolah->jenis == "SLB" ? "checked" : ""}} value="SLB" name="jenis"> <b>SLB</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Sekolah</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Sekolah" value="{{$sekolah->nama}}" type="text" name="nama"  required="true" number="true">
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Status</label>
                            <div class="col-sm-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$sekolah->status == "NEGERI" ? "checked" : ""}}  name="status" value="Negeri">  <b> Negeri </b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$sekolah->status == "SWASTA" ? "checked" : ""}}  value="Swasta" name="status"> <b>Swasta</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Alamat</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Alamat" value="{{$sekolah->alamat}}" type="text" name="alamat">
                                    <span class="material-input"></span>
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