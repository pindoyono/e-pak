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
                    
                    <div class="col-12 text-right">
                        <a href="{{route('dupaks.create')}}" class="btn btn-success">Tambah Usulan <div class="ripple-container"></div></a>
                    </div>
                    <div class="material-datatables">
                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                            <thead>
                                <tr>
                                <tr>
                                    <th>No</th>
                                    <th>Periode Usulan</th>
                                    <th>Keterangan</th>
                                    <th>Status Usulan</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dupaks as $key => $dupak)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{ tgl_indo($dupak->awal) .' s/d '.tgl_indo($dupak->akhir)}}</td>
                                    <td>{{ $dupak->karsu }}</td>
                                    @if($dupak->status=='Terverifikasi')
                                    <td>  <span class="tag label label-success">{{$dupak->status}} {{dinilai($dupak->id)}} </span></td>
                                    @else
                                    <td>  <span class="tag label label-primary">{{$dupak->status}} {{dinilai($dupak->id)}} </span></td>
                                    @endif
                                    <td class="td-actions text-right">
                                    @if($dupak->status=="Usulan Baru" || $dupak->status=="Perbaikan Data")
                                    <a href="{{route('berkas.bukti', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-info btn-round ">
                                        Upload Bukti Fisik
                                      </button>
                                    </a>
                                    <a href="{{route('dupaks.detail', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-success btn-round">
                                        Lihat Detail
                                      </button>
                                    </a>
                                    <a onclick="return confirm('Pastikan Usulan Anda Sudah Lengkap.. jika Sudah Submit Tidak bisa di rubah lagi')" href="{{route('dupaks.submit', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-primary btn-round">
                                        submit
                                      </button>
                                    </a>
                                    <a href="{{route('dupaks.edit', Crypt::encrypt($dupak->id))}}">
                                        <button type="button" rel="tooltip" class="btn btn-warning btn-round btn-sm" data-original-title="" title="">
                                            <i class="material-icons">edit</i> Edit Dupak
                                        </button>
                                    </a>
                                    <form  style="display:inline" onsubmit="return confirm('Apakah Akan Menghapus Data Secara Permane?')"  action="{{route('dupaks.destroy', Crypt::encrypt($dupak->id)   )}}"  method="POST">
                                      @csrf
                                      <input  type="hidden"  name="_method" value="DELETE">
                                      <button type="submit" rel="tooltip" class="btn btn btn-danger btn-round btn-sm" data-original-title="" title="">
                                          <i data-id="{{$dupak->id}}" class="material-icons">close</i> Hapus Dupak
                                      </button>
                                    </form>
                                    @else
                                    <a href="{{route('dupaks.detail', Crypt::encrypt($dupak->id))}}">
                                      <button class="btn btn-success btn-round">
                                        Lihat Detail
                                      </button>
                                    </a>
                                    @endif
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
