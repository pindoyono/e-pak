@extends('layouts.global')
@section('title')
    Managemen Pengguna
@endsection
 
@section('badge')
    Managemen Pengguna
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">location_city</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Sekolah</h4>
                        <div class="col-12 text-right">
                            <a href="{{route('sekolahs.create')}}" class="btn btn-success">Tambah Sekolah <div class="ripple-container"></div></a>
                        </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>NPSN</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                                @foreach($sekolahs as $sekolah)
                                <tr>
                                    
                                    <td>{{$sekolah->npsn}}</td>
                                    <td>{{$sekolah->nama}}</td>
                                    <td>{{$sekolah->jenis}}</td>
                                    <td>{{$sekolah->alamat}}</td>
                                    <td>{{$sekolah->status}}</td>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permane?')"  action="{{route('sekolahs.destroy', [$sekolah->id])}}"  method="POST">
                                                @csrf
                                                <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                    <i class="material-icons">zoom_in</i>
                                                <div class="ripple-container"></div></button> -->
                                                <a href="{{route('sekolahs.edit',$sekolah->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                                <!-- <input  type="submit"  value="Delete" class="btn btn-danger btn-sm"> -->
                                                    <i data-id="{{$sekolah->id}}" class="material-icons">close</i>
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
