@extends('layouts.global')
@section('title')
    Usulan DupaK
@endsection

@section('content')      
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
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Daftar Usulan Pak</h4>
                    <div class="col-12 text-right">
                            <a href="{{route('dupaks.create')}}" class="btn btn-success">Tambah Usulan <div class="ripple-container"></div></a>
                        </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Periode Usulan</th>
                                    <th>Status Usulan</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                                @foreach($dupaks as $key => $dupak)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ tgl_indo($dupak->awal) .' s/d '.tgl_indo($dupak->akhir)}}</td>
                                    <td>{{$dupak->status}}</td>
                                    <td class="td-actions text-right">
                                    <a href="{{route('berkas.edit', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-info btn-round btn-sm">
                                        Upload Berkas
                                      </button>
                                    </a>
                                    <a href="{{route('dupaks.edit', Crypt::encrypt($dupak->id))}}">
                                        <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    <form  style="display:inline" onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permane?')"  action="{{route('dupaks.destroy', Crypt::encrypt($dupak->id)   )}}"  method="POST">
                                      @csrf
                                      <input  type="hidden"  name="_method" value="DELETE">
                                      <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                          <i data-id="{{$dupak->id}}" class="material-icons">close</i>
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
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>         
@endsection

@section('js')
  <script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>
@endsection
