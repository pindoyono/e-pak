@extends('layouts.global')
@section('title')
    Managemen Pengguna
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons"><i class="fas fa-chart-line"></i></i>
                </div>
                <h2 class="card-title">Jenjang Jabatan Fungsional</h2>
                <div class="card-content">
                    <div class="col-7 text-right">
                        <a href="{{route('jabatans.create')}}" class="btn btn-success">Tambah Jabatan <div class="ripple-container"></div></a>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>Jabatan</th>
                                    <th>Pangkat/Golongan</th>
                                    <th>Target</th>
                                    <th>AKK</th>
                                    <th>AKPKB PD</th>
                                    <th>AKPKB PI/KI</th>
                                    <th>AKP</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jabatans as $key => $jabatan)
                                <tr>
                                    <th class="text-center">{{$key+1}}</th>
                                    <th>{{$jabatan->jabatan}}</th>
                                    <th>{{$jabatan->pangkat}}</th>
                                    <th>{{$jabatan->target}}</th>
                                    <th>{{$jabatan->akk}}</th>
                                    <th>{{$jabatan->akpkbpd}}</th>
                                    <th>{{$jabatan->akpkbpiki}}</th>
                                    <th>{{$jabatan->akp}}</th>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Delete this user permanently?')"  action="{{route('jabatans.destroy',$jabatan->id)}}"  method="POST">
                                                @csrf
                                                <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                    <i class="material-icons">zoom_in</i>
                                                <div class="ripple-container"></div></button> -->
                                                <a href="{{route('jabatans.edit',$jabatan->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                                <!-- <input  type="submit"  value="Delete" class="btn btn-danger btn-sm"> -->
                                                    <i class="material-icons">close</i>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>         
@endsection
@section('js')


@endsection
