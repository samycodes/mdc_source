@extends('backend.index')

@section('content')


<div class="row">

          <div class="col-12">
            <div class="card">

              <div class="card-header">
               
                <h3 class="card-title">List Of Document Types</h3>
               
                 <a href="{{ route('documenttype.add') }}" class="btn bg-navy submitdata float-right"  id="submitdata" type="submit"><i class="fa fa-plus"></i></a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Document Types Name</th>
                      <th data-orderable="false">Document Types Enable/Disable</th>
                      <th data-orderable="false">Document Types Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                      @if(isset($documenttypes))
                      @foreach($documenttypes as $data)
                       
                        <tr>
                             <?php $i++ ?>
                        <td>{{$i }}</td>
                        <td>{{ $data->name }}</td>
                        <td width="7%">
                            <div class="row div">
                            @if($data->status == 'active')
                            <a type="button" onclick="statusDisable({{ $data->id }})"  class="btn btn-default">
                               Disable
                            </a>&nbsp;
                            @else
                            <a type="button"  onclick="statusEnable({{ $data->id }})" class="btn bg-navy ">
                               Enable
                            </a>&nbsp;
                            @endif
                            </div>
                        </td>
                        <td width="8%" class="align-middle @if($data->status == 'inactive') disabled text-muted @endif">
                        <div class="btn-group @if($data->status == 'inactive') disabled text-muted @endif">
                          <button type="button" class="btn bg-navy margin btn-flat @if($data->status == 'inactive') disabled text-muted @endif">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon @if($data->status == 'inactive') disabled text-muted @endif" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only @if($data->status == 'inactive') disabled text-muted @endif">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu @if($data->status == 'inactive') disabled text-muted @endif" role="menu" style="">
                            <a class="dropdown-item @if($data->status == 'inactive') disabled text-muted @endif" href="{{ route('documenttype.edit', $data->id) }}">Edit</a>
                            <a class="dropdown-item @if($data->status == 'inactive') disabled text-muted @endif pointer" onclick="UpdateStatus({{ $data->id }})" data-id="{{ $data->id  }}">Delete</a>
                          </div>
                        </div>
                        </td>
                        </tr>
                     @endforeach
                     @endif
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
        </div>


        @include('backend._shared.datatable')
@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    function statusEnable(documenttypeid){
        var id = documenttypeid;

   swal({
          title: "Are you sure?",
          text: "You want to enable this document type ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/documenttype/enable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Document Type Enable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/documenttype/listing';



                },

            });

          }
      });


    }
    function statusDisable(documenttypeid){
        var id = documenttypeid;

   swal({
          title: "Are you sure?",
          text: "You want to disable this document type ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/documenttype/disable/' + id ,
                data: {
                    id: id,
                    status,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                       swal("Document Type Disable Successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/documenttype/listing';



                },

            });

          }
      });


    }

    function UpdateStatus(documenttypeid){

   var id = documenttypeid;

   swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this document Type !",
          icon: "warning",
          buttons: true,
          dangerMode: true,
       })
       .then((willDelete) => {
          if (willDelete) {

              $.ajax({
                type : 'post',
                url : '/mdc/documenttype/delete/' + id ,
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}",
                },
                success: function(data){

                   if (data['status'] == 'success') {

                       swal("Document Type delete successfully",
                        {
                          icon: "success",
                        });

                         window.location='/mdc/documenttype/listing';

                    }else{
                         $.toaster({ priority : 'danger', title : 'Error', message : 'You Cannot delete this Card Type ! Please first delete hospital child services' });
                         $.toaster({ settings : {'timeout': 8000} });
                    }



                },

            });

          }
      });

}


</script>
