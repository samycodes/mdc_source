@extends('backend.index')
<style>
.pointer {cursor: pointer;}
</style>
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Hospital Listing</h3>
                <a href="{{ route('hospital.add') }}" class="btn bg-navy submitdata float-right"  id="submitdata" type="submit"><i class="fa fa-plus"></i></a>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered  example1">
                   <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hospital Name</th>
                      <th>24/7 Hr Available</th>
                      <th>Hospital Start Time</th>
                      <th>Hospital End Time</th>
                      <th>Hospital Have Offer</th>
                      <th>Hospital Services</th>
                      <th data-orderable="false">Hospital Enable/Disable</th>
                      <th data-orderable="false">Hospital Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                      @if(isset($hospitals))
                      @foreach($hospitals as $data)
                        @if($data->status == 'active')
                        <tr>
                            <?php $i++ ?>
                        <td width="5%">{{ $i }}</td>
                        <td width="15%">{{ $data->name }}</td>
                        <td width="15%">
                        @if($data->full_time == "true") 
                        <span class="btn bg-navy btn-default btn-xs">Yes</span>
                        @else 
                        <span class="btn btn-default btn-xs">No</span>
                        @endif 
                        </td>

                        <td width="10%"> 
                        @if($data->full_time == "false") 
                        {{ date("g:i a", strtotime($data->start_time)) }} 
                        @else
                        --
                        @endif 
                        </td>
                        <td width="10%"> 
                        
                        @if($data->full_time == "false") 
                        {{ date("g:i a", strtotime($data->end_time)) }} 
                        @else
                        --
                        @endif 
                        </td>


                        @if($data->offerable == 1)
                        <td width="8%"><span class="btn @if($data->status == 'inactive') bg-navy @else btn-default @endif btn-xs">Yes</span></td>
                        @else
                        <td width="8%"><span class="btn @if($data->status == 'inactive') bg-navy @else btn-default @endif  btn-xs">No</span></td>
                        @endif
                         <td width="12%">
                        @if(\DB::table('services')->where('hospital_id', $data->id)->first())
                            <div class="row">
                            <a type="button" href="{{ route('service.index', $data->id)}}" class="btn btn-default">
                               Service <span class="badge badge-light">{{ \DB::table('services')->where('hospital_id', $data->id)->count() }}</span>
                            </a>&nbsp;

                            </div>
                        @else

                        @endif
                        <td width="7%">
                            <div class="row div">
                            @if($data->status == 'active')
                            <a type="button" onclick="statusDisable({{ $data->id }})"  class="btn btn-default">
                               Disable
                            </a>&nbsp;
                            @else
                            <a type="button"  onclick="statusEnable({{ $data->id }})" class="btn bg-navy">
                               Enable
                            </a>&nbsp;
                            @endif
                            </div>
                        </td>
                        </td>
                        <td width="8%" class="align-middle">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default margin btn-flat">Action</button>
                          <button type="button" class="btn btn-default margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="{{ route('hospital.view', $data->id) }}">View</a>
                            <a class="dropdown-item" href="{{ route('hospital.edit', $data->id) }}">Edit</a>
                            <a class="dropdown-item pointer" onclick="UpdateStatus({{ $data->id }})" data-id="{{ $data->id  }}">Delete</a>
                          </div>
                        </div>
                        </td>

                        </tr>
                        @else

                        <tr  >
                            <?php $i++ ?>
                        <td width="5%">{{ $i }}</td>
                        <td width="15%" >{{ $data->name }}</td>
                        <td>
                        @if($data->full_time == "true") 
                        <span class="btn bg-navy btn-default btn-xs">Yes</span>
                        @else 
                        <span class="btn btn-default btn-xs">No</span>
                        @endif 
                        </td>
                        <td width="10%"> 
                        @if($data->full_time == "false") 
                        {{ date("g:i a", strtotime($data->start_time)) }} 
                        @else
                        --
                        @endif 
                        </td>
                        <td width="10%"> 
                        
                        @if($data->full_time == "false") 
                        {{ date("g:i a", strtotime($data->end_time)) }} 
                        @else
                        --
                        @endif 
                        </td>
                        @if($data->offerable == 1)
                        <td width="8%" ><span class="btn  btn-default  btn-xs  ">Yes</span></td>
                        @else
                        <td width="8%"><span class="btn  btn-default btn-xs ">No</span></td>
                        @endif
                         <td width="12%" >
                        @if(\DB::table('services')->where('hospital_id', $data->id)->first())
                            <div class="row ">
                            <a type="button" href="{{ route('service.index', $data->id)}}" class="btn btn-default ">
                               Service <span class="badge badge-light">{{ \DB::table('services')->where('hospital_id', $data->id)->count() }}</span>
                            </a>&nbsp;

                            </div>
                        @else

                        @endif
                        <td width="7%"  >
                            <div class="row div">
                             @if($data->status == 'active')
                            <a type="button" onclick="statusDisable({{ $data->id }})"  class="btn btn-default">
                               Disable
                            </a>&nbsp;
                            @else
                            <a type="button"  onclick="statusEnable({{ $data->id }})" class="btn bg-navy">
                               Enable
                            </a>&nbsp;
                            @endif
                            </div>
                        </td>
                        </td>
                        <td width="8%" class="align-middle disabled text-muted">
                        <div class="btn-group">
                          <button type="button" class="btn bg-navy margin btn-flat disabled text-muted">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon disabled text-muted" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only disabled text-muted">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu disabled text-muted" role="menu" style="">
                            <a class="dropdown-item disabled text-muted" href="{{ route('hospital.view', $data->id) }}">View</a>
                            <a class="dropdown-item disabled text-muted" href="{{ route('hospital.edit', $data->id) }}">Edit</a>
                            <a class="dropdown-item pointer disabled text-muted" onclick="UpdateStatus({{ $data->id }})" data-id="{{ $data->id  }}">Delete</a>
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
            </div>

@include('backend._shared.datatable')


@endsection
<style>
.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgb(255 255 255) !important;
}
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    function statusEnable(hospitalid){
        var id = hospitalid;

   swal({
          title: "Are you sure?",
          text: "You want to enable this hospital ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/hospital/enable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Hospital Enable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/hospital/listing';



                },

            });

          }
      });


    }
    function statusDisable(hospitalid){
        var id = hospitalid;

   swal({
          title: "Are you sure?",
          text: "You want to disable this hospital ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/hospital/disable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Hospital Disable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/hospital/listing';



                },

            });

          }
      });


    }

    function UpdateStatus(hospitalid){

   var id = hospitalid;

   swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this Hospital !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/hospital/delete/' + id ,
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                   if (data['status'] == 'success') {

                       swal("Hospital delete successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/hospital/listing';

                    }else{
                         $.toaster({ priority : 'danger', title : 'Error', message : 'You Cannot delete this Hospital ! Please first delete hospital child services' });
                         $.toaster({ settings : {'timeout': 8000} });
                    }



                },

            });

          }
      });

}
</script>
