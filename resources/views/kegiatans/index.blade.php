@extends('layouts.global')
@section('title')
    Managemen Pengguna
@endsection

<!--  -->


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
                    <i class="material-icons"><i class="fas fa-layer-group"></i></i>
                </div>
                <h2 class="card-title">Rincian Kegiatan Guru dan Angka Kreditnya</h2>
                <div class="card-content">
                    <form action="{{ route('kegiatans.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-sm-12">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Import User Data</button>
                        <a class="btn btn-warning" href="{{ route('kegiatans.export') }}">Export User Data</a>
                    </form>
                    <div class="col-7 text-right">
                        <a href="{{route('kegiatans.create')}}" class="btn btn-success">Tambah Kegiatan <div class="ripple-container"></div></a>
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th>Unsur</th>
                                    <th>Sub Unsur</th>
                                    <th>Kegiatan</th>
                                    <th>kode</th>
                                    <th>Satuan Hasil</th>
                                    <th>Angka Kredit</th>
                                    <th>Pelaksana</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kegiatans as $key => $kegiatan)
                                <tr>
                                    <!-- <th>{{mb_substr($kegiatan->sub_unsur,0,10)."..."}}</th>
                                    <th>{{mb_substr($kegiatan->kegiatan,0,10)."..."}}</th> -->
                                    <th class="text-center">{{$key+1}}</th>
                                    <th>{{$kegiatan->unsur}}</th>
                                    <th>{{$kegiatan->sub_unsur}}</th>
                                    <th>{{$kegiatan->kegiatan}}</th>
                                    <th>{{$kegiatan->kode}}</th>
                                    <th>{{$kegiatan->satuan_hasil}}</th>
                                    <th>{{$kegiatan->angka_kredit}}</th>
                                    <th>{{$kegiatan->pelaksana}}</th>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Delete this user permanently?')"  action="{{route('jabatans.destroy',$kegiatan->id)}}"  method="POST">
                                                @csrf
                                                <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                    <i class="material-icons">zoom_in</i>
                                                <div class="ripple-container"></div></button> -->
                                                <a href="{{route('kegiatans.edit',$kegiatan->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <!-- <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title=""> -->
                                                <!-- <input  type="submit"  value="Delete" class="btn btn-danger btn-sm"> -->
                                                    <!-- <i class="material-icons">close</i> -->
                                                <!-- </button> -->
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


@endsection
