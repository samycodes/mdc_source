@extends('backend.index')

@section('content')


<div class="row">
      
          <div class="col-12">
            <div class="card">
                
              <div class="card-header">
               List Of Business
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Company Name</th>
                      <th>Mobile No.</th>
                      <th>CR</th>
                      <th>Service</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(isset($business))
                      @foreach($business as $data)
                        <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->user_name }}</td>
                        <td class="tooltip-light" data-toggle="tooltip" title="{{ $data->email }}" data-placement="top">{{ $data->email }}</td>
                        <td>{{ $data->company_name }}</td>
                        <td>({{ $data->country_code }}) {{ $data->phone }}</td>
                        <td>{{ $data->cr }}</td>
                        <td>{{ $data->services }}</td>
                       
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