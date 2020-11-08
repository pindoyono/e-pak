@extends('layouts.global')
@section('title')
    Managemen Pengguna
@endsection


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
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">group</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Pengguna</h4>
                    <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12 col-sm-12">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <input type="file" name="file">
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Import User Data</button>
                        <a class="btn btn-warning" href="{{ route('users.export') }}">Export User Data</a>
                    </form>

                        <div class="col-12 text-right">
                            <a href="{{route('users.create')}}" class="btn btn-success">Tambah Pengguna <div class="ripple-container"></div></a>
                        </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Telegram</th>
                                    <th>Verified</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="disabled-sorting text-right">Actions</th>
                                </tr>
                            </thead>
                            <!-- <tfoot>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </tfoot> -->
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td width="10%" > 
                                        @if($user->avatar == 'avatars/saat-ini-tidak-ada-file.jpg')
                                            <img src="{{asset('material/img/saat-ini-tidak-ada-file.jpg')}}" alt="...">
                                        @else 
                                            <img src="{{asset('storage/'.$user->avatar)}}" width="10px"/> 
                                        @endif
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->nip}}</td>
                                    <td>{{$user->chat_id}}</td>
                                    <td>{{$user->chat_id_verified}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <span class="tag label label-info">{{ $v }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                            <form onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permanen?')"  action="{{route('users.destroy', [$user->id])}}"  method="POST">
                                                @csrf
                                                <!-- <button type="button" rel="tooltip" class="btn btn-info" data-original-title="" title="">
                                                    <i class="material-icons">zoom_in</i>
                                                <div class="ripple-container"></div></button> -->
                                                <a href="{{route('users.edit',$user->id)}}">
                                                    <button type="button" rel="tooltip" class="btn btn-warning" data-original-title="" title="">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                </a>
                                                <input  type="hidden"  name="_method" value="DELETE">
                                                <button type="submit" rel="tooltip" class="btn btn-danger" data-original-title="" title="">
                                                <!-- <input  type="submit"  value="Delete" class="btn btn-danger btn-sm"> -->
                                                    <i data-id="{{$user->id}}" class="material-icons">close</i>
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


<!--  DataTables.net Plugin    -->
<script src="{{asset('material/js/jquery.datatables.js')}}"></script>


@endsection
