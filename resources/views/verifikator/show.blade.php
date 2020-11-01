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
                    <h4 class="card-title">Detail Perbaikan Data</h4>
                </div>
                <div class="card-content">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <input type="hidden" value="PUT" name="_method">
                        <div class="row">
                            <label class="col-sm-2 label-on-left"></label>
                            <label class="col-sm-7 label-on-left">{{$verif->pesan}}</label>
                        </div>
                <div>
                <div class="col-12 text-right">
                        <a href="{{route('dupaks.index')}}" class="btn btn-success">Kembali <div class="ripple-container"></div></a>
                    </div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>   

@endsection