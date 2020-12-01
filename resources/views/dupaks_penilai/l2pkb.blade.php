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
                <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('dupaks_penilai.lampiran_store', Crypt::encrypt($id) )}}" method="POST">

                    <input type="hidden" value="PUT" name="_method">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Judul PKB</label>
                        <div class="col-sm-7">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input class="form-control" placeholder="Judul PKB" name="judul" required="true" aria-required="true">
                                <span class="material-input"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 label-on-left">Kode Alasan / Saran</label>
                        <div class="col-sm-7">
                            <div class="col-lg-5 col-md-6 col-sm-3">
                                <select class="js-example-basic-single form-control" required="true" name="lampiran_id" width="70%" name="jenis_guru" >
                                <option value="">Pilih Kode</option>
                                @if(!empty($lampirans))
                                    @foreach ($lampirans as $lampiran)
                                        <option value="{{$lampiran->id}}">{{$lampiran->kode}}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>

                <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
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
                                            <form onsubmit="return confirm('Delete this user permanently?')"  action="{{route('dupaks_penilai.destroy', $data->idp )}}"  method="POST">
                                                @csrf
                                                <!-- <a href="{{route('lampirans.edit',$data->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a> -->
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
<div class="col-md-6">
    <div id="sliderRegular" style="display:none" class="slider"></div>
    <div id="sliderDouble" style="display:none"  class="slider slider-info"></div>
</div>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $('#sandbox-container .input-group.date').datepicker({
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>

@endsection
