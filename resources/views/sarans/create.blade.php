@extends("layouts.global")

@section('title')
    Managemen Saran Dan Masukan
@endsection
@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Saran Dan Masukan</h4>
                </div>
                <div class="card-content">
                    <!-- <div class="col-12 text-right">
                        <a href="{{route('sekolahs.index')}}" class="btn btn-success">List Sekolah <div class="ripple-container"></div></a>
                    </div> -->
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('sarans.store')}}" method="POST">

                        @csrf
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Saran dan Masukan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea cols="10" rows="13" class="form-control" name="saran" id="input-description" type="text" placeholder="Tulis Saran Anda Disini.." required="true" aria-required="true"></textarea>
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