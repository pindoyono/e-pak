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
                    <h4 class="card-title">Daftar Usulan PAK</h4>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Periode Usulan</th>
                                    <th>Status Usulan</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dupaks as $key => $dupak)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ tgl_indo($dupak->awal) .' s/d '.tgl_indo($dupak->akhir)}}</td>
                                    <td>{{$dupak->status}}</td>
                                    <td class="td-actions text-right">
                                    <a href="{{route('dupaks_penilai.berita_acara', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-info btn-round">
                                        Berita Acara
                                      </button>
                                    </a>
                                    <a href="{{route('dupaks_penilai.show', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-success btn-round">
                                        Lihat Detail
                                      </button>
                                    </a>
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