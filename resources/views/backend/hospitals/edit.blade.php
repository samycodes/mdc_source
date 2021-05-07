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
            <h4 class="card-title">Edit Hospital</h4>
        </div>


    </div>
    <div class="card-body">


         <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf
          
                <input type="hidden" value="{{ $hospital->id }}" id="dataid">
            <div class="form-row">
                <div class="col-md-12">
                    <label >Hospital Name</label>

                    <input type="text" onkeypress="return isAlfa(event)" name="name" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $hospital->name }}">

                </div>
            </div><br>
            <div class="form-row">
                <div class="col-md-12">
                    <label >Description</label>

                    <textarea type="text" name="description"  autocomplete="off" class="form-control @if($errors->has('description')) is-invalid @endif"   value="{{ old('description')}}" placeholder="Enter Description">{{ $hospital->description }}</textarea>

                </div>
            </div><br>
            <div class="form-row">

                <div class="col-md-3">
                <label >Country Code</label>
                  <input type="text" name="country_code" onkeypress="return countrycode(event)" maxlength="5"  value="{{ $hospital->country_code }}" class="form-control" placeholder="(+973)">
                </div>
                <div class="col-md-9">
                <label >Phone Number</label>
                  <input type="text" name="phone_number" value="{{ $hospital->phone_number }}" minlength="8"  class="form-control" maxlength="8"  placeholder="000-000-000">
                </div>

             </div><br>

             <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Address Details</b></h5><hr>
             <div class="form-row">
		<div class="pac-card col-md-12 row" id="pac-card">
                      <div>
                       
                        <div id="type-selector" class="pac-controls">
                          <input type="hidden" name="type" id="changetype-all" checked="checked" />
                          <!--<label for="changetype-all">All</label>-->
                
                          <input type="hidden" name="type" id="changetype-establishment" />
                          <!--<label for="changetype-establishment">Establishments</label>-->
                
                          <input type="hidden" name="type" id="changetype-address" />
                          <!--<label for="changetype-address">Addresses</label>-->
                
                          <input type="hidden" name="type" id="changetype-geocode" />
                          <!--<label for="changetype-geocode">Geocodes</label>-->
                        </div>
                        <div id="strict-bounds-selector" class="pac-controls">
                          <input type="hidden" id="use-strict-bounds" value="" />
                          <!--<label for="use-strict-bounds">Strict Bounds</label>-->
                        </div>
                      </div>
                      <div id="pac-container" class="col-md-12">
                        <input id="pac-input" type="text" autocomplete="off" name="latlongaddress" autocomplete="off"   class="form-control inputmask @if($errors->has('latlongaddress')) is-invalid @endif"  value="{{ $hospital->address }}" placeholder="Enter Full Address">
                      </div>
                    </div>
                    </div>
                    
                    <div id="map"></div>
                    <div id="infowindow-content">
                     
                      <span id="place-name" class="title"></span><br />
                      <span id="place-address"></span>
                    </div>


              <br>
             <div class="form-row" id="address">

                <div class="col-md-6">
                    <label >Address Latitude</label>
                    <input type="text" name="lat" readonly id="latitude"   autocomplete="off"  onkeypress="return latlon(event)" class="form-control inputmask @if($errors->has('lat')) is-invalid @endif"  value="{{ $hospital->address_latitude }}" placeholder="Enter Latitude">
                </div>
                 <div class="col-md-6">
                    <label >Address Longitude</label>
                    <input type="text" name="lon" autocomplete="off" readonly id="longitude"  onkeypress="return latlon(event)" class="form-control inputmask @if($errors->has('lon')) is-invalid @endif"  value="{{ $hospital->address_longitude}}" placeholder="Enter Longitude">
                </div>
            </div><br>

              <div class="form-row">

                <div class="col-md-6">
                    <label >Street</label>
                    <input type="text" name="street"  autocomplete="off" maxlength="40"  class="form-control inputmask @if($errors->has('street')) is-invalid @endif"  value="{{ $hospital->street }}" placeholder="Enter street"
                     placeholder="Enter Hospital Name"  onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32) ||
                                        (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 96 && event.charCode <= 105)">
                </div>
                 <div class="col-md-6">
                    <label >Unit/ House / Apartment No.</label>
                    <input type="text" name="apartment" onkeypress="return isNumber(event)" autocomplete="off"   class="form-control inputmask @if($errors->has('apartment')) is-invalid @endif"  value="{{ $hospital->apartment }}" placeholder="Enter Unit/ House / Apartment No">
                </div>


            </div><br>

             <div class="form-row">
             <div class="col-md-6">
                    <label >Province / State</label>
                    <input type="text" onkeypress="return isAlfa(event)" id="state" name="state" autocomplete="off"  class="form-control inputmask @if($errors->has('state')) is-invalid @endif"  value="{{ $hospital->state }}" placeholder="Enter Province / State">
                </div>



                <div class="col-md-6" >
                    <label >City / Town</label>
                    <input type="text"  onkeypress="return isAlfa(event)" id="locality" name="city" autocomplete="off"  class="form-control inputmask @if($errors->has('city')) is-invalid @endif"  value="{{ $hospital->city }}" placeholder="Enter City / Town">
                </div>

            </div><br>

             <div class="form-row">
                <div class="col-md-6">
                        <label >Country</label>
                        <input type="text" onkeypress="return isAlfa(event)" id="country-name" name="country" autocomplete="off"   class="form-control inputmask @if($errors->has('country')) is-invalid @endif"  value="{{ $hospital->country }}" placeholder="Enter Country">
                    </div>

                <div class="col-md-6">
                        <label >Office Address(optional)</label>
                        <input type="text"  name="office" onkeypress="return officeaddress(event)"  autocomplete="off"   class="form-control inputmask @if($errors->has('office')) is-invalid @endif"  value="{{ $hospital->office }}" placeholder="Enter office address">
                    </div>
                </div>


        <br>
        <hr>
        <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Working Details</b></h5><hr>

        <div class="form-row">
                <div class="col-md-12">
                    <label >Your Working Days</label>

                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Sunday" id="checkboxPrimary7" @if(in_array('Sunday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary7">Sunday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Monday" id="checkboxPrimary1" @if(in_array('Monday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary1">Monday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Tuesday" id="checkboxPrimary2" @if(in_array('Tuesday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary2">Tuesday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Wednesday" id="checkboxPrimary3" @if(in_array('Wednesday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary3">Wednesday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Thursday" id="checkboxPrimary4" @if(in_array('Thursday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary4">Thursday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Friday" id="checkboxPrimary5" @if(in_array('Friday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary5">Friday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;
                       <div class="icheck-primary d-inline">
                        <input type="checkbox" name="working_day[]" value="Saturday" id="checkboxPrimary6" @if(in_array('Saturday' , explode (",", $hospital->working_days ))) checked="" @endif>
                        <label for="checkboxPrimary6">Saturday
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;


                    </div>

                </div>
        </div><br>


           <div class="row">
                   <div class="bootstrap-timepicker col-md-6">
                          <div class="form-group">
                            <label>Your Start Of Working Time:</label>

                            <div class="input-group date" id="timepicker" data-target-input="nearest">
                              <input type="text" onkeydown="return false" autocomplete="off" name="start_time" value="{{ $hospital->start_time }}" class="form-control datetimepicker-input" data-target="#timepicker"/>
                              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                              </div>
                          </div>
                    </div>



                  <div class="bootstrap-timepicker col-md-6">
                          <div class="form-group">
                            <label>Your End Of Working Time:</label>

                            <div class="input-group date" id="timepicker1" data-target-input="nearest">
                              <input type="text" onkeydown="return false" autocomplete="off" name="end_time" value="{{ $hospital->end_time }}" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                              <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="far fa-clock"></i></div>
                              </div>
                              </div>

                          </div>

                    </div>

              </div>

              <img src="http://128.199.31.19/mdc/public/images/24.jpg" style="width: 7%;margin-left: 19%;">
          <div class="icheck-primary  d-inline text-center div" style="margin-left: 1%;padding-top: 15%;">
                      <input type="checkbox" name="hospital_time" value="true" id="checkboxPrimary111" @if($hospital->full_time == "true") checked @endif>
                      <label for="checkboxPrimary111" ><span class="div-1"><U>CLICK HERE</u> If you want to add the hospital time 24/7 Hr</span>
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="http://128.199.31.19/mdc/public/images/24.jpg" style="width: 7%;">
        
           <hr>
           <hr>
            <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Social Links</b></h5><hr>

             <div class="form-row">
                 <div class="col-md-2">
                    <label >Country Code</label>
                    <input type="text" name="country_code2" autocomplete="off" onkeypress="return countrycode(event)" maxlength="5"  data-mask="+91" maxlength="4" class="form-control inputmask @if($errors->has('country_code')) is-invalid @endif"  value="{{ $hospital->country_code2 }}" placeholder="(+973)">

                </div>


                 <div class="col-md-10">

                    <label >Mobile No.</label>
                    <input type="text" name="mobile_number" autocomplete="off" maxlength="8"   minlength="8"  class="form-control" value="{{$hospital->mobile_number }}" placeholder="Enter whatsapp No">
                </div>


            </div><br>

            <div class="form-row">

                <div class="col-md-3">
                    <label >Facebook Link</label>
                    <input type="text" name="facebook" autocomplete="off"   class="form-control" value="{{ $hospital->facebook_link }}" placeholder="https://www.facebook.com/">
                </div>
                 <div class="col-md-3">
                    <label >Instagram Link</label>
                    <input type="text" name="instagram" autocomplete="off"   class="form-control" value="{{ $hospital->instagram_link }}" placeholder="https://www.instagram.com/">
                </div>
                <div class="col-md-3">
                    <label >Twitter Link</label>
                    <input type="text" name="twitter" autocomplete="off" class="form-control"  value="{{ $hospital->twitter_link }}" placeholder="https://twitter.com/">
                </div>
                <div class="col-md-3">
                    <label >Website Link</label>
                    <input type="text" name="website" autocomplete="off"   class="form-control"  value="{{ $hospital->dribble_link }}" placeholder="https://anysite.com/">
                </div>


            </div><br>


             <hr>
                <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Browse Logo Image</b></h5><hr>
                <div class="row">
                    <div class="col-md-4"></div>
                  <div class="card col-md-3" style="margin-left: 8px;">
                    <div class="card-body">
                        <img src="{{ $hospital->logo }}" style="height: 100px;width: 200px;" />
                    </div>
                </div>
                <div class="col-md-4"></div>
                </div>

               <!--<div class="form-group">-->
               <!--         <fieldset class="form-group">-->
               <!--             <input type="file" class="form-control-file form-control" name="logo_image" id="exampleInputFile">-->
               <!--         </fieldset>-->
               <!--     </div>-->
               <!--       <span style="color:red">*Note [1. Image size should be 1000 kb&nbsp;&nbsp;   </span>-->
               <!--     <span style="color:red"> 2. Image dimension should be 200 * 200  ]</span>-->
            <hr>
            <div class="row">
                  <div class="col-md-4 text-center">
                  <div id="upload-demo"></div>
                  </div>
                  <div class="col-md-4" style="padding:5%;">
                  <strong>Select image to crop:</strong>
                  <input type="file" id="image" class="form-control" style="overflow: auto;">

                
                  <a class="btn btn-primary btn-block"  onclick="crop()" data-id="{{ $hospital->id }}" style="margin-top:2%">Crop Image</a>
                  

                  </div>

                  <div class="col-md-4">
                  <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                  </div>
            </div>

              <hr>
            <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Browse Multiple Images</b></h5><hr>

           @if($images)
           <div class="row">
            @foreach($images as $image)

                <div class="card col-md-3" style="margin-left: 8px;">
                    <div class="card-body">
                         <a class="data delete" data-id="{{ $image->id}}" data-catid="{{ $hospital->id }}" style="top:0px;margin-right: -27px;"></a>
                        <img src="{{ $image->image }}" style="height: 100px;width: 200px;" />
                    </div>
                </div>

            @endforeach
             </div>
           @endif



            <div class="form-group form-row">
                    <div class="input-group">
                <div class="form-group col-md-12">
                  <label for="exampleInputFile">Browse</label>
                  <input type="file" Multiple name="images[]" class="form-control" id="exampleInputFile">
                </div>
                <span style="color:red">*Note [1. Image size should be 1000 kb&nbsp;&nbsp;   </span>
                  <span style="color:red"> 2. Image dimension should be 600 * 600  ]</span>
                   
                </div>
              </div>

            <hr>
            <div class="spinner-grow text-center " style="text-align: center;margin-left: 45%;color:#001f3f;display: none;"></div>


            <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Hospital Offerable</b></h5><hr>

                      <div class="icheck-primary d-inline">
                        <input type="checkbox" name="offerable" value="1" id="checkboxPrimary10" @if($hospital->offerable == 1) checked @endif>
                        <label for="checkboxPrimary10"><U>CLICK HERE</u> If you want to add the offers at hospital.
                        </label>
                      </div>&nbsp;&nbsp;&nbsp;&nbsp;

                <!--services blog here-->
                 <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Services</b></h5><hr>
                @if($services)
                <div class="row">
                 <div class="table table-condensed">
                 <button type="button" name="add" id="add" class="btn btn-default float-right">Add Services</button>
                    <table class="table table-striped"  id="dynamic_field">
                         <thead>
                          <tr>
                            <th>Service</th>
                            <th>Price Before Discount</th>
                            <th>Price After Discount</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>


                        @foreach($services as $data)
                        <tr>
                            <!--<td><input type="text" name="sname[]"  autocomplete="off"  placeholder="Service Name" class="form-control name_list" value="{{ $data->name }}" /></td>  -->
                            <!--<td><input type="text" name="sprice1[]" autocomplete="off" maxlength="6"  placeholder="Service Price Before Discount" value="{{ $data->price_before_discount	 }}" class="form-control name_list" /></td>  -->
                            <!--<td><input type="text" name="sprice2[]" autocomplete="off" maxlength="6"  placeholder="Service Price After Discount" value="{{ $data->price_after_discount }}" class="form-control name_list" /></td>  -->
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->price_before_discount	 }}</td>
                            <td>{{ $data->price_after_discount }}</td>
                            <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" onclick="UpdateStatus({{ $data->id }})" data-id="{{ $data->id  }}">X</button></td>
                        </tr>
                        @endforeach

                     </tbody>
                    </table>


                

                @endif
                <input type="hidden" name="imgdata" id="imgdata" value="">
                <hr>
                <div class="spinner-grow text-center " style="text-align: center;margin-left: 50%;color:#001f3fwidth: 10%;display: none;"></div>

            <!--<button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>-->
               <button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>
             <!--<input type="button" name="submit" id="submit" class="btn bg-navy" value="Submit" /> -->
            &nbsp;&nbsp;
            <a href="{{ route('hospital.index')  }}" type="button" class="btn  bg-navy" style="margin-left: 8px;">Cancel</a><br /><br />

      </table>

    </div>

</div>



<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>


<script>
    $(document).ready(function(){
      var id = $('#dataid').val();
    //   var postURL = "/mdc/hospital/update/" + id;
      var i=1;
      var limit = 5;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="sname_new[]"   autocomplete="off" placeholder="Service Name" class="form-control name_list" /></td><td><input type="text" name="sprice1_new[]" maxlength="6"  placeholder="Service Price Before Discount" class=" form-control name_list" /></td><td><input type="text" name="sprice2_new[]" placeholder="Service Price After Discount" maxlength="6"  class=" form-control name_list" /></td>    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });

 });

    $(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();
        var id = $('#dataid').val();

     $(".spinner-grow").css("display", "block");
     $(".body-div").css("opacity","0.5");


     $.ajax({
        url: "/mdc/hospital/update/" + id,
        data:new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           if (response.success) {

            $(".spinner-grow").css("display", "none");
            $(".body-div").css("opacity","1");
            
              $.toaster({ priority : 'Success', title : 'Success', message : 'Hospital Update Successfully'});
              window.location = '/mdc/hospital/listing';


            }else{
              $(".spinner-grow").css("display", "none");
            $(".body-div").css("opacity","1");
                $.toaster({ priority : 'danger', title : 'Error', message : response.error });

            }
        },
        error:function(error){
          $(".spinner-grow").css("display", "none");
            $(".body-div").css("opacity","1");
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });


        }

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



<script>



var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});


$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    console.log(img);
    
    document.getElementById("newimg").setAttribute('value', img);
 
  });
  
});

function crop(){

resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      type : 'post',
      url: "{{route('croppie.upload-image')}}",
      data: {
          image: img,
          _token: "{{ csrf_token() }}",
      },

      success: function (data) {
       document.getElementById("imgdata").setAttribute('value', img);
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
       
      }
    });
  });

}


</script>

@endsection
