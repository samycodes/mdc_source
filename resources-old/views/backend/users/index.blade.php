@extends('backend.index')

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 58px;
    height: 22px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
    width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #00a65a;;
}

input:focus + .slider {
  box-shadow: 0 0 1px #00a65a;;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Member Listing</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered example1">
                   <thead>
                    <tr>
                      <th>ID</th>
                      <th>Member Name</th>
                      <th>Member Email</th>
                      <th>Member Phone No</th>
                      <th data-orderable="false">Member Status</th>
                      <th data-orderable="false">Member Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                      @if(isset($users))
                      @foreach($users as $user)
                      <?php $i++ ?>
                        <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->phone_number ) @if($user->country_code) ({{ $user->country_code }}) @endif {{ $user->phone_number }}@endif</td>
                        <td class="">
                          <label class="switch align-middle">
                            <input type="checkbox" name="status" value="{{ $user->id }}"  onclick="UpdateStatus({{ $user->id }})" class="toggle-class chckBx getstatus" type="checkbox"  @if($user->status == 'active') checked='checked' @endif>
                            <span class="slider"></span>
                          </label><br><br>
                         </td>
                    
                        <td class="">
                        <div class="btn-group">
                          <button type="button" class="btn bg-navy margin btn-flat">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="{{ route('user.view', $user->id) }}">View</a>  
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
          



@include('backend._shared.datatable')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script>

function UpdateStatus(id){
          
        
        if ($(this).prop('checked')) {

            //var userid = $(this).val();
            var userid = id;
              $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/mdc/user/change-status',
                    data: {
                        userid: userid
                        
                    },
                    success: function(data){
                      swal("Status change successfully", "", "success");
                    }
                });
            
        }
        else
        {
           // var userid = $(this).val();
            var userid = id;
            $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/mdc/user/change-status',
                    data: {
                        userid: userid
                        
                    },
                    success: function(data){
                      swal("Status change successfully", "", "success");
                    }
                });
            
        }
    
}
</script>

@endsection  
   
