@extends('layouts.global')
@section('title')
    Managemen Saran dan Masukan
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                <i class="fas fa-inbox "></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Saran Dan Masukan</h4>
                        <!-- <div class="col-12 text-right">
                            <a href="{{route('sekolahs.create')}}" class="btn btn-success">Tambah Sekolah <div class="ripple-container"></div></a>
                        </div> -->
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Pengirim</th>
                                    <th>Saran</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sarans as $key => $saran)
                                <tr>
                                    
                                    <td>{{$key++}}</td>
                                    <td>{{$saran->user_id}}</td>
                                    <td>{{$saran->saran}}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{route('sarans.show',$saran->id)}}">
                                            <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                <i class="fas fa-search"> Lihat</i>
                                            </button>
                                        </a>
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
