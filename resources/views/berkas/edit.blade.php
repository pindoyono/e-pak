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
                    <h4 class="card-title">Form Tambah Bukti Fisik</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('berkas.bukti', Crypt::encrypt($berkas->id))}}" class="btn btn-success">List Bukti Fisik <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('berkas.update', Crypt::encrypt( $berkas->id ))}}" method="POST">

                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 label-on-left">Nama Bukti Fisik</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Bukti Fisik" value="{{$berkas->nama}}"  type="text" name="nama" required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 label-on-left"> <h3>Berkas </h3></label>
                            <div class="col-sm-7">
                                    <label class="control-label"></label>
                                    <input type="file" style="margin-top:6%" value="{{$berkas->berkas}}" name="berkas">
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