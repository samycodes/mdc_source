
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
    <link rel="shortcut icon" href="{{ env('APP_URL') }}/public/favicon_io/icon.png">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/public/assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ env('APP_URL') }}/public/assets/css/style.css" />
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
                        <img src="{{ env('APP_URL') }}/public/assets/img/loader/loader.svg" alt="loader">
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
                                        <img src="{{ env('APP_URL') }}public/favicon_io/apple-touch-icon.png" style="width: 80px;height: 100% !important;" class="img-fluid logo-desktop" alt="logo" />
                                        
                                        </a>
                                    </div><br>
                                        <p>Welcome Back, Please Login To Your Account.</p>

                                        @if(session('error'))<br><div class="alert alert-outline-danger"><i class="fa fa-info-circle"></i> {{ session('error') }}</div>
                                        @endif
                                        @if(session('success'))<br><div class="alert alert-outline-success">{{ session('success') }}</div>@endif

                                        <form action="{{ route('doLogin')}}" method="POST" class="mt-3 mt-sm-5">
                                            @CSRF 
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">User Email</label>
                                                        <input type="text" class="form-control" placeholder="User Email" autocomplete="off" name="email" value="{{ old('email') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input type="password" class="form-control" placeholder="Password" autocomplete="off" name="password" value="{{ old('password') }}" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit"  style="background: linear-gradient(to right,#879aa5 0,#e2f4fc 100%)!important;" class="btn  text-uppercase">Sign In</button>
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                
                                <div class="row align-items-center h-100" style="background: linear-gradient(to right,#e2f5fc 0,#e0f4fcf5 100%)!important;">
                                    <div class="">
                                        <img class="" src="{{ env('APP_URL') }}public/images/O6RBXH0.jpg" alt="" style="height: 656px;width: 100%;padding: -10px;margin-left: 17%;">
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
    <script src="{{ env('APP_URL') }}/public/assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="{{ env('APP_URL') }}/public/assets/js/app.js"></script>
</body>


</html>