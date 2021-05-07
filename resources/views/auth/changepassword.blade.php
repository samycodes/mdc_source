
<!DOCTYPE html>
<html lang="en">


<head>
    <title>MDC - Admin Panel</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{URL::asset('public/favicon_io/icon.png') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <!-- {{ URL::asset('assets/images/logo.png') }} -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/css/vendors.css') }} " />

    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('public/assets/css/style.css') }}" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{ URL::asset('public/assets/img/loader/loader.svg') }}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh" >
                                    <div class="login p-50">
                                    <div class="navbar-header d-flex align-items-center">
                                        <a href="javascript:void:(0)" class="mobile-toggle"></a>
                                        <a class="navbar-brand" href="#">
                                        <h3 style="color:#2e7b94;">Let's Change Your Password</h3>
                                        </a>
                                    </div><br>
                                       

                                        <!-- @if(session('error'))<br><div class="alert alert-outline-danger"><i class="fa fa-info-circle"></i> {{ session('error') }}</div>
                                        @endif
                                        @if(session('success'))<br><div class="alert alert-outline-success">{{ session('success') }}</div>@endif -->

                                        <form class="mt-3 contactForm" enctype="multipart/form-data" id="contactForm">
                                            @csrf
                                            <div class="row">
                                               
                                               <div class="col-10">
                                                    <div class="form-group">
                                                    <i class="fa fa-eye-slash toggle-password" aria-hidden="true" style="color: #a6a9c7;font-size: 17px;"></i><label class="control-label" style="margin-left: 10px;">Current Password</label>
                                                        <input type="password" id="pass_log_id" class="form-control" placeholder="Current Password" autocomplete="off" name="current" value="{{ old('current') }}" />
                                                        @if ($errors->has('current'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('current') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                    <i class="fa fa-eye-slash toggle-password2" aria-hidden="true" style="color: #a6a9c7;font-size: 17px;"></i><label class="control-label" style="margin-left: 10px;">New Password</label>
                                                        <input type="password" id="pass_log_id2"  class="form-control" placeholder="New Password" autocomplete="off" name="new" value="{{ old('new') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-group">
                                                    <i class="fa fa-eye-slash toggle-password3" aria-hidden="true" style="color: #a6a9c7;font-size: 17px;"></i><label class="control-label" style="margin-left: 10px;">Confirm Password</label>
                                                        <input type="password" id="pass_log_id3" class="form-control" placeholder="Confirm Password" autocomplete="off" name="confirm" value="{{ old('confirm') }}" />
                                                    </div>
                                                </div>
                                                

                                                <div class="col-12 mt-3">
                                                    <button type="submit"  style="background: linear-gradient(to right,#1d7592 0,#e2f4fc 100%)!important;" class="btn  text-uppercase">Submit</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                
                                <div class="row align-items-center h-100" style="background: linear-gradient(to right,#e2f5fc 0,#e0f4fcf5 100%)!important;">
                                    <div class="">
                                        <img class="" src="{{URL::asset('public/images/kcSWly4k.jpeg') }}" alt="" style="height: 656px;width: 100%;padding: -10px;">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="{{URL::asset('public/assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{URL::asset('public/assets/js/app.js')}}"></script>
</body>


</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ URL::asset('public/js/toast.js')}}"></script>
    
<script src="{{ URL::asset('public/js/jquery.toaster.js')}}"></script>


<script>


$("body").on('click', '.toggle-password', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

$("body").on('click', '.toggle-password2', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id2");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

$("body").on('click', '.toggle-password3', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $("#pass_log_id3");
  if (input.attr("type") === "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }

});

$(document).on('submit', '.contactForm', function(e) {
        e.preventDefault();
        
        
        $.ajax({
        url: "/mdc/change/password",
        data: new FormData($("#contactForm")[0]),
        method : "POST",
        processData : false,
        contentType : false,
        success : function(response)
        {
           console.log(response);
          if (response.success) {
             
              $.toaster({ priority : 'success', title : 'Success', message : 'Your Password Change Successfully'});
              window.location = '/mdc/login';
              
              
            }else{
                console.log(response.error);
                $.toaster({ priority : 'danger', title : 'Error', message : response.error });
                
            }
        },
        error:function(error){
           
           $.toaster({ priority : 'danger', title : 'Error', message : response.error });
           
        
        }
        
        });
});
 
</script>