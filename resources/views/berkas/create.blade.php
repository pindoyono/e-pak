@extends("layouts.global")

@section('title')
    Berkas Kepegawaian
@endsection
 
@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Bukti Fisik</h4>
                </div>
                <div class="card-content">
                    <div class="alert alert-warning">
                        <button type="button" aria-hidden="true" class="close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                            <b> Warning - </b>
                            Untuk Mengunggah file yg di izin kan dalam bentuk PDF dan berukuran Maksimal 10 Mb 
                            </span>
                    </div>
                    <div class="col-12 text-right">
                        <a href="{{route('berkas.bukti', Crypt::encrypt($dupak_id))}}" class="btn btn-success">List Bukti Fisik <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('berkas.simpan', Crypt::encrypt( $dupak_id ))}}" method="POST">

                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 label-on-left">Bukti Fisik</label>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <select class="js-example-basic-single form-control" required="true" width="70%" name="nama" >
                                    <option value="">Pilih Nama Bukti Fisik</option>
                                    @if(!empty($kegiatans))
                                        @foreach ($kegiatans as $kegiatan)
                                            <option value="{{$kegiatan->id}}">{{$kegiatan->kegiatan}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 label-on-left"> <h3>Berkas </h3></label>
                            <div class="col-sm-7">
                                    <label class="control-label"></label>
                                    <input type="file" style="margin-top:6%" name="berkas">
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