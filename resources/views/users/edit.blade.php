@extends("layouts.global")

@section('title')
    Managemen Pengguna
@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Edit Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('users.index')}}" class="btn btn-success">List Pengguna <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('users.update', [$user->id])}}" method="POST">
                    
                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Lengkap" value="{{$user->name}}" type="text" name="name"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">NIP</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nomor Induk Pegawai" value="{{$user->nip}}" type="text" name="nip"  required="true" number="true">
                                    <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Email</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Alamat Email" value="{{$user->email}}"  type="text" name="email" email="true">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        @role('super admin')
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Chat Id Verified</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating column-sizing is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  placeholder="Chat Id Verified" value="{{$user->chat_id_verified}}"  type="text"  name="chat_id_verified" id="chat_id_verified">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="col-sm-2 ">
                        </div>
                        <div class="row col-sm-10">
                        <div class="card-header card-header-text">
                            <b><h3 class="card-title">Role Pengguna</h3></b>
                        </div>
                            @if(!empty($roles))
                                @foreach ($roles as $role)
                                    <div class="col-sm-12 checkbox-radios">
                                        <div class="checkbox">
                                            <label>
                                                @if(!empty($user->getRoleNames()))
                                                    <input name="roles[]" type="checkbox" {{in_array($role['name'], json_decode($user->getRoleNames())) ? "checked" : ""}}   id="roles" value="{{ $role['name'] }}">{{ $role['name'] }}    
                                                @else
                                                  Role Belum Dibuat
                                                @endif
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @endrole

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Password</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating column-sizing is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control"  placeholder="Password"  type="password"  name="password" id="password">
                                <span class="material-input"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Konfirmasi Password</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating column-sizing is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Konfirmasi Password" type="password" name="password_confirmation" id="password_confirmation">
                                <span class="material-input"></span></div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 label-on-left">Foto Profil</label>
                            <div class="col-md-4 col-sm-4">
                            @if($user->avatar)
                                <!-- <legend>Regular Image</legend> -->
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('storage/'.$user->avatar)}}"  alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change </span>
                                            <input id="avatar"  name="avatar" value="{{$user->avatar}}" type="file">
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            @else 
                                <!-- <legend>Regular Image</legend> -->
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset('material/img/placeholder.jpg')}}" alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input id="avatar"  name="avatar"  type="file">
                                        </span>
                                        <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            @endif
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