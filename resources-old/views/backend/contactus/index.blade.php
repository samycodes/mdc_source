@extends('backend.index')

@section('content')


<div class="row">
      
          <div class="col-12">
            <div class="card">
                
              <div class="card-header">
               Manage Contacts
               
                <!--<div class="card-tools">-->
                 
                <!--  <form method="get" action="#" class="float-right">-->
                <!--        @csrf-->
                <!--        <div class="row">-->
                <!--            <div class="col-md-10">-->
                <!--                <input type="text" name="search" class="form-control" placeholder="Search" autocomplete="off">-->
                <!--            </div>-->
                <!--            <div class="col-md-2" style="margin-left: -30px;">-->
                <!--                <button class="btn btn-primary" style="height: 37px;margin-left: 15px;"><i class="fas fa-search"></i></button>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </form>-->
                <!--</div>-->
              </div>
              <!-- /.card-header -->
               <div class="card-body">
                <table id="example1" class="table table-bordered table-striped example1">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Subject For Inquire </th>
                      <th>Message</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if(isset($contacts))
                      @foreach($contacts as $data)
                        <tr>
                        <td>{{ $data->id }}</td>
                        <td >@if($data->name ){{ $data->name }}@else - @endif</td>
                        <td class="tooltip-light" data-toggle="tooltip" title="{{ $data->email }}" data-placement="top" >{{ $data->email }}</td>
                        <td>{{ $data->subject_line }}</td>
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