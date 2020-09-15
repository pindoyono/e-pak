@extends("layouts.global")

@section('title')
    Managemen Sekolah
@endsection

@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">today</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Datetime Picker</h4>
                        <div class="form-group">
                            <label class="label-control">Datetime Picker</label>
                            <input type="text" class="form-control datetimepicker" value="10/05/2016" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">library_books</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Datetime Picker</h4>
                        <div class="form-group">
                            <label class="label-control">Date Picker</label>
                            <input type="text" class="form-control datepicker" value="10/10/2016" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">av_timer</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Datetime Picker</h4>
                        <div class="form-group">
                            <label class="label-control">Time Picker</label>
                            <input type="text" class="form-control timepicker" value="14:00" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-6">
                                <legend>Sliders</legend>
                                <div id="sliderRegular" class="slider"></div>
                                <div id="sliderDouble" class="slider slider-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
@endsection


@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        md.initSliders()
        demo.initFormExtendedDatetimepickers();
    });
</script>

@endsection