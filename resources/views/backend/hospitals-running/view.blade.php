@extends('backend.index')

@section('content')

<div class="row">
    <div class="col-md-12">
         <a href="{{ route('hospital.edit', $hospital->id) }}" class="btn btn-default submitdata float-right" ><i class="fa fa-edit"></i></a>
        
       
    <div class="card bg-navy"  style="margin-left: -7px;width: 101%;">
        
        <div class="card-header">
            
        <h3 class="card-title" style="color: white;font-weight: 600;">Hospital Details</h3><span class="float-right badge  text-capitalize bg-disable">{{ $hospital->status }}</span>
    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Hospital Name</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        {{ $hospital->name }}
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Description</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        {{ $hospital->description }}
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Phone Number</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        ({{ $hospital->country_code }}) {{ $hospital->phone_number }}
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Mobile Number</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        ({{ $hospital->country_code2 }}) {{ $hospital->mobile_number }}
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Start Time</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        {{ date("g:i a", strtotime($hospital->start_time)) }} 
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">End Time</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        {{ date("g:i a", strtotime($hospital->end_time)) }} 
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Working Day</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        <!--{{ $hospital->start_day }} &  {{ $hospital->end_day }}-->
        {{ $hospital->working_days }}
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Closed Day</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        {{ $hospital->closed_day }}
        </div>
    </div>
    </div>

    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Social Links</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
        Facebook Link :  {{ $hospital->facebook_link }} <br>
        Instagram Link : {{ $hospital->instagram_link }}<br>
        Twitter Link : {{ $hospital->twitter_link }}<br>
        website Link : {{ $hospital->dribble_link }}<br>
        </div>
    </div>
    </div>
    <div class="col-md-6">
    <div class="card ">
        <div class="card-header">
        <h3 class="card-title">Full Address</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
        </div>
        <div class="card-body" style="display: block;">
            {{$hospital->address}}<br>
            Street :  {{$hospital->street}},<br>
            Unit/ House / Apartment No : {{$hospital->apartment }},<br>
            Province / State : {{$hospital->state}},<br>
            City / Town : {{$hospital->city}},<br>
            Country : {{$hospital->country}},<br>
           
        </div>
    </div>
    </div>


@if($services)
<div class="col-md-12" >
 <div class="table card table-condensed">  
    <table class="table table-striped"  id="dynamic_field">
         <thead>
          <tr>
            <th>Service</th>
            <th>Price Before Discount</th>
            <th>Price After Discount</th>
          </tr>
        </thead>
        <tbody>
        
        
        @foreach($services as $data)
        <tr> 
            <td>{{ $data->name }}</td>  
            <td>{{ $data->price_before_discount	 }}</td>  
            <td>{{ $data->price_after_discount }}</td>  
        </tr>
        @endforeach
      
     </tbody>
    </table>  
 </div>
</div> 

@endif
                

 <div class="card-deck" style="padding: 10px;text-align: start">
     <div class="card col-md-2">
        <img class="card-img-top img-fluid" src="{{ $hospital->logo }}" alt="Card image cap" style="max-height: 76%;margin-top: 10%;">
    </div>
                
        @foreach($images as $data)
                <div class="card col-md-2">
                    <img class="card-img-top img-fluid"  src="{{ $data->image}}" alt="Card image cap" style="max-height: 76%;margin-top: 10%;">
                    
                </div>
        @endforeach
                            
  </div>
  <hr><br>

<a href="{{ URL::previous()  }}" class="btn bg-navy submitdata float-right" type="submit" style="margin-left:9px;margin-top: 6%;"><i class="fa fa-angle-double-left"></i></a>
   
@endsection  
   
