@extends('backend.index')


<style>
    .profile-user-img {
        border: 3px solid #ffffff !important;
    }
    div {
    word-wrap: break-word;         /* All browsers since IE 5.5+ */
    overflow-wrap: break-word;     /* Renamed property in CSS3 draft spec */
  
}
</style>
@section('content')



<div class="row">
<!--<div class="col-md-2"></div>-->

<div class="col-md-12">

            <!-- Profile Image -->
            <div class="card1  card-outline" style="border-top: 3px solid #001f3f;">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($user->profile_image=="")
                  <img class="profile-user-img img-fluid " src="http://128.199.31.19/mdc/public/images/avtar-mdc.jpg" alt="User profile picture" style="max-height: 90px;">
                  @else
                  <img class="profile-user-img img-fluid " src="{{ $user->profile_image }}" alt="User profile picture" style="max-height: 90px;">
                  @endif
                </div>

                <h3 class="profile-username text-center">Member Profile</h3>
	@if( $user->fullname != "" )
                <p class="text-muted text-center">{{ $user->fullname }}</p>
	@else
                 <p class="text-muted">--</p>
	@endif

                <div class="row">
                <div class="col-md-3">

                  <strong><i class="fas fa-user"></i>&nbsp;&nbsp;Full Name</strong>
	@if($user->fullname != "")
                  <p class="text-muted ">
                  {{$user->fullname}}
                  </p>
                 @else
                 <p class="text-muted">--</p>
	@endif

                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    @if($user->address!="")
                    <p class="text-muted">{{ $user->address }}, {{ $user->address2 }}</p>
                    @else
                    <p class="text-muted">--</p>
                    @endif
                    
                    <hr>
                    <strong><i class="fas fa-user"></i>&nbsp;&nbsp;Gender</strong>
	@if($user->gender != "")
                    <p class="text-muted ">
                    {{$user->gender}}
                    </p>
                  @else
                 <p class="text-muted">--</p>
	@endif


                </div>

                <div class="col-md-3">
                  <strong><i class="fas fa-user"></i>&nbsp;&nbsp;Email</strong>
                    @if($user->email != "")
                  <p class="text-muted ">
	
                  {{$user->email}}
                  </p>
                  @else
                 <p class="text-muted">--</p>
	@endif

                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> City</strong>
	@if($user->city != "")
                  <p class="text-muted">{{ $user->city }}</p>
                  @else
                 <p class="text-muted">--</p>
	@endif

                  <hr>
                    <strong><i class="fas fa-calendar"></i>&nbsp;&nbsp;Birth Date</strong>
	  @if($user->birth_date != "")
                    <p class="text-muted ">
                    {{Carbon\Carbon::parse( $user->birth_date)->format('d-m-Y')}}
                    </p>
                   @else
                 <p class="text-muted">--</p>
	@endif

                </div>

                  <div class="col-md-3">

                    <strong><i class="fas fa-phone"></i>&nbsp;&nbsp;Mobile Number</strong>

                    @if($user->country_code && $user->phone_number)
                    <p class="text-muted">
                    @if($user->country_code && $user->phone_number) {{$user->country_code }} | {{$user->phone_number }} @endif
                    </p>
                    @else
                      <p class="text-muted">--</p>
                    @endif
                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>&nbsp;&nbsp;State</strong>

                    @if($user->state!="")
                    <p class="text-muted ">
                    {{$user->state}}
                    </p>
                    @else
                    <p class="text-muted ">
                    --
                    </p>
                    @endif
 <hr>
                  </div>
	 <hr>
                  <div class="col-md-3">
                    <strong><i class="fas fa-user"></i>&nbsp;&nbsp;Login Type</strong>
	@if($user->login_type != "")
                    <p class="text-muted ">
                    {{$user->login_type}}
                    </p>
               @else
                 <p class="text-muted">--</p>
	@endif

                    <hr>
                    <strong><i class="fas fa-map-marker-alt mr-1"></i>&nbsp;&nbsp;Country</strong>
	@if($user->country != "")
                    <p class="text-muted ">
                    {{$user->country}}
                    </p>    
               @else
                 <p class="text-muted">--</p>
	@endif

                     <hr>
                    
                  </div>
                  
                  
              </div>
                    <style>
                        .profile-user-img {
                        border: 3px solid #001f3f !important;
                        }
                    </style>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</div>
</div>
</div>






@if(count($card)> 0)
<?php $p1 = DB::table('card')->where('user_id', $user->id)->where('type', 'single')->sum('price'); ?>
<div class="row single_card_row">
    <div class="col-md-12">
         <div class="card bg-navy"  style="margin-left: -7px;width: 101%;">
             <div class="card-header">
                  <h3 class="card-title" style="color: white;font-weight: 600;position: relative; top: 10px;">Single Card Details <span style="position: relative;
    left: 472px;">BHD {{$p1}}</span></h3><span style="width: 447px; height: 40px;" class="float-right badge  text-capitalize bg-disable">

                    <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop" style="margin-bottom: 0px;">
                      <input type="hidden" name="card_status" value="completed">
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <input type="hidden" name="type" value="single">
                      <input type="hidden" name="status" value="Approved">
                      <input type="hidden" name="card_id" value="">
                      {{csrf_field()}}
                       <button class="btn bg-navy submitdata" id="submitdata" type="submit">Approve All</button>
                    </form>
                    <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
                      <input type="hidden" name="card_status" value="rejected">
                      <input type="hidden" name="id" value="{{$user->id}}">
                      <input type="hidden" name="type" value="single">
                      <input type="hidden" name="status" value="Rejected">
                      <input type="hidden" name="card_id" value="">
                      {{csrf_field()}}
                       <button class="btn bg-navy submitdata Rejected" id="reject" type="submit" style="position: relative;
  top: -41px;">Rejected All</button>
                    </form>
                  </span>



             </div>
        </div>
    </div>


      <?php $i = 1; foreach ($card as $key => $value) { ?>
<div class="col-md-4">


      <div class="card ">
          <div class="card-header" style="    background: #e8e8e8;">
            <h3 class="card-title">Card {{$i++}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
          </div>
          <div class="card-body" style="display: block;">
            <span class="title">Full Name</span>
            <span class="value" style="position: relative; left: 75px; overflow-wrap: break-word;">{{ $value->fullname }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Mobile Number</span>
            <span class="value" style="position: relative; left: 38px;">{{ $value->mobile_number }}</span>
          </div>

            
         <div class="card-body" style="display: block;">
            <span class="title">Country</span>
            <span class="value" style="left: 85px;">{{ $value->country }}</span>
          </div>
          
          <div class="card-body" style="display: block;">
            <span class="title">Area</span>
            <span class="value" style="left: 110px;">{{ $value->city }}</span>
          </div>


          <div class="card-body" style="display: block;">
            <span class="title">Policy No</span>
            <span class="value" style="    position: relative;    left: 77px;">{{ $value->policy }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">CPR/GCC ID</span>
            <span class="value" style="left: 63px;">{{ $value->gcc_id }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Price</span>
            <span class="value" style="left: 103px;">BHD {{ $value->price }}</span>
          </div>
          
           <div class="card-body" style="display: block;">
            <span class="title">Card Type</span>
            <span class="value" style="left: 69px;">{{$value->cardtypefunction['name'] }}</span>
          </div>
          
          <div class="card-body" style="display: block;">
            <span class="title">Document Type</span>
            <span class="value" style="left: 30px;">{{$value->documenttypefunction['name'] }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Register Date</span>
            <span class="value" style="left: 46px;">  {{ Carbon\Carbon::parse( $value->occured_on)->format('d-m-Y') }}</span>
          </div>
          
          
          

          <?php
          if($value->card_status=='completed')
          {
            $status = 'Approved';
          }
          elseif($value->card_status == 'rejected')
          {
            $status = 'Rejected';
          }
          else {
            $status = $value->card_status;
          }
          ?>

          <div class="card-body" style="display: block;">
            <span class="title">Card Status</span>
            <span class="value" style="left: 56px;">{{$status}}</span>
          </div>
          
          <div class="card-body" style="display: block;">
            <span class="title">Document</span>
           @if($value->document_upload) <img src="{{ $value->document_upload }}"  alt="img" style="height: 51px;width: 79px; margin-left: 21%;"/>@endif
          </div>
          

          <div class="card-body" style="display: block;">

            <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop" >
              <input type="hidden" name="card_status" value="completed">
              <input type="hidden" name="id" value="{{$user->id}}">
              <input type="hidden" name="type" value="single">
              <input type="hidden" name="status" value="Approved">
              <input type="hidden" name="card_id" value="{{$value->id}}">
              {{csrf_field()}}
	@if($value->card_status == 'pending')
               		<button class="btn bg-navy submitdata  @if($value->card_status == 'completed' || $value->card_status == 'rejected') disabled @endif" id="submitdata" type="submit">Approve</button>
            	@endif
              </form>

            <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
              <input type="hidden" name="card_status" value="rejected">
              <input type="hidden" name="id" value="{{$user->id}}">
              <input type="hidden" name="type" value="single">
              <input type="hidden" name="status" value="Rejected">
              <input type="hidden" name="card_id" value="{{$value->id}}">
              {{csrf_field()}}
             @if($value->card_status == 'pending')
               <button class="btn bg-navy submitdata Rejected rejected @if($value->card_status == 'completed' ) disabled @elseif($value->card_status == 'rejected') disabled @endif" id="reject" type="submit">Rejected</button>
            @endif
	</form>

          </div>

      </div>
</div>

  <?php } ?>


<!--<a href="{{ URL::previous() }}" type="button" class="btn float-right bg-navy" style="margin-left: 8px;"><i class="fas fa-angle-double-left" style="font-size: 30px;"></i></a><br /><br />-->

</div>

@endif


@if(count($card_mul)> 0)
<?php $p2 = DB::table('card')->where('user_id', $user->id)->where('type', 'family')->sum('price'); ?>
<div class="row single_card_row">
    <div class="col-md-12">
         <div class="card bg-navy"  style="margin-left: -7px;width: 101%;">
             <div class="card-header">
                  <h3 class="card-title" style="color: white;font-weight: 600;position: relative; top: 10px;">Family Card Details <span style="position: relative;
    left: 472px;">BHD {{$p2}}</span></h3><span style="width: 447px; height: 40px;" class="float-right badge  text-capitalize bg-disable">
                    <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop" style="margin-bottom: 0px;">
                        <input type="hidden" name="card_status" value="completed">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="type" value="family">
                        <input type="hidden" name="status" value="Approved">
                        <input type="hidden" name="card_id" value="">
                        {{csrf_field()}}
                         <button class="btn bg-navy submitdata" id="submitdata" type="submit" style="    position: relative;
    bottom: 7px;">Approve All</button>
                      </form>
                      <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
                        <input type="hidden" name="card_status" value="rejected">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <input type="hidden" name="type" value="family">
                        <input type="hidden" name="status" value="Rejected">
                        <input type="hidden" name="card_id" value="">
                        {{csrf_field()}}
                         <button class="btn bg-navy submitdata Rejected" id="reject" type="submit" style="position: relative;
    top: -41px;">Rejected All</button>
                      </form></span>
             </div>
        </div>
    </div>


      <?php $i = 1; foreach ($card_mul as $key => $value) { ?>
<div class="col-md-4">


      <div class="card ">
          <div class="card-header" style="    background: #e8e8e8;">
            <h3 class="card-title">Card {{$i++}}</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
          </div>
          <div class="card-body" style="display: block;">
            <span class="title">Full Name</span>
            <span class="value" style="position: relative; left: 75px;">{{ $value->fullname }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Mobile Number</span>
            <span class="value" style="position: relative; left: 38px;">{{ $value->mobile_number }}</span>
          </div>
          
            <div class="card-body" style="display: block;">
            <span class="title">Country</span>
            <span class="value" style="left: 85px;">{{ $value->country }}</span>
          </div>
          
           <div class="card-body" style="display: block;">
            <span class="title">Area</span>
            <span class="value" style="left: 110px;">{{ $value->city }}</span>
          </div>


          <div class="card-body" style="display: block;">
            <span class="title">Policy No</span>
            <span class="value" style="    position: relative;    left: 78px;">{{ $value->policy }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">CPR/GCC ID</span>
            <span class="value" style="left: 63px;">{{ $value->gcc_id }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Price</span>
            <span class="value" style="left: 103px;">BHD {{ $value->price }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Register Date</span>
            <span class="value" style="left: 46px;">  {{ Carbon\Carbon::parse( $value->occured_on)->format('d-m-Y') }}</span>
          </div>

          <?php
          if($value->card_status=='completed')
          {
            $status = 'Approved';
          }
          elseif($value->card_status == 'rejected')
          {
            $status = 'Rejected';
          }
          else {
            $status = $value->card_status;
          }
          ?>
          
         

          <div class="card-body" style="display: block;">
            <span class="title">Card Status</span>
            <span class="value" style="left: 56px;">{{$status}}</span>
          </div>

            <div class="card-body" style="display: block;">
            <span class="title">Document</span>
            @if($value->document_upload) <img src="{{ $value->document_upload }}"  alt="img" style="height: 51px;width: 79px; margin-left: 21%;"/>@endif
          </div>
          
          <div class="card-body" style="display: block;">


            <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
              <input type="hidden" name="card_status" value="completed">
              <input type="hidden" name="id" value="{{$user->id}}">
              <input type="hidden" name="type" value="family">
              <input type="hidden" name="status" value="Approved">
              <input type="hidden" name="card_id" value="{{$value->id}}">
              {{csrf_field()}}
               @if($value->card_status == 'pending')
               <button class="btn bg-navy submitdata @if($value->card_status == 'completed' || $value->card_status == 'rejected') disabled @endif" id="submitdata" type="submit">Approve</button>
            @endif
	</form>

            <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
              <input type="hidden" name="card_status" value="rejected">
              <input type="hidden" name="id" value="{{$user->id}}">
              <input type="hidden" name="type" value="family">
              <input type="hidden" name="status" value="Rejected">
              <input type="hidden" name="card_id" value="{{$value->id}}">
              {{csrf_field()}}
@if($value->card_status == 'pending')
               <button class="btn bg-navy submitdata @if($value->card_status == 'completed' || $value->card_status == 'rejected') disabled @endif Rejected" id="reject" type="submit">Rejected</button>
@endif           
 </form>

          </div>

      </div>
</div>
  <?php } ?>


<!--<a href="{{ URL::previous() }}" type="button" class="btn float-right bg-navy" style="margin-left: 8px;"><i class="fas fa-angle-double-left" style="font-size: 30px;"></i></a><br /><br />-->

</div>


@endif


<style>
.row.single_card_row {
    background: white;
}
span.value {
    position: relative;
    left: 40px;
}
.card {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    margin-bottom: 1rem;
    background: #e5e5e557;
}
.card1 {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    margin-bottom: 1rem;

}
.row.single_card_row.card_button {
    padding-bottom: 25px;
}
button#reject {
    position: relative;
    left: 131px;
    bottom: 53px;
    background: #ea0d0dbf !important;
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@endsection
