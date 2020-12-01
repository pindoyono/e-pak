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
                <h2 class="card-title"> Rekap Kenaikan Pangkat</h2>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Nama</th>
                                    <th colspan="2">USULAN GOL.</th>
                                    <th colspan="4">Angka Kredit</th>
                                    <th colspan="4">PD</th>
                                    <th colspan="4">PI KI</th>
                                    <th rowspan="2">Keterangan</th>
                                    <th rowspan="2">Penilai</th>
                                </tr>
                                <tr>
                                    <th>Dari</th>
                                    <th>Ke</th>
                                    <th>Diperoleh</th>
                                    <th>Wajib</th>
                                    <th>+/-</th>
                                    <th>Ket</th>
                                    <th>Diperoleh</th>
                                    <th>Wajib</th>
                                    <th>+/-</th>
                                    <th>Ket</th>
                                    <th>Diperoleh</th>
                                    <th>Wajib</th>
                                    <th>+/-</th>
                                    <th>Ket</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $data)
                                <tr>
                                    <td> {{$key+1}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{ substr($data->pangkat,-5)}}</td>
                                    <td>{{ substr(check_naik_pangkat($data->idj)->pangkat,-5)  }}</td>
                                    <td>
                                        {{
                                            number_format(
                                            json_decode($data->ijazah_tdk_sesuai)->total +
                                            json_decode($data->pendukung)->total +
                                            json_decode($data->pendidikan)->total + 
                                            json_decode($data->prajabatan)->total  +
                                            json_decode($data->pembelajaran)->total +
                                            json_decode($data->bimbingan)->total +
                                            json_decode($data->tugas_lain)->total +
                                            json_decode($data->pd)->total +
                                            json_decode($data->pi)->total +
                                            json_decode($data->ki)->total +
                                            $data->dasus 
                                            ,3)


                                        }}
                                    </td>
                                    <td>
                                        {{ 
                                            number_format(
                                            check_jabatan($data->pangkat_golongan , 'target')
                                            ,3) 
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            number_format(

                                            number_format(
                                            json_decode($data->ijazah_tdk_sesuai)->total +
                                            json_decode($data->pendukung)->total +
                                            json_decode($data->pendidikan)->total + 
                                            json_decode($data->prajabatan)->total  +
                                            json_decode($data->pembelajaran)->total +
                                            json_decode($data->bimbingan)->total +
                                            json_decode($data->tugas_lain)->total +
                                            json_decode($data->pd)->total +
                                            json_decode($data->pi)->total +
                                            json_decode($data->ki)->total +
                                            $data->dasus 
                                            ,3) 
                                            
                                            -

                                            number_format(
                                            check_jabatan($data->pangkat_golongan , 'target')
                                            ,3) 

                                            ,3) 

                                        }}
                                    </td>
                                    <td>
                                        @if(
                                            number_format(
                                            json_decode($data->ijazah_tdk_sesuai)->total +
                                            json_decode($data->pendukung)->total +
                                            json_decode($data->pendidikan)->total + 
                                            json_decode($data->prajabatan)->total  +
                                            json_decode($data->pembelajaran)->total +
                                            json_decode($data->bimbingan)->total +
                                            json_decode($data->tugas_lain)->total +
                                            json_decode($data->pd)->total +
                                            json_decode($data->pi)->total +
                                            json_decode($data->ki)->total +
                                            $data->dasus 
                                            ,3) 
                                            
                                            -

                                            number_format(
                                            check_jabatan($data->pangkat_golongan , 'target')
                                            ,3) <= 0
                                        )
                                        <span> Tidak Lolos</span>
                                        @else
                                        <span> Lolos</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{
                                            number_format(json_decode($data->pd)->total,3)
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3)
                                           
                                        }}
                                    </td>
                                    <td>
                                        {{
                                            number_format(
                                            number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3)
                                            ,3)
                                        }}
                                    </td>
                                    <td>
                                        @if(
                                            number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3) <= 0
                                        )
                                        <span> Tidak Lolos</span>
                                        @else
                                        <span> Lolos</span>
                                        @endif
                                    </td>
                                    <td>
                                            {{
                                                number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3)
                                            }}
                                    </td>
                                    <td>
                                            {{
                                                number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                                            }}
                                    </td>
                                    <td>
                                            {{
                                                number_format(
                                                number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                                                -
                                                number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                                                ,3)
                                            }}
                                    </td>
                                    <td>
                                        @if(
                                            number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3) <= 0
                                        )
                                        <span> Tidak Lolos</span>
                                        @else
                                        <span> Lolos</span>
                                        @endif
                                    </td>
                                    <td>
                                    @if(
                                            number_format(
                                            json_decode($data->ijazah_tdk_sesuai)->total +
                                            json_decode($data->pendukung)->total +
                                            json_decode($data->pendidikan)->total + 
                                            json_decode($data->prajabatan)->total  +
                                            json_decode($data->pembelajaran)->total +
                                            json_decode($data->bimbingan)->total +
                                            json_decode($data->tugas_lain)->total +
                                            json_decode($data->pd)->total +
                                            json_decode($data->pi)->total +
                                            json_decode($data->ki)->total +
                                            $data->dasus 
                                            ,3) 
                                            
                                            -

                                            number_format(
                                            check_jabatan($data->pangkat_golongan , 'target')
                                            ,3) >= 0

                                            
                                        )
                                        <span> Memenuhi Syarat</span>
                                        @else
                                        <span> Tidak Memenuhi Syarat</span>
                                        @endif
                                    </td>
                                    <td>
                                            {{
                                                $data->penilai
                                            }}
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
