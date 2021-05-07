@extends('backend.index')

@section('content')
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Family Card Listing</h3>
    
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered  example1">
                   <thead>
                    <tr>
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>Mobile Nuumber</th>
                      <th>Card Type</th>
                      <th>Document Type</th>
                      <th>Gender</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php $i = 0; ?>
                      @if(isset($cards))
                      @foreach($cards as $data)
                      <tr>
                          <?php $i++ ?>
                        <td>{{ $i }}</td>
                        <td>{{ $data->fullname }}</td>
                        <td>({{$data->country_code}}) {{$data->mobile_number}}</td>
                        <td>{{ $data->card_type }}</td>
                        <td>{{ $data->document_type }}</td>
                        <td>{{ $data->gender }}</td>
                        <td>{{ $data->status }}</td>
                        <td width="8%" class="align-middle">
                        <div class="btn-group">
                          <button type="button" class="btn bg-navy margin btn-flat">Action</button>
                          <button type="button" class="btn bg-navy margin btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu" style="">
                            <a class="dropdown-item" href="{{ route('family.view', $data->id ) }}">View</a>  
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

