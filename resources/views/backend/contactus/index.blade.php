@extends('backend.index')

@section('content')


<div class="row">
      
          <div class="col-12">
            <div class="card">
                
              <div class="card-header">
              Manage  Get In Touch
               
              </div>
              <!-- /.card-header -->
               <div class="card-body">
               <table id="example1" class="table table-bordered example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Subject For Inquires </th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i = 0; ?>
                      @if(isset($contact))
                      @foreach($contact as $data)
                      <?php $i++ ?>
                        <tr>
                        <td>{{ $i }}</td>
                        <td >@if($data->name ){{ $data->name }}@else - @endif</td>
                        <td class="tooltip-light" data-toggle="tooltip" title="{{ $data->email }}" data-placement="top" >{{ $data->email }}</td>
                        <td>{{ $data->type }}</td>
                        <td class="tooltip-light" data-toggle="tooltip" title="{{ $data->message }}" data-placement="top" >{{ $data->message }}</td>
                        
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