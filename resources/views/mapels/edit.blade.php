@extends("layouts.global")

@section('title')
    Managemen Mata Pelajaran
@endsection
@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Edit Mata Pelajaran</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('mapels.index')}}" class="btn btn-success">List Sekolah <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('mapels.update',$mapel->id)}}" method="POST">

                    @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Jenis Sekolah</label>
                            <div class="col-sm-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$mapel->jenis == "UMUM" ? "checked" : ""}} value="UMUM" name="jenis" value="UMUM">  <b> UMUM </b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$mapel->jenis == "SMA" ? "checked" : ""}} value="SMA" name="jenis" value="SMA">  <b> SMA </b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{$mapel->jenis == "SMK" ? "checked" : ""}} value="SMK" value="SMK" name="jenis"> <b>SMK</b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="SLB" name="jenis"> <b>SLB</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Mata Pelajaran</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" value="{{$mapel->nama}}" placeholder="Nama Mata Pelajaran" type="text" name="nama"  required="true" number="true">
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Keteranagan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Keterangan"  value="{{$mapel->keterangan}}" type="text" name="keterangan">
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
