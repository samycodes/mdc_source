@extends('backend.index')

@section('content')

<a href="{{ route('read.status') }}" type="button" class="btn btn-sm float-right bg-navy"><i class="fas fa-eye-slash"></i>&nbsp;&nbsp;All Read</a>
<br><br>

<div class="row">
      
          <div class="col-12">
              
            <div class="card">
                
              <div class="card-header">
               Notifications<span class="badge right" style="margin-left: 1%;border-radius: 50%;background-color: #001f3f;color: white;">{{ $notifications->count() }}</span>
               
              </div>
               
               <div class="card-body">
                <table id="example1" class="table table-bordered example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Notification Title</th>
                      <th>Notification Message</th>
                      <th>Notification Occured On</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i = 0; ?>
                      @if(isset($notifications))
                      @foreach($notifications as $data)
                        <tr>
                            <?php $i++ ?>
                        <td>{{ $i }}</td>
                        <td>{{ $data->user['fullname']}}</td>
                        <td>{{ $data->title }}</td>
                        <td class="tooltip-light" data-toggle="tooltip" title="{{ $data->message }}" data-placement="top" >{{ $data->message }}</td>
                        <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($data->created_at))->diffForHumans()  }}</td>
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