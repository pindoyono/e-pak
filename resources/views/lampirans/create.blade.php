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
                    <h4 class="card-title">Form Tambah Alasan</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('lampirans.index')}}" class="btn btn-success">List Lampiran 2  <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('lampirans.store')}}" method="POST">

                        @csrf
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Jenis</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  placeholder="Jenis" type="text" name="jenis"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Kode</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  placeholder="Kode" type="text" name="kode"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Alasan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea name="diskripsi" id="alasan" cols="100" rows="10" required="true"> </textarea>
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Saran</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea name="saran" id="saran" cols="100" rows="10" required="true"> </textarea>
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


@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
@endsection