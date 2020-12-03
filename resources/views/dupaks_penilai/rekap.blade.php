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
                    <div class="col-7 text-right">
                        <a href="{{route('dupaks_penilai.scrap_rekap')}}" target="_blank" class="btn btn-success"> Export Excel <div class="ripple-container"></div></a>
                    </div>
                    <div class="material-datatables card-content table-responsive table-full-width">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover table-hover" cellspacing="0" width="100%" style="width:100%">
                             <thead>
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Status</th>
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
                                    <td>
                                        @if($data->cek == 'OK')
                                            <button class="material-icons icon-image-preview btn-primary">done_outline</button>
                                        @elseif($data->cek == 'FAIL')
                                            <button class="material-icons icon-image-preview btn-danger">clear</button>
                                        @endif
                                    </td>
                                    <td>
                                            <a target="_blank" href="{{route('dupaks_penilai.createPDF', Crypt::encrypt($data->dupak_id))}}">
                                                {{$data->name}}
                                            </a>
                                    </td>
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
                                            ,3) < 0
                                        )
                                        <span> Tidak Lolos</span>
                                        @else
                                        <span> Lolos</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{
                                            number_format(json_decode($data->pd)->total,3) + number_format(json_decode($data->prajabatan)->total,3)
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
                                            (number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3)) 
                                            + number_format(json_decode($data->prajabatan)->total,3)
                                            ,3)
                                        }}
                                    </td>
                                    <td>
                                        @if(
                                            ( number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3) )
                                              +  number_format(json_decode($data->prajabatan)->total,3)
                                             < 0
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
                                                number_format(
                                                number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                                                -
                                                number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                                                ,3) < 0
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
                                            
                                            &&
                                            
                                            number_format(json_decode($data->pd)->total,3) - number_format(check_jabatan($data->pangkat_golongan , 'akpkbpd'),3) >= 0

                                            &&

                                                number_format(
                                                number_format( number_format(json_decode($data->pi)->total,3) + number_format(json_decode($data->ki)->total,3) ,3) 
                                                -
                                                number_format( check_jabatan($data->pangkat_golongan , 'akpkbpiki'),3)
                                                ,3) >= 0

                                            
                                        )

                                                @role('admin provinsi')
                                                    <a target="_blank" href="{{route('dupaks_penilai.create_pak_PDF', Crypt::encrypt($data->dupak_id))}}">
                                                        <span> Memenuhi Syarat</span>
                                                    </a>
                                                @else
                                                    <span> Memenuhi Syarat</span>
                                                @endrole
                                        @else
                                            @role('admin provinsi')
                                                    <a target="_blank" href="{{route('dupaks_penilai.create_pak_PDF', Crypt::encrypt($data->dupak_id))}}">
                                                        <span> Tidak Memenuhi Syarat</span>
                                                    </a>
                                                @else
                                                    <span> Tidak Memenuhi Syarat</span>
                                                @endrole
                                                
                                        @endif
                                    </td>
                                    <td style="display:inline" class="row">
                                            {{
                                                $data->penilai
                                            }}

                                            @role('verifikator')
                                                <form style="display:inline" enctype="multipart/form-data" class="form-horizontal"  action="{{ route('dupaks_penilai.cek_ok', Crypt::encrypt($data->dupak_id)) }}" method="POST">
                                                @csrf
                                                    <input type="hidden" value="PUT" name="_method">
                                                    <button class="material-icons icon-image-preview btn-primary">done_outline</button>
                                                </form>
                                                <form style="display:inline" enctype="multipart/form-data" class="form-horizontal"  action="{{ route('dupaks_penilai.cek_fail', Crypt::encrypt($data->dupak_id)) }}" method="POST">
                                                @csrf
                                                    <input type="hidden" value="PUT" name="_method">
                                                    <button class="material-icons icon-image-preview btn-danger">clear</button>
                                                </form>
                                            @endrole
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });


        var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>


<!--  DataTables.net Plugin    -->
<script src="{{asset('material/js/jquery.datatables.js')}}"></script>

@endsection