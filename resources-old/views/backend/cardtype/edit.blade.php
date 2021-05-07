@extends('backend.index')


<style>
    .data {
  position: absolute;
  right: 32px;
  top: 0px;
  width: 32px;
  height: 32px;

}
.data:hover {
  opacity: 2;
}
.data:before, .data:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 2px;
  background-color: red;
}
.data:before {
  transform: rotate(45deg);
}
.data:after {
  transform: rotate(-45deg);
}


.has-error .select2-selection {
border-color: rgb(255 79 112) !important;
}

.select2-selection__rendered {
line-height: 31px !important;
}
.select2-container .select2-selection--single {
    height: 35px !important;
}
.select2-selection__arrow {
    height: 34px !important;
}



  </style>



@section('content')

 <a href="{{  URL::previous() }}" class="btn bg-navy submitdata float-right"  type="submit"><i class="fa fa-angle-double-left"></i></a><br><br>
<div class="col-md-12">

<div class="card card-statistics">

    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit Card Type</h4>
        </div>


    </div>
    <div class="card-body">


         <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf
          <!--<form class="mt-3 add_name" enctype="multipart/form-data"  id="add_name" method="POST" files=true >-->
          <!--@csrf-->

                <input type="hidden" value="{{ $cardtype->id }}" id="dataid">
            <div class="form-row">
                <div class="col-md-12">
                    <label >Enter Card Type</label>

                    <input type="text"   name="name" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $cardtype->name }}"
                    placeholder="Enter Card Type" onkeypress="return isAlfa(event)">

                </div>
            </div><br>
            <div class="form-row">
                <div class="col-md-12">
                    <label >Enter Card Price</label>

                    <input type="text"  maxlength="6" name="price"  onkeypress="return isNumber(event)"  class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $cardtype->price }}"
                    placeholder="Enter Card Price">

                </div>
            </div><br>

            <!--<button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>-->
               <button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>
             <!--<input type="button" name="submit" id="submit" class="btn bg-navy" value="Submit" /> -->
            &nbsp;&nbsp;
            <!--<a href="{{ URL::previous() }}" type="button" class="btn  bg-navy" style="margin-left: 8px;">Cancel</a><br /><br />-->


    </div>

</div>
@endsection

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<script>
    $(document).ready(function(){
      var id = $('#dataid').val();
      var postURL = "/mdc/cardtype/update/" + id;
      var i=1;
      var limit = 5;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="sname_new[]" onkeypress="return isAlfa(event)"  autocomplete="off" maxlength="20" placeholder="Service Name" class="form-control name_list" /></td><td><input type="text" name="sprice1_new[]" maxlength="4" onkeypress="return isNumber(event)" placeholder="Service Price Before Discount" class="form-control name_list" /></td><td><input type="text" name="sprice2_new[]" placeholder="Service Price After Discount" maxlength="4" onkeypress="return isNumber(event)" class="form-control name_list" /></td>    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });



    //   $('#submit').click(function(){
    //       $.ajax({
    //             url:postURL,
    //             method:"POST",
    //             //data: new FormData($("#add_name")[0]),
    //             data:$('#add_name').serialize(),
    //             type:'json',
    //             success:function(response)
    //             {
    //                 if (response.success) {


    //                   $.toaster({ priority : 'Success', title : 'Success', message : 'New Hospital Added Successfully'});
    //                   window.location = '/mdc/hospital/listing';


    //                 }else{

    //                     $.toaster({ priority : 'danger', title : 'Error', message : response.error });

    //                 }
    //             }

    //       });
    //   });


    $(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();

     $.ajax({
        url: "/mdc/cardtype/update/" + id,
        data:new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           if (response.success) {

              $.toaster({ priority : 'Success', title : 'Success', message : 'CardType Update Successfully'});
              window.location = '/mdc/cardtype/listing';


            }else{

                $.toaster({ priority : 'danger', title : 'Error', message : response.error });

            }
        },
        error:function(error){
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });


        }

        });
    });


 });


 jQuery(document).ready(function() {

    console.log('hi');
    jQuery('.delete').on('click',function(){
        var id = $(this).data('id');
        var cat = $(this).data('catid');

        swal({
          title: "Are you sure?",
          text: "You want to delete hospital image. Once deleted, you will not be able to recover this hospital image!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/hospital/' + cat + '/image/delete/' + id ,
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                     window.location='/mdc/hospital/edit/' + cat;

                },

            });
            swal("hospital image delete successfully",
            {
              icon: "success",
            });
          }
        });
    });
});


 function UpdateStatus(serviceid){

   var id = serviceid;
   var hospital_id = $('#dataid').val();

   swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this service !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/hospital/service/' + id ,
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                     window.location='/mdc/hospital/edit/' + hospital_id;

                },

            });
            swal("Service delete successfully",
            {
              icon: "success",
            });
          }
      });

}


</script>
</form>
