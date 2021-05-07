@extends('backend.index')
<style>
.pointer {cursor: pointer;}
</style>

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Hospital Service Listing</h3>
                <a href="{{ route('hospital.index') }}" class="btn bg-navy submitdata float-right"  type="submit"><i class="fa fa-angle-double-left"></i></a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered example1">
                   <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price Before Discount</th>
                        <th>Price After Discount</th>
                        <th data-orderable="false">Status</th>
                        <th data-orderable="false">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                     @if(isset($services))
                        @foreach($services as $data)
                       <?php $i++ ?>
                        <tr>
                            <input type="hidden" name="root" id="dataid" value="{{ $data->hospital_id }}">
                            <td width="5%">{{ $i }}</td>
                            <td width="20%">{{ $data->name }}</td>
                            <td width="20%">{{ $data->price_before_discount }}</td>
                            <td width="20%">{{ $data->price_after_discount }}</td>
                            <td width="20%">{{ $data->status }}</td>
                            <td class="align-middle">
                            <div class="btn-group">
                              <button type="button" class="btn bg-navy margin btn-flat">Action</button>
                              <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <div class="dropdown-menu" role="menu" style="">
                                <a class="dropdown-item pointer" onclick="UpdateStatus({{ $data->id }})" data-id="{{ $data->id  }}">Delete</a>
                              </div>
                            </div>
                            </td>
                        
                            
                        </tr>
                        @endforeach
                     @endif
                  </tbody>
                </table>
              </div>
            </div>
          
@include('backend._shared.datatable')


@endsection  


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
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
                   
                     window.location='/mdc/hospital/service/listing/' + serviceid;
                   
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
   
