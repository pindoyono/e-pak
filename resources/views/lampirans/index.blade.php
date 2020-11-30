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
                <h2 class="card-title">Daftar Lampiran 2 PKB (Buku 5)</h2>
                <div class="card-content">
                    <form action="{{ route('lampirans.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-sm-12">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Import Lampiran</button>
                        <a class="btn btn-warning" href="{{ route('lampirans.export') }}">Export Lampoiran</a>
                    </form>
                    <div class="col-7 text-right">
                        <a href="{{route('lampirans.create')}}" class="btn btn-success">Tambah ALASAN <div class="ripple-container"></div></a>
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
                                    <th>Jenis</th>
                                    <th>Kode</th>
                                    <th>Alasan</th>
                                    <th>Saran</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $data)
                                <tr>
                                    <th class="text-center">{{$key+1}}</th>
                                    <th>{{$data->jenis}}</th>
                                    <th>{{$data->kode}}</th>
                                    <th>{{$data->diskripsi}}</th>
                                    <th>{{$data->saran}}</th>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Delete this user permanently?')"  action="{{route('lampirans.destroy',$data->id)}}"  method="POST">
                                                @csrf
                                                <a href="{{route('lampirans.edit',$data->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
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
