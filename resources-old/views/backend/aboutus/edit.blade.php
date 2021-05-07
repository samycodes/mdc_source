@extends('backend.index')

@section('content')


<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit About Us Content</h4>
        </div>
    </div>
    <div class="card-body">
        <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf
          
            <div class="form-row">
                <div class="col-md-12">
                    <label >Title</label>
                    
                    <input type="text" name="title" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $aboutus->title }}" placeholder="Enter Title"
                    onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                    
                    @if($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div><br>
            <div class="form-row">
                <div class="col-md-12">
                    <label >Description</label>
                    
                    <textarea type="text"  autocomplete="off" name="description" rows="10" cols="10" class="form-control @if($errors->has('description')) is-invalid @endif"  value="{{ $aboutus->description }}" placeholder="Enter Description">{{ $aboutus->description }}</textarea>
                    
                    @if($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div><br>
                 
                  
                  
                 
            


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
         
        $.ajax({
        url: "/mdc/aboutus/update",
        data: new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           
          if (response.success) {
             
              $.toaster({ priority : 'success', title : 'Success', message : 'Aboutus Content Update Successfully'});
              window.location = '/mdc/aboutus/view';
              
              
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

