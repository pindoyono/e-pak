@extends('layouts.global')
@section('title')
    Usulan Dupak
@endsection

@section('content')      
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Dupak</h4>
                </div>
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
                    <td><select class="js-example-basic-single form-control" name="name[]" id=""> @if(!empty($kegiatans))@foreach ($kegiatans as $kegiatan)<option value="{{$kegiatan->id}}">{{$kegiatan->kegiatan}}</option> @endforeach @endif</select></td>
                    
                        <div class="table-responsive">
                            <form method="post" id="dynamic_form">
                                    <span id="result"></span>
                                <table class="table table-bordered table-striped" id="user_table">
                                    <thead>
                                        <tr>
                                            <th width="45%">PENETAPAN ANGKA KREDIT</th>
                                            <th width="10%">LAMA</th>
                                            <th width="10%">BARU</th>
                                            <th width="10%">JUMLAH</th>
                                            <th width="15%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <!-- <tfoot>
                                        <tr>
                                    <td colspan="2" align="right">&nbsp;</td>
                                        <td>
                                        @csrf
                                        </td>
                                        </tr>
                                    </tfoot> -->
                                </table>
                                        <input type="submit" name="save" id="save" class="btn btn-primary" value="Save" />
                                        <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                            </form>
                        </div>
                <div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>         
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>


<script>
$(document).ready(function(){

 var count = 1;

 dynamic_field(count);

 function dynamic_field(number)
 {
  html = '<tr>';
        
        html += '<td><select class="js-example-basic-single form-control" name="name[]" id=""> @if(!empty($kegiatans))@foreach ($kegiatans as $kegiatan)<option value="{{$kegiatan->id}}">{{$kegiatan->kegiatan}}</option> @endforeach @endif</select></td>';
        // html += '<select class="js-example-basic-single form-control" name="name[]" id=""> @if(!empty($kegiatans)) @foreach ($kegiatans as $kegiatan) <option value="{{$kegiatan->id}}">{{$kegiatan->kegiatan}}</option>@endforeach @endif </select>';
        html += '<td><input type="text" name="last_name[]" class="form-control" /></td>';
        html += '<td><input type="text" name="last_name1[]" class="form-control" /></td>';
        html += '<td><input type="text" name="jumlah[]" class="form-control" /></td>';
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            $('tbody').append(html);
        }
        else
        {   
           
        }
 }

 $(document).on('click', '#add', function(){
  count++;
  dynamic_field(count);
 });

 $(document).on('click', '.remove', function(){
  count--;
  $(this).closest("tr").remove();
 });

 $('#dynamic_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:'',
            method:'post', 
            data:$(this).serialize(),
            dataType:'json',
            beforeSend:function(){
                $('#save').attr('disabled','disabled');
            },
            success:function(data)
            {
                if(data.error)
                {
                    var error_html = '';
                    for(var count = 0; count < data.error.length; count++)
                    {
                        error_html += '<p>'+data.error[count]+'</p>';
                    }
                    $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                }
                else
                {
                    dynamic_field(1);
                    $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                }
                $('#save').attr('disabled', false);
            }
        })
 });

});
</script>



@endsection
