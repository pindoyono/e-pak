@extends("layouts.global")

@section('title')
    Verifikasi 
@endsection

@section("content")


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
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Verifikasi Usulan Dupak</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('dupaks_penilai.index')}}" class="btn btn-success">List Usulan <div class="ripple-container"></div></a>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('verifikasi.update',  Crypt::encrypt($dupak_id) )}}" method="POST">

                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Alamat</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea class="form-control" name="pesan" id="" cols="30" rows="10"></textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <a class="btn btn-info" href="{{route('verifikasi.verified',  Crypt::encrypt($dupak_id) )}}"> Data Lengkap </a>
                            <input class="btn btn-primary" type="submit" value="Kirim Pesan Perbaikan"/>
                        </div>
                    </form>
                <div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>   

@endsection