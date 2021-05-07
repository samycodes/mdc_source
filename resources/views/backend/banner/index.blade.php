@extends('backend.index')

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Banner Listing</h3>
                 <a href="{{ route('banner.add')}}" class="btn bg-navy submitdata float-right"  id="submitdata" type="submit"><i class="fa fa-plus"></i></a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered example1">
                   <thead>
                    <tr>
                      <th width="20%">ID</th>
                      <th  width="20%" data-orderable="false">image</th>
                      
                      <th width="20%" data-orderable="false">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                      @if(isset($banner))
                      @foreach($banner as $data)
                      @if($data->status == 'active')
                      <?php $i++ ?>
                        <tr>
                        <td>{{ $i }}</td>
                        <td width="20%"><img src="{{ $data->image }}" height="100" width="100"></td>
                        
                       
                        <td width="8%" class="">
                        <div class="btn-group">
                          <button type="button" class="btn bg-navy margin btn-flat">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            
                            <a class="dropdown-item" href="{{ route('banner.edit', $data->id) }}">Edit</a>
                             <a class="dropdown-item delete" href="#" data-id="{{ $data->id }}">Delete</a>         
                          </div>
                        </div>
                        </td>

                    
                        </tr>
                        
                      @else
                     
                      <tr class="disabled">
                            <?php $i++ ?>
                            
                        <td class="disabled text-muted">{{ $i }}</td>
                        <td class="disabled text-muted">{{ $data->title }}</td>
                        <td>@if($data->description) {{ $data->description }} @else -- @endif</td>
                        <td width="20%" class="disabled"class="disabled text-muted"><img src="{{ $data->image }}" style="opacity: 0.5;" class="disabled text-muted" height="100" width="100"></td>
                        
                        <td width="8%" class="disabled text-muted">
                        <div class="btn-group disabled text-muted">
                          <button type="button" class="btn bg-navy margin btn-flat disabled text-muted">Action</button>
                          <button type="button" class="btn bg-navy disabled text-muted margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only disabled text-muted">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu disabled text-muted" role="menu" style="">
                            
                            <a class="dropdown-item" href="{{ route('offer.edit', $data->id) }}">Edit</a>
                             <a class="dropdown-item delete" href="#" data-id="{{ $data->id }}">Delete</a>         
                          </div>
                        </div>
                        </td>

                    
                        </tr>
                      @endif
                     @endforeach
                     @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          



@include('backend._shared.datatable')

@endsection  




   
   
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>


function statusEnable(cardtypeid){
        var id = cardtypeid;

   swal({
          title: "Are you sure?",
          text: "You want to enable this offer ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/offer/enable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Offer Enable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/offer/listing';



                },

            });

          }
      });


    }
    function statusDisable(cardtypeid){
        var id = cardtypeid;

   swal({
          title: "Are you sure?",
          text: "You want to disable this offer ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/offer/disable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Offer Disable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/offer/listing';



                },

            });

          }
      });


    }
    
jQuery(document).ready(function() {
    
    
    jQuery('.delete').on('click',function()
    {
      
        var id = $(this).data('id');
        //alert(id);

        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this banner!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/banner/delete/' + id ,
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){
                   
                      window.location='/mdc/banner/listing';
                   
                },
                  
            });
            swal("Banner delete successfully",
            {
              icon: "success",
            });
          } 
        });
    });
    });
</script>