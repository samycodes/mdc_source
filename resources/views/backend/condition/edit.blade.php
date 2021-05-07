@extends('backend.index')

@section('content')


<div class="col-md-12">
<div class="card card-statistics">
    <div class="card-header">
        <div class="card-heading">
            <h4 class="card-title">Edit Terms of Service Content</h4>
        </div>
    </div>
    <div class="card-body">
       <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
          @csrf
          
            <div class="form-row">
                <div class="col-md-12">
                    <label >Title</label>
                    
                    <input type="text" name="title" autocomplete="off" class="form-control @if($errors->has('title')) is-invalid @endif"  value="{{ $data->title }}" placeholder="Enter Title"
                    onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)">
                   
                </div>
            </div><br>
           <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info" style="border-top: 3px solid #001f3f;">
            <div class="card-header">
              <h3 class="card-title">
               Description
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" name="description" value="{{$data->description}}" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$data->description}}</textarea>
              </div>
              
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>


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
        url: "/mdc/condition/update",
        data: new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           
          if (response.success) {
             
              $.toaster({ priority : 'success', title : 'Success', message : 'Update Condition Successfully'});
              window.location = '/mdc/condition/view';
              
              
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
    