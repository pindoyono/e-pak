@extends("layouts.global")

@section("title") Form Tambah Pengguna @endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Role</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('roles.index')}}" class="btn btn-success">List Roles <div class="ripple-container"></div></a>
                    </div>
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('roles.store')}}" method="POST">

                        @csrf
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Role</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Role" {{$errors->first('name') ? "is-invalid": ""}}" type="text" name="name"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                    <div class="invalid-feedback">  {{$errors->first('name')}}</div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Permission</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" name="permission"  {{$errors->first('permission') ? "is-invalid": ""}}" aria-required="true" value="" data-role="tagsinput" >
                                    <span class="material-input"></span>
                                    <div class="invalid-feedback">  {{$errors->first('name')}}</div>

                                </div>
                            </div>
                        </div> -->

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