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
                    <h4 class="card-title">Form Pengaturan System</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('setups.index')}}" class="btn btn-success">Kembali <div class="ripple-container"></div></a>
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
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('setups.store')}}" method="POST">

                        @csrf
                        <div class="col-md-2">
                            <label class="label-on-left">Deadline Guru</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <div class="input-group date">
                                <input type="text" name="deadline_guru" value="10/10/2020" class="form-control datepicker"/>
                            </div>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-2">
                            <label class="label-on-left">Deadline Verifikator</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <div class="input-group date">
                                <input type="text" name="deadline_verifikator" value="10/10/2020" class="form-control datepicker"/>
                            </div>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-2">
                            <label class="label-on-left">Deadline Penilai</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <div class="input-group date">
                                <input type="text" name="deadline_penilai" value="10/10/2020" class="form-control datepicker"/>
                            </div>
                            <span class="material-input"></span></div>
                        </div>
                        <div class="col-md-2">
                            <label class="label-on-left">Group ID Telegram</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <div class="input-group date">
                                <input type="text" name="group_id" value="" class="form-control"/>
                            </div>
                            <span class="material-input"></span></div>
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