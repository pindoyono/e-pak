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
                    <h4 class="card-title">Form Edit Berkas</h4>
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
                        <a href="{{route('kepegawaians.index')}}" class="btn btn-success">List Kepegawaian <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('kepegawaians.update', Crypt::encrypt($kolom) )}}" method="POST">

                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                        <div class="row">

                            <label class="col-sm-4 label-on-left"> <h3>Perbaikan Berkas </h3></label>
                            <div class="col-sm-7">
                                    <label class="control-label"></label>
                                    <input type="file" style="margin-top:6%" name="berkas">
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