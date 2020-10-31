@extends('layouts.global')
@section('title')
    Pengaturan System
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                        <i class="fas fa-cog"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Pengaturan System</h4>
                        @if(count($setups)==0)
                            <div class="col-12 text-right">
                                <a href="{{route('setups.create')}}" class="btn btn-success">Pengaturan <div class="ripple-container"></div></a>
                            </div>
                        @endif
                    <div class="material-datatables">
                        <table id="" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Guru</th>
                                    <th>Verifikator</th>
                                    <th>Penilai</th>
                                    <th>Group Id Telegram</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($setups as $key => $setup)
                                <tr>
                                    
                                    <td>{{$key+1}}</td>
                                    <td>{{$setup->deadline_guru}}</td>
                                    <td>{{$setup->deadline_verifikator}}</td>
                                    <td>{{$setup->deadline_penilai}}</td>
                                    <td>{{$setup->group_id}}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{route('setups.edit',$setup->id)}}">
                                            <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
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
