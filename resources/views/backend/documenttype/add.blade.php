@extends('backend.index')

<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('content')


<a href="{{  URL::previous() }}" class="btn bg-navy submitdata float-right"  type="submit"><i class="fa fa-angle-double-left"></i></a><br><br>
<div class="col-md-12">

<div class="card card-statistics">

    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Add New Document Type</h4>
        </div>


    </div>
    <div class="card-body">


        <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf



            <div class="form-row">
                <div class="col-md-12">
                    <label >Document Type</label>

                    <input type="text"  name="name" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ old('title')}}"
                    placeholder="Enter Document Type" onkeypress="return isAlfa(event)">

                </div>
            </div><br>
            

                   <button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>
                &nbsp;&nbsp;
            <!--<a href="{{ URL::previous() }}" type="button" class="btn  bg-navy" style="margin-left: 8px;">Cancel</a><br /><br />-->
            </div>


         </form>
</div>
</div>
</div>
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<script>
    $(document).ready(function(){
      var postURL = "/mdc/documenttype/save";
      var i=1;
      var limit = 5;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="sname[]" onkeypress="return isAlfa(event)"  autocomplete="off" maxlength="20" placeholder="Service Name" class="form-control name_list" /></td><td><input type="text" name="sprice1[]" maxlength="4" onkeypress="return isNumber(event)" placeholder="Service Price Before Discount" class="form-control name_list" /></td><td><input type="text" name="sprice2[]" placeholder="Service Price After Discount" maxlength="4" onkeypress="return isNumber(event)" class="form-control name_list" /></td>    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });



    });

    $(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();



     $.ajax({
        url: "/mdc/documenttype/save",
        data:new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           if (response.success) {

              $.toaster({ priority : 'Success', title : 'Success', message : 'New Document type Added Successfully'});
              window.location = '/mdc/documenttype/listing';


            }else{

                $.toaster({ priority : 'danger', title : 'Error', message : response.error });

            }
        },
        error:function(error){
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });


        }

        });
    });

</script>
