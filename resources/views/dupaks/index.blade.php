@extends('layouts.global')
@section('title')
    Usulan DupaK
@endsection

@section('content')      
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-text" data-background-color="green">
                    <h4 class="card-title">Form Tambah Sekolah</h4>
                </div>
                <div class="card-content">
                    <div class="col-12 text-right">
                        <a href="{{route('kepegawaians.index')}}" class="btn btn-success">List Sekolah <div class="ripple-container"></div></a>
                    </div>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form enctype="multipart/form-data" class="form-horizontal"  action="" method="POST">

                        <input type="hidden" value="PUT" name="_method">
                        <div class="table-responsive"> 
                            <table class="table table-bordered" id="dynamic_field">  
                                <tr>
                                    <td>PENETAPAN ANGKA KREDIT</td>
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button>                                
                                    </td>
                                </tr>
                                <tr>  
                                    <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                    <td>LAMA</td>
                                    <td>BARU</td>
                                    <td>JUMLAH</td>
                                </tr>  
                                
                            </table>  
                            <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                        </div>
    
                        <!-- <input class="btn btn-primary" type="submit" value="Save"/> -->
                    </form>
                <div>
            </div>
        </div>
        <!-- end col-md-12 -->
    </div>
    <!-- end row -->
</div>         
@endsection

@section('js')

<script type="text/javascript">

$(document).ready(function(){      

  var postURL = "<?php echo url('addmore'); ?>";
  var i=1;  
  $('#add').click(function(){  

       i++;  

       $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  

  });  



  $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");   

       $('#row'+button_id+'').remove();  

  });  



  $.ajaxSetup({

      headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });



  $('#submit').click(function(){            

       $.ajax({  

            url:postURL,  

            method:"POST",  

            data:$('#add_name').serialize(),

            type:'json',

            success:function(data)  

            {

                if(data.error){

                    printErrorMsg(data.error);

                }else{

                    i=1;

                    $('.dynamic-added').remove();

                    $('#add_name')[0].reset();

                    $(".print-success-msg").find("ul").html('');

                    $(".print-success-msg").css('display','block');

                    $(".print-error-msg").css('display','none');

                    $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');

                }

            }  

       });  

  });  



  function printErrorMsg (msg) {

     $(".print-error-msg").find("ul").html('');

     $(".print-error-msg").css('display','block');

     $(".print-success-msg").css('display','none');

     $.each( msg, function( key, value ) {

        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

     });

  }

});  

</script>

@endsection
