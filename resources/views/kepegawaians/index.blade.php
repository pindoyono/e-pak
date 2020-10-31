@extends('layouts.global')
@section('title')
    Berkas Kepegawaian
@endsection

@section('content')      
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="fas fa-files-o"></i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Berkas Kepegawaian</h4>
                        @if($jumlah==0)
                        <div class="col-12 text-right">
                            <a href="{{route('kepegawaians.create')}}" class="btn btn-success">Upload Berkas <div class="ripple-container"></div></a>
                        </div>
                        @endif
                        @foreach($kepegawaians as $key => $kepegawaian )
                        <div class="col-md-12">
                            <div class="table-responsive table-sales">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
                                                NO
                                            </td>
                                            <td>
                                                Nama Berkas
                                            </td>
                                            <td>Data</td>
                                            <td class="text-right">
                                                Action
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                1                                            
                                            </td>
                                            <td>
                                                SK CPNS
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_cpns)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('sk_cpns'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2                                            
                                            </td>
                                            <td>
                                                SK Pangkat Terakhir
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_pangkat)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('sk_pangkat'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3                                            
                                            </td>
                                            <td>
                                                SK Jafung Terakhir
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_jafung)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('sk_jafung'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                4                                            
                                            </td>
                                            <td>
                                                IJAZAH
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->ijazah)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('ijazah'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                5                                            
                                            </td>
                                            <td>
                                                Kartu Pegawai
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->karpeg)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('karpeg'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @if($tahun_nip<='2016')
                                        <tr>
                                            <td>
                                                6                                            
                                            </td>
                                            <td>
                                                SK Pengalihan Kab ke Prov
                                            </td>
                                            <td><a target="_blank" href="{{asset('storage/'.$kepegawaian->sk_penyesuaian)}}">Download</a></td>
                                            <td class="text-right">
                                                <a href="{{route('kepegawaians.edit', Crypt::encrypt('sk_penyesuaian'))}}">
                                                    <button class="btn btn-info btn-round btn-sm">
                                                        edit
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach 
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
