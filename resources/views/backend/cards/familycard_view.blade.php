@extends('backend.index')


<style>
    .profile-user-img {
        border: 3px solid #ffffff !important;
    }
</style>
@section('content')

<?php 
      ?>

<div class="row">

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

                <h3 class="profile-username text-center">User Profile</h3>
	@if($user->fullname != "")
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
                    <p class="text-muted">{{ $user->address }}</p>
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

                  <div class="col-md-3">
                    <strong><i class="fas fa-user"></i>&nbsp;&nbsp;Login Type</strong>
	
                    <p class="text-muted ">
                    {{$user->login_type}}
                    </p>
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
            <span class="value" style="position: relative; left: 41px;">{{ $value->mobile_number }}</span>
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
            <span class="title">Card Type</span>
            <span class="value" style="position: relative;left: 74px;">{{ $value->cardtypefunction['name'] }}</span>
          </div>

          <div class="card-body" style="display: block;">
            <span class="title">Document Type</span>
            <span class="value" style="position: relative;left: 39px;">{{ $value->documenttypefunction['name'] }}</span>
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
          
           @if($value->document_upload != '')
          <section class="demos">
          <div class="card-body" style="display: block;">
            <span class="title" style="margin-left: -45%;">Document</span>
           @if($value->documenttypefunction['name'] != 'None' || $value->document_upload != '') 
	@if($value->document_upload != '')<img src="{{ $value->document_upload }}"  alt="img" style="object-fit: cover;height: 51px;width: 79px; margin-left: 13%;" class="demo-image first">@else <span class="value" style="left: 60px;">--</span> @endif
          @endif
           @if($value->documenttypefunction['name'] != 'None' || $value->document_upload != '')  
	@if($value->document_upload != '')<a href="{{ route('download', $value->id) }}"><i class="fa fa-download" aria-hidden="true" style="color: black;font-size: 28px;margin-left: 0px;"></i></a>@endif
           @endif
          </div>
           
          </section>
          @else
          <div class="card-body" style="display: block;">
            <span class="title">Document</span>
            <span class="value" style="left: 60px;">--</span>
            </div>
          @endif


          <div class="card-body" style="display: block;">


            <form class="myForm" id="myForm" action="{{$user->id}}" method="post" enctype="multipart/form-data" autocomplete="nop">
              <input type="hidden" name="card_status" value="completed">
              <input type="hidden" name="id" value="{{$user->id}}">
              <input type="hidden" name="type" value="family">
              <input type="hidden" name="status" value="Approved">
              <input type="hidden" name="card_id" value="{{$value->id}}">
              {{csrf_field()}}
              @if($value->card_status == 'pending')
               <button class="btn bg-navy submitdata" id="submitdata" type="submit">Approve</button>
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
              <button class="btn bg-navy submitdata Rejected" id="reject" type="submit">Rejected</button>
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



<script>
    window.onload = function() {
    var elements = document.querySelectorAll( '.demo-image' );
    Intense( elements );
    }
  </script>

  <style>
  * {
  -webkit-font-smoothing: antialiased;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }
html, body {
  font-family: "Ubuntu Mono", monospace;
  margin: 0px;
  height: 100%;
  width: 100%; }
body {
  padding: 20px;
  padding-top: 40px;
  min-width: 600px; }
header h1, footer h1 {
  font-weight: normal;
  width: 464px;
  background: #222222;
  color: #fff;
  font-size: 14px;
  height: 55px;
  line-height: 55px;
  margin: auto;
  margin-top: 0px;
  margin-bottom: 20px;
  text-align: center;}
.demos {
  text-align: center;
  margin-top: 20px;
  width: 490px;
  margin: auto;}
.demo-image {
  cursor: url("http://tholman.com/intense-images/img/plus_cursor.png") 25 25, auto;
  display: inline-block;
  width: 220px;
  height: 220px;
  background-size: cover;
  background-position: 50% 50%;
  margin-left: 8px;
  margin-right: 8px;
  margin-bottom: 16px; }
  .demo-image.first {
    background-image: url("http://tholman.com/intense-images/img/h1_small.jpg"); }
 
footer h1 {
  padding-left: 20px;
  background: #e9e9e9;
  color: #222222;
  font-size: 14px; }
  footer h1 a {
    color: #222222; }
  
  </style>

  <script>
  window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();
window.cancelRequestAnimFrame = ( function() {
    return window.cancelAnimationFrame          ||
        window.webkitCancelRequestAnimationFrame    ||
        window.mozCancelRequestAnimationFrame       ||
        window.oCancelRequestAnimationFrame     ||
        window.msCancelRequestAnimationFrame        ||
        clearTimeout
} )();
var Intense = (function() {
    'use strict';
    var KEYCODE_ESC = 27;
    // Track both the current and destination mouse coordinates
    // Destination coordinates are non-eased actual mouse coordinates
    var mouse = { xCurr:0, yCurr:0, xDest: 0, yDest: 0 };
    var horizontalOrientation = true;
    // Holds the animation frame id.
    var looper;
  
    // Current position of scrolly element
    var lastPosition, currentPosition = 0;
    
    var sourceDimensions, target;
    var targetDimensions = { w: 0, h: 0 };
  
    var container;
    var containerDimensions = { w: 0, h:0 };
    var overflowArea = { x: 0, y: 0 };
    // Overflow variable before screen is locked.
    var overflowValue;
    /* -------------------------
    /*          UTILS
    /* -------------------------*/
    // Soft object augmentation
    function extend( target, source ) {
        for ( var key in source )
            if ( !( key in target ) )
                target[ key ] = source[ key ];
        return target;
    }
    // Applys a dict of css properties to an element
    function applyProperties( target, properties ) {
      for( var key in properties ) {
        target.style[ key ] = properties[ key ];
      }
    }
    // Returns whether target a vertical or horizontal fit in the page.
    // As well as the right fitting width/height of the image.
    function getFit( 
      source ) {
      var heightRatio = window.innerHeight / source.h;
      if( (source.w * heightRatio) > window.innerWidth ) {
        return { w: source.w * heightRatio, h: source.h * heightRatio, fit: true };
      } else {
        var widthRatio = window.innerWidth / source.w;
        return { w: source.w * widthRatio, h: source.h * widthRatio, fit: false };
      }
    }
    /* -------------------------
    /*          APP
    /* -------------------------*/
    function startTracking( passedElements ) {
      var i;
      // If passed an array of elements, assign tracking to all.
      if ( passedElements.length ) {
        // Loop and assign
        for( i = 0; i < passedElements.length; i++ ) {
          track( passedElements[ i ] );
        }
      } else {
          track( passedElements );
      }
    }
    function track( element ) {
      // Element needs a src at minumun.
      if( element.getAttribute( 'data-image') || element.src ) {
        element.addEventListener( 'click', function() {
          init( this );
        }, false );
      }
    }
  
    function start() { 
      loop();
    }
   
    function stop() {
      cancelRequestAnimFrame( looper );
    }
    function loop() {
        looper = requestAnimFrame(loop);
        positionTarget();      
    }
    // Lock scroll on the document body.
    function lockBody() {
      overflowValue = document.body.style.overflow;
      document.body.style.overflow = 'hidden';
    }
    // Unlock scroll on the document body.
    function unlockBody() {
      document.body.style.overflow = overflowValue;
    }
    function createViewer( title, caption ) {
      /*
       *  Container
       */
      var containerProperties = {
        'backgroundColor': 'rgba(0,0,0,0.8)',
        'width': '100%',
        'height': '80%',
        'position': 'fixed',
        'top': '0px',
        'left': '0px',
        'overflow': 'hidden',
        'zIndex': '999999',
        'margin': '0px',
        'border-style': 'outset',
        'border-color': '#e5e9ec',
        'box-shadow': '7px 7px #7395b940',
        'webkitTransition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'MozTransition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'transition': 'opacity 150ms cubic-bezier( 0, 0, .26, 1 )',
        'opacity': '0'
      }
      container = document.createElement( 'figure' );
      container.appendChild( target );
      applyProperties( container, containerProperties );
      var imageProperties = {
        'cursor': 'url( "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3Q0IyNDI3M0FFMkYxMUUzOEQzQUQ5NTMxMDAwQjJGRCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3Q0IyNDI3NEFFMkYxMUUzOEQzQUQ5NTMxMDAwQjJGRCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjdDQjI0MjcxQUUyRjExRTM4RDNBRDk1MzEwMDBCMkZEIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjdDQjI0MjcyQUUyRjExRTM4RDNBRDk1MzEwMDBCMkZEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+soZ1WgAABp5JREFUeNrcWn9M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" ) 25 25, auto'
      }
      applyProperties( target, imageProperties );
      /*
       *  Caption Container
       */
      var captionContainerProperties = {
        'fontFamily': 'Georgia, Times, "Times New Roman", serif',
        'position': 'fixed',
        'bottom': '0px',
        'left': '0px',
        'padding': '20px',
        'color': '#fff',
        'wordSpacing': '0.2px',
        'webkitFontSmoothing': 'antialiased',
        'textShadow': '-1px 0px 1px rgba(0,0,0,0.4)'
      }
      var captionContainer = document.createElement( 'figcaption' );
      applyProperties( captionContainer, captionContainerProperties );
      /*
       *  Caption Title
       */
      if ( title ) {
        var captionTitleProperties = {
          'margin': '0px',
          'padding': '0px',
          'fontWeight': 'normal',
          'fontSize': '40px',
          'letterSpacing': '0.5px',
          'lineHeight': '35px',
          'textAlign': 'left'
        }
        var captionTitle = document.createElement( 'h1' );
        applyProperties( captionTitle, captionTitleProperties );
        captionTitle.innerHTML = title;
        captionContainer.appendChild( captionTitle );
      }
      if ( caption ) {
        var captionTextProperties = {
          'margin': '0px',
          'padding': '0px',
          'fontWeight': 'normal',
          'fontSize': '20px',
          'letterSpacing': '0.1px',
          'maxWidth': '500px',
          'textAlign': 'left',
          'background': 'none',
          'marginTop': '5px'
        }
        var captionText = document.createElement( 'h2' );
        applyProperties( captionText, captionTextProperties );
        captionText.innerHTML = caption;
        captionContainer.appendChild( captionText );
      }
      container.appendChild( captionContainer );
      setDimensions();
      mouse.xCurr = mouse.xDest = window.innerWidth / 2;
      mouse.yCurr = mouse.yDest = window.innerHeight / 2;
      
      document.body.appendChild( container );
      setTimeout( function() {
        container.style[ 'opacity' ] = '1';
      }, 10);
    }
    function removeViewer() {
      unlockBody();
      unbindEvents();
      document.body.removeChild( container );
    }
    function setDimensions() {
      // Manually set height to stop bug where 
      var imageDimensions = getFit( sourceDimensions );
      target.width = imageDimensions.w;
      target.height = imageDimensions.h;
      horizontalOrientation = imageDimensions.fit;
      targetDimensions = { w: target.width, h: target.height };
      containerDimensions = { w: window.innerWidth, h: window.innerHeight };
      overflowArea = {x: containerDimensions.w - targetDimensions.w, y: containerDimensions.h - targetDimensions.h};
    }
    function init( element ) {
      var imageSource = element.getAttribute( 'data-image') || element.src;
      var title = element.getAttribute( 'data-title');
      var caption = element.getAttribute( 'data-caption');
      
      var img = new Image();
      img.onload = function() {
        sourceDimensions = { w: img.width, h: img.height }; // Save original dimensions for later.
        target = this;
        createViewer( title, caption );
        lockBody();
        bindEvents();
        loop();
      }
      img.src = imageSource;
    }
    function bindEvents() {
      container.addEventListener( 'mousemove', onMouseMove,   false );
      container.addEventListener( 'touchmove', onTouchMove,   false );
      window.addEventListener(    'resize',    setDimensions, false );
      window.addEventListener(    'keyup',     onKeyUp,       false );
      target.addEventListener(    'click',     removeViewer,  false );
    }
    function unbindEvents() {
      container.removeEventListener( 'mousemove', onMouseMove,   false );
      container.removeEventListener( 'touchmove', onTouchMove,   false);
      window.removeEventListener(    'resize',    setDimensions, false );
      window.removeEventListener(    'keyup',     onKeyUp,       false );
      target.removeEventListener(    'click',     removeViewer,  false )
    }
  
    function onMouseMove( event ) {
      mouse.xDest = event.clientX;
      mouse.yDest = event.clientY;
    }
    function onTouchMove( event ) {
      event.preventDefault(); // Needed to keep this event firing.
      mouse.xDest = event.touches[0].clientX;
      mouse.yDest = event.touches[0].clientY;
    }
    // Exit on excape key pressed;
    function onKeyUp( event ) {
      event.preventDefault();
      if ( event.keyCode === KEYCODE_ESC ) {
        removeViewer();
      } 
    }
  
    function positionTarget() {
      mouse.xCurr += ( mouse.xDest - mouse.xCurr ) * 0.05;
      mouse.yCurr += ( mouse.yDest - mouse.yCurr ) * 0.05;
      if ( horizontalOrientation === true ) {
        // HORIZONTAL SCANNING
        currentPosition += ( mouse.xCurr - currentPosition );
        if( mouse.xCurr !== lastPosition ) {
          var position = parseFloat( currentPosition / containerDimensions.w );
          position = overflowArea.x * position;
          target.style[ 'webkitTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          target.style[ 'MozTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          target.style[ 'msTransform' ] = 'translate3d(' + position + 'px, 0px, 0px)';
          lastPosition = mouse.xCurr;
        }
      } else if ( horizontalOrientation === false ) {
        // VERTICAL SCANNING
        currentPosition += ( mouse.yCurr - currentPosition );
        if( mouse.yCurr !== lastPosition ) {
          var position = parseFloat( currentPosition / containerDimensions.h );
          position = overflowArea.y * position;
          target.style[ 'webkitTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          target.style[ 'MozTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          target.style[ 'msTransform' ] = 'translate3d( 0px, ' + position + 'px, 0px)';
          lastPosition = mouse.yCurr;
        }
      }
    }
    function main( element ) {
      // Parse arguments
      if ( !element ) {
        throw 'You need to pass an element!';
      }
      startTracking( element );
    }
    return extend( main, {
        resize: setDimensions,
        start: start,
        stop: stop
    });
})();
  </script>
