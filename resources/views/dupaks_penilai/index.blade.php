@extends('layouts.global')
@section('title')
    Usulan DupaK
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
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">assignment</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Daftar Usulan PAK</h4>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pengusul</th>
                                    <th>Sekolah</th>
                                    <th>Periode Usulan</th>
                                    <th>Status Usulan</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dupaks as $key => $dupak)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$dupak->name}}</td>
                                    <td>{{$dupak->nama}}</td>
                                    <td>{{ tgl_indo($dupak->awal) .' s/d '.tgl_indo($dupak->akhir)}}</td>
                                    <td>  <span class="tag label label-primary">{{$dupak->status}}</span></td>
                                    <td class="td-actions text-right">
                                    @role('verifikator')
                                        @if($dupak->status=='submit')
                                            <a href="{{route('verifikasi.edit', Crypt::encrypt($dupak->id))}}">
                                            <button class="btn btn-info btn-round">
                                                Verifikasi
                                            </button>
                                            </a>
                                        @endif
                                    @endrole
                                    @role('penilai')
                                    <a href="{{route('dupaks_penilai.berita_acara', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-info btn-round">
                                        Berita Acara
                                      </button>
                                    </a>
                                    @endrole
                                    <a href="{{route('dupaks_penilai.show', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-success btn-round">
                                        Lihat Detail
                                      </button>
                                    </a>
                                    <a href="{{route('verifikasi.email')}}">
                                      <button class="btn btn-success btn-round">
                                        Kirim Email
                                      </button>
                                    </a>
                                    </td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
