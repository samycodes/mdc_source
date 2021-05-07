@extends('backend.index')

@section('content')

<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit Offer</h4>
        </div>
    </div>
    <div class="card-body">
      
         <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf
          
          <input type="hidden" name="id" value="{{ $offer->id}}" id="id">
                
          <div class="form-group">
                  <label>Hospital Name</label>
                  <select class="select2" autocomplete="off"  name="hospital_id"  autocomplete="off" data-placeholder="Select a services" style="width: 100%;">
                    
                    @foreach($hospitals as $service)
                    <option  value="{{ $service->id }}" @if($service->id == $offer->hospital_id) selected @endif {{ (collect(old('hospital_id'))->contains($service->id)) ? 'selected':'' }} >{{ $service->name }}</option>
                    @endforeach
                  </select>
         </div>

            <div class="form-row">
                <div class="col-md-12">
                    <label >Offer Title</label>
                    
                    <input type="text" name="title" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $offer->title }}" 
                    placeholder="Enter Offer Title"  >
                    
                    
                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div><br>
            <div class="form-row">
                <div class="col-md-12">
                    <label >Offer Description</label>
                    
                    <textarea type="text" name="description"  autocomplete="off" class="form-control @if($errors->has('description')) is-invalid @endif"   value="{{ $offer->description }}" placeholder="Enter Offer Description">{{ $offer->description }}</textarea>
                    
                    
                </div>
            </div><br>
            
           
            <img src="{{ $offer->image }}" height="100" width="100">
            <div class="spinner-grow text-center " style="text-align: center;margin-left: 45%;color:#001f3f;display: none;"></div>

             <div class="form-group ">
                    <div class="input-group">
                <div class="form-group col-md-12">
                  <label for="exampleInputFile">Browse</label>
                  <input type="file" value="{{ old('image') }}" name="image" class="form-control" id="exampleInputFile">
                </div>
                   <span style="color:red">*Note [1. Image size should be 1000 kb&nbsp;&nbsp;   </span>
                    <span style="color:red"> 2. Image dimension should be 600 * 600  ]</span>
                </div>
              </div>
                 
              
                  
                 
           


            <hr>
            <button class="btn bg-navy submitdata"  id="submitdata" type="submit">Submit</button>
            &nbsp;&nbsp;
            <a href="{{ URL::previous() }}" type="button" class="btn  bg-navy" style="margin-left: 8px;">Cancel</a><br /><br />
        </form>
    </div>
</div>

@endsection  


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>

$(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();
        
        var id = $('#id').val();

        $(".spinner-grow").css("display", "block");
     $(".body-div").css("opacity","0.5");

        
        $.ajax({
        url: "/mdc/offer/update/" + id,
        data: new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           
          if (response.success) {
             
            $(".spinner-grow").css("display", "none");
            $(".body-div").css("opacity","1");


              $.toaster({ priority : 'success', title : 'Success', message : 'Offer Update Successfully'});
              window.location = '/mdc/offer/listing';
              
              
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
    
   
   