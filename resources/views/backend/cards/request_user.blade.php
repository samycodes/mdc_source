@extends('backend.index')

<style>

</style>
@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Single Card Listing</h3>

              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered  example1">
                   <thead>
                    <tr>

                      <th>ID</th>
                      <th>User Full Name</th>
                      <th>User Mobile Number</th>
                      <th>Card Type</th>
                      <th>Document Type</th>
                      <th>User Gender</th>
                      <th>Card Status</th>
                      
                      <th data-orderable="false">Card Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php $i = 0; ?>
                      @if(isset($cards))
                      @foreach($cards as $data)

                      @if($data)
                      <?php $u = DB::table('users')->where('id', $data->user_id)->first(); ?>
                      <tr>
                          <?php $i++ ?>
                        <td>{{ $i }}</td>
                        <td>{{ $data->fullname }}</td>
                        <td>({{$data->country_code}}) {{$data->mobile_number}}</td>
                        <!--<td>{{ $data->card_type }}</td>-->
                        <td>{{ $data->cardtypefunction['name'] }}</td>
                        <td>{{ $data->documenttypefunction['name'] }}</td>
                        <td>{{ $data->gender }}</td>
                    		@if($data->card_status == 'completed')
                    			  <td><span class="badge bg-success" > Approved </span></td>
                    		@elseif($data->card_status == 'rejected')
                    			<td><span class="badge bg-red" >Rejected </span></td>
                    		@else
                    			<td><span class="badge bg-yellow" > Pending </span></td>
                    		@endif
                       
                        <td width="8%" class="align-middle">
                        <div class="btn-group">
                          <button type="button" class="btn bg-navy margin btn-flat">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="{{ route('single.view', $data->user_id) }}">View</a>
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
