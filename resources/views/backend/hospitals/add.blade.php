@extends('backend.index')
<style>
    .div-1 {
      background-color: #001f3f4a;
    color: black;
    }
    .div{
      top:10%;
    }
  
</style>

@section('content')


<a href="{{  URL::previous() }}" class="btn bg-navy submitdata float-right"  type="submit"><i class="fa fa-angle-double-left"></i></a><br><br>
<div class="col-md-12">

<div class="card card-statistics">

    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Add New Hospital</h4>
        </div>


    </div>
    <div class="card-body">


        <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf

        <div class="form-row">
            <div class="col-md-12">
                <label >Hospital Name</label>

                <input type="text"   name="name" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ old('title')}}"
                placeholder="Enter Hospital Name" onkeypress="return isAlfa(event)">

            </div>
        </div><br>
        <div class="form-row">
            <div class="col-md-12">
                <label >Description</label>

                <textarea type="text" name="description"  autocomplete="off" class="form-control @if($errors->has('description')) is-invalid @endif"   value="{{ old('description')}}" placeholder="Enter Description"></textarea>

            </div>
        </div><br>
        <div class="form-row">

          <div class="col-md-3">
          <label >Country Code</label>
            <input type="text" name="country_code"  onkeypress="return countrycode(event)" maxlength="5"   class="form-control" placeholder="(+973)">
          </div>
          <div class="col-md-9">
          <label >Phone Number</label>
            <input type="text" name="phone_number" onkeypress="return isNumber(event)" minlength="8" class="form-control" maxlength="8" min="8" placeholder="000-000-000">
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
                                <input id="pac-input" type="text" autocomplete="off" name="latlongaddress" autocomplete="off"   class="form-control inputmask @if($errors->has('latlongaddress')) is-invalid @endif"  value="{{ old('lat')}}" placeholder="Enter Full Address">
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
                            <input type="text" name="lat" readonly id="latitude"   autocomplete="off"  onkeypress="return latlon(event)" class="form-control inputmask @if($errors->has('lat')) is-invalid @endif"  value="{{ old('lat')}}" placeholder="Enter Latitude">
                        </div>
                        <div class="col-md-6">
                            <label >Address Longitude</label>
                            <input type="text" name="lon" autocomplete="off" readonly id="longitude"  onkeypress="return latlon(event)" class="form-control inputmask @if($errors->has('lon')) is-invalid @endif"  value="{{ old('lon')}}" placeholder="Enter Longitude">
                        </div>
                    </div><br>

                      <div class="form-row">

                        <div class="col-md-6">
                            <label >Street</label>
                            <input type="text" name="street" autocomplete="off"  class="form-control inputmask @if($errors->has('street')) is-invalid @endif"  value="{{ old('street')}}" placeholder="Enter street"
                            onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32) ||
                                                (event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 96 && event.charCode <= 105)">
                        </div>
                        <div class="col-md-6">
                            <label >Unit/ House / Apartment No.</label>
                            <input type="text" name="apartment" onkeypress="return isNumber(event)" autocomplete="off" class="form-control inputmask @if($errors->has('apartment')) is-invalid @endif"  value="{{ old('apartment')}}" placeholder="Enter Unit/ House / Apartment No">
                        </div>


                    </div><br>

                    <div class="form-row">
                    <div class="col-md-6">
                            <label >Province / State</label>
                            <input type="text"   onkeypress="return isAlfa(event)" id="state" name="state" autocomplete="off"  class="form-control inputmask @if($errors->has('state')) is-invalid @endif"  value="{{ old('state')}}" placeholder="Enter Province / State">
                        </div>



                        <div class="col-md-6" >
                            <label >City / Town</label>
                            <input type="text"  onkeypress="return isAlfa(event)" id="locality" name="city" autocomplete="off"  class="form-control inputmask @if($errors->has('city')) is-invalid @endif"  value="{{ old('city')}}" placeholder="Enter City / Town">
                        </div>

                    </div><br>

                    <div class="form-row">
                        <div class="col-md-6">
                                <label >Country</label>
                                <input type="text" id="country-name" onkeypress="return isAlfa(event)" name="country" autocomplete="off"  class="form-control inputmask @if($errors->has('country')) is-invalid @endif"  value="{{ old('country')}}" placeholder="Enter Country">
                            </div>

                        <div class="col-md-6">
                                <label >Office Address(optional)</label>
                                <input type="text"   name="office" onkeypress="return officeaddress(event)"  autocomplete="off"   class="form-control inputmask @if($errors->has('office')) is-invalid @endif"  value="{{ old('office')}}" placeholder="Enter office address">
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
                                <input type="checkbox" name="working_day[]" value="Sunday" id="checkboxPrimary7" checked="">
                                <label for="checkboxPrimary7">Sunday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;

                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Monday" id="checkboxPrimary1" >
                                <label for="checkboxPrimary1">Monday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Tuesday" id="checkboxPrimary2">
                                <label for="checkboxPrimary2">Tuesday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Wednesday" id="checkboxPrimary3">
                                <label for="checkboxPrimary3">Wednesday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Thursday" id="checkboxPrimary4">
                                <label for="checkboxPrimary4">Thursday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Friday" id="checkboxPrimary5">
                                <label for="checkboxPrimary5">Friday
                                </label>
                              </div>&nbsp;&nbsp;&nbsp;&nbsp;
                              <div class="icheck-primary d-inline">
                                <input type="checkbox" name="working_day[]" value="Saturday" id="checkboxPrimary6">
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
                          <input type="text" onkeypress="return time1(event)" onkeydown="return false" autocomplete="off" name="start_time" value="{{ old('start_time') }}" class="form-control datetimepicker-input" data-target="#timepicker"/>
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
                          <input type="text" onkeypress="return time1(event)" onkeydown="return false" autocomplete="off" name="end_time" value="{{ old('end_time') }}" class="form-control datetimepicker-input" data-target="#timepicker1"/>
                          <div class="input-group-append" data-target="#timepicker1" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="far fa-clock"></i></div>
                          </div>
                          </div>

                      </div>

                </div>

          </div><hr>
          <img src="http://128.199.31.19/mdc/public/images/24.jpg" style="width: 7%;margin-left: 19%;">
          <div class="icheck-primary  d-inline text-center div" style="margin-left: 1%;padding-top: 15%;">
                      <input type="checkbox" name="hospital_time" value="true" id="checkboxPrimary111">
                      <label for="checkboxPrimary111" ><span class="div-1"><U>CLICK HERE</u> If you want to add the hospital time 24/7 Hr</span>
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
                    <img src="http://128.199.31.19/mdc/public/images/24.jpg" style="width: 7%;">
        <hr>
          <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Social Links</b></h5><hr>

          <div class="form-row">
              <div class="col-md-2">
                  <label >Country Code</label>
                  <input type="text" name="country_code2" autocomplete="off" onkeypress="return countrycode(event)" maxlength="5"  data-mask="+91"  class="form-control inputmask @if($errors->has('country_code')) is-invalid @endif"  value="{{ old('country_code')}}" placeholder="(+973)">

              </div>


              <div class="col-md-10">

                  <label >Mobile No.</label>
                  <input type="text" name="mobile_number" autocomplete="off" maxlength="8"  minlength="8" min="8" class="form-control" value="{{ old('whatsappno')}}" placeholder="Enter whatsapp No">
              </div>


          </div><br>

          <div class="form-row">

              <div class="col-md-3">
                  <label >Facebook Link</label>
                  <input type="text" name="facebook" autocomplete="off"    class="form-control" value="{{ old('facebook')}}" placeholder="https://www.facebook.com/">
              </div>
              <div class="col-md-3">
                  <label >Instagram Link</label>
                  <input type="text" name="instagram" autocomplete="off"   class="form-control" value="{{ old('instagram')}}" placeholder="https://www.instagram.com/">
              </div>
              <div class="col-md-3">
                  <label >Twitter Link</label>
                  <input type="text" name="twitter" autocomplete="off"   class="form-control"  value="{{ old('twitter')}}" placeholder="https://twitter.com/">
              </div>
              <div class="col-md-3">
                  <label >Website Link</label>
                  <input type="text" name="website" autocomplete="off"   class="form-control"  value="{{ old('website')}}" placeholder="https://anysite.com/">
              </div>


          </div><br>


          <hr>
          <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Browse Logo Image</b></h5><hr>
          
          <div class="row">
              <div class="col-md-4 text-center">
              <div id="upload-demo"></div>
              </div>
              <div class="col-md-4" style="padding:5%;">
              <strong>Select image to crop:</strong>
              <input type="file"  id="image"  class="form-control" style="overflow: auto;">
            <input type="hidden" name="imgdata" id="imgdata" value="">
             
              <a class="btn btn-primary btn-block "  onclick="UpdateStatus()" style="margin-top:2%">Crop Image</a>
              <!--<span style="color:red">*Note [1. Image size should be 1000 kb&nbsp;&nbsp;   </span>-->
              <!--      <span style="color:red"> 2. Image dimension should be 200 * 200  ]</span>-->

              </div>

              <div class="col-md-4">
              <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
              </div>
            </div>

          <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Browse Multiple Images</b></h5><hr>
          <div class="form-group form-row">
                  <div class="input-group">
              <div class="form-group col-md-12">
                <label for="exampleInputFile">Browse</label>
                <input type="file"  Multiple name="multipleimages[]" class="form-control" id="exampleInputFile1">
              </div>
             <span style="color:red">*Note [1. Image size should be 1000 kb&nbsp;&nbsp;   </span>
                    <span style="color:red"> 2. Image dimension should be 600 * 600  ]</span>

              </div>
            </div>

            <hr>
            <div class="spinner-grow text-center " style="text-align: center;margin-left: 45%;color:#001f3f;display: none;"></div>

          <h5 style="background-color: #001f3f59;line-height: 127%;text-align: center;"><b>Hospital Offerable</b></h5><hr>
          <!-- <div class="form-group clearfix"> -->
                    <div class="icheck-primary d-inline">
                      <input type="checkbox" name="offerable" value="1" id="checkboxPrimary10">
                      <label for="checkboxPrimary10"><U>CLICK HERE</u> If you want to add the offers at hospital.
                      </label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;
          <!-- </div> -->
              <hr>


          <div class="table-responsive">
          <button type="button" name="add" id="add" class="btn btn-default float-right">Add Services</button>
              <table class="table table-bordered" id="dynamic_field">
                  <tr>
                      <td><input type="text" name="sname[]" autocomplete="off"  placeholder="Service Name" class="form-control name_list" /></td>
                      <td><input type="text" name="sprice1[]" autocomplete="off" maxlength="6" placeholder="Service Price Before Discount" class=" form-control name_list" /></td>
                      <td><input type="text" name="sprice2[]" autocomplete="off" maxlength="6"   placeholder="Service Price After Discount" class=" form-control name_list" /></td>
                      <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>
                  </tr>
              </table>

              

              <button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>
              &nbsp;&nbsp;
          <!--<a href="{{ URL::previous() }}" type="button" class="btn  bg-navy" style="margin-left: 8px;">Cancel</a><br /><br />-->
          </div>
          

          </form>
        </div>
</div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

<script>
    $(document).ready(function(){
      
      var i=1;
      var limit = 5;


      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="sname[]"   autocomplete="off"  placeholder="Service Name" class="form-control name_list" /></td><td><input type="text" name="sprice1[]" maxlength="6"  placeholder="Service Price Before Discount" class=" form-control name_list" /></td><td><input type="text" name="sprice2[]" placeholder="Service Price After Discount" maxlength="6"  class=" form-control name_list" /></td>    <td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });


      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });



    });

    $(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();

     $(".spinner-grow").css("display", "block");
     $(".body-div").css("opacity","0.5");

    
     $.ajax({
        url: "/mdc/hospital/save",
        data:new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           if (response.success) {

            $(".spinner-grow").css("display", "none");
            $(".body-div").css("opacity","1");

              $.toaster({ priority : 'Success', title : 'Success', message : 'New Hospital Added Successfully'});
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

</script>

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

function UpdateStatus(){

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
      },
      error:function(error){
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });


        }
    });
  });

}


</script>


@endsection
