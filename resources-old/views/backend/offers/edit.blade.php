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
            
             <div class="form-group ">
                    <div class="input-group">
                <div class="form-group col-md-12">
                  <label for="exampleInputFile">Browse</label>
                  <input type="file" value="{{ old('image') }}" name="image" class="form-control" id="exampleInputFile">
                </div>
                   <span style="color:red">[*Note : Maximum 1000 kb image upload.Larger than this is not accepted]</span>
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
        
        $.ajax({
        url: "/mdc/offer/update/" + id,
        data: new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           
          if (response.success) {
             
              $.toaster({ priority : 'success', title : 'Success', message : 'Offer Update Successfully'});
              window.location = '/mdc/offer/listing';
              
              
            }else{
                
                $.toaster({ priority : 'danger', title : 'Error', message : response.error });
                
            }
        },
        error:function(error){
            alert('by');
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });
           
        
        }
        
        });
});
 
</script>
    
   
   