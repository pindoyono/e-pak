@extends("layouts.global")

@section('title')
    Managemen Sekolah
@endsection

@section("content")


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h2 class="card-title"><i class="fas fa-id-card"></i> Bio Data Guru</h2>
                </div>
                <div class="card-content">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form-horizontal"  action="{{route('biodatas.create_or_update', Crypt::encrypt(Auth::user()->id) )}}" method="POST">

                        <input type="hidden" value="PUT" name="_method">
                        @csrf
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Lengkap</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Lengkap" disabled type="text" name="name" value="{{Auth::user()->name}}"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                    <span>***untuk Merubah Nama silahkan edit pada menu profile</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">NIP</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Nama Lengkap" disabled type="text" name="name" value="{{Auth::user()->nip}}"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                    <span>***untuk Merubah NIP silahkan edit pada menu profile</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Pendidikan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="contoh S1 Pendidikan Kimia" type="text" name="pendidikan" value="{{$biodatas->pendidikan}}"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                    <span>***Sesuai dengan SK terakhir</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Mengajar Mapel</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="contoh Guru Mata Pelajaran Kimia" type="text" name="jenis_guru" value="{{$biodatas->jenis_guru}}"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Tugas Tambahan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="Walikelas/Wakil Kepsek dll" type="text" name="tugas_tambahan" value="{{$biodatas->tugas_tambahan}}"  required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Jenis Kelamin</label>
                            <div class="col-sm-7">
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{ $biodatas->jenis_kelamin == "Laki-Laki" ? "checked" : ""}} name="jenis_kelamin" value="Laki-Laki" checked="true">  <b> Laki-Laki </b>
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" {{ $biodatas->jenis_kelamin == "Perempuan" ? "checked" : ""}} value="Perempuan" name="jenis_kelamin"> <b>Perempuan</b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Nama Sekolah</label>
                            <div class="col-sm-7">
                                <div class="col-lg-5 col-md-6 col-sm-3">
                                    <select class="js-example-basic-single form-control" required="true" width="70%" name="sekolah_id" >
                                    <option value="">Pilih Sekolah</option>
                                    @if(!empty($sekolahs))
                                        @foreach ($sekolahs as $sekolah)
                                            <option {{ $biodatas->sekolah_id == $sekolah->id ? "selected" : ""}} value="{{$sekolah->id}}">{{$sekolah->nama}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input type="text" name="tempat_lahir" value="{{$biodatas->tempat_lahir}}" class="form-control" placeholder="">
                                            <span class="material-input"></span></div>
                                            <span>***Sesuai dengan SK terakhir</span>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="label-on-left">Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div class="input-group date">
                                            @if($biodatas->tanggal_lahir=='')
                                                <input type="text" name="tanggal_lahir" value="10/10/2020" class="form-control datepicker"/>
                                            @else
                                                <input type="text" name="tanggal_lahir" value="{{date('m/d/y',strtotime($biodatas->tanggal_lahir))}}" class="form-control datepicker"/>
                                            @endif
                                        </div>
                                        <span class="material-input"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Alamat</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <textarea cols="10" rows="3" class="form-control" name="alamat" id="input-description" type="text" placeholder="" required="true" aria-required="true">{{$biodatas->alamat}}</textarea>
                                    <span class="material-input"></span>
                                    <span>***Alamat Rumah Tempat Tinggal</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Agama</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="selectpicker col-sm-4" name="agama" data-style="btn btn-primary btn-round" title="Pilihan Agama" data-size="5">
                                        <option {{ $biodatas->agama == "ISLAM" ? "selected" : ""}} value="ISLAM">ISLAM</option>
                                        <option {{ $biodatas->agama == "KRISTEN" ? "selected" : ""}} value="KRISTEN">KRISTEN</option>
                                        <option {{ $biodatas->agama == "KATHOLIK" ? "selected" : ""}} value="KATHOLIK">KATHOLIK</option>
                                        <option {{ $biodatas->agama == "HINDU" ? "selected" : ""}} value="HINDU">HINDU</option>
                                        <option {{ $biodatas->agama == "BUDHA" ? "selected" : ""}} value="BUDHA">BUDHA</option>
                                        <option {{ $biodatas->agama == "KONGHUCU" ? "selected" : ""}} value="KONGHUCU">KONGHUCU</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">NUPTK</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="NUPTK" value="{{$biodatas->nuptk}}"  type="text" name="nuptk" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">No SK Terakhir</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="No SK Terakhir" value="{{$biodatas->no_sk_cpns}}" type="text" name="no_sk_cpns" required="true" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">TMT CPNS</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            @if($biodatas->tanggal_lahir=='')
                                                <input type="text" name="tmt_cpns" value="" required="true" class="form-control datepicker"/>
                                            @else
                                                <input type="text" name="tmt_cpns" required="true" value="{{date('m/d/y',strtotime($biodatas->tmt_cpns))}}" class="form-control datepicker"/>
                                            @endif
                                            <span class="material-input"></span></div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="label-on-left">TMT PNS</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <div class="input-group date">
                                            @if($biodatas->tanggal_lahir=='')
                                                <input type="text" name="tmt_pns" value="" class="form-control datepicker"/>
                                            @else
                                                <input type="text" name="tmt_pns" value="{{date('m/d/y',strtotime($biodatas->tmt_pns))}}" class="form-control datepicker"/>
                                            @endif
                                            </div>
                                        <span class="material-input"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">Pangkat dan Golongan</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="js-example-basic-single form-control" required="true"  name="pangkat_golongan"  width="70%" name="pangkat" >
                                       @if(!empty($jabatans))
                                            @foreach ($jabatans as $jabatan)
                                                <option {{$jabatan->pangkat == $biodatas->pangkat_golongan ? "selected" : ""}} value="{{$jabatan->id}}">{{$jabatan->pangkat}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 label-on-left">No KARPEG</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="No Kartu Pengawai" value="{{$biodatas->kartu_pegawai}}" type="text" name="kartu_pegawai" aria-required="true">
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <label class="col-sm-2 label-on-left">No Kartu Suami/Istri</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="No Kartu Suami/Istri"  type="text" name="karsu" value="{{$biodatas->karsu}}" >
                                    <span class="material-input"></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="row">
                            <label class="col-sm-2 label-on-left">No Handphone</label>
                            <div class="col-sm-7">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input class="form-control" placeholder="No Handphone" type="text" required="true" name="no_hp" value="{{$biodatas->no_hp}}" >
                                    <span class="material-input"></span>
                                </div>
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