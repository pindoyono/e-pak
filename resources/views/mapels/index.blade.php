@extends('layouts.global')
@section('title')
    Managemen Mata Pelajaran
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">library_books</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Mata Pelajaran</h4>
                    <form action="{{ route('mapels.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-sm-12">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Import Mata Pelajaran</button>
                        <a class="btn btn-warning" href="{{ route('mapels.export') }}">Export Mata Pelajaran</a>
                    </form>
                        <div class="col-12 text-right">
                            <a href="{{route('mapels.create')}}" class="btn btn-success">Tambah Mapel <div class="ripple-container"></div></a>
                        </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Keterangan</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mapels as $key => $mapel )
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$mapel->nama}}</td>
                                    <td>{{$mapel->jenis}}</td>
                                    <td>{{$mapel->keterangan}}</td>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permanen?')"  action="{{route('mapels.destroy', [$mapel->id])}}"  method="POST">
                                                @csrf
                                                <a href="{{route('mapels.edit',$mapel->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                                     <i data-id="{{$mapel->id}}" class="material-icons">close</i>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
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
