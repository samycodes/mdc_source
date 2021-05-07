<!DOCTYPE html>
<html lang="en">
<head>
@include('backend._shared.header')   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
    <!-- Left navbar links -->
   
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
       <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">@if(isset($activityCount)) {{ $activityCount }} @endif</span>
        </a>
        
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">@if(isset($activityCount)) {{ $activityCount }} @endif Notifications</span>
          
          
          @if($recentActivities)
        
            @foreach($recentActivities as $data)
            
              <a href="{{ route('notification.index') }}" data-toggle="tooltip" title="New Notification!" class="dropdown-item">
                <i class="fas fa-envelope mr-2"></i> {{ $data->title }}
                <div class="dropdown-divider"></div>
                <span class="float-right text-muted text-sm">{{ Carbon\Carbon::parse($data->crealted_at)->diffForHumans()  }}</span>
              </a>
              <div class="dropdown-divider"></div>
             @endforeach
        @endif 
          
          <div class="dropdown-divider"></div>
          <a href="{{ route('notification.index') }}" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
        
      </li>
    
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('web.logout') }}" data-toggle="tooltip" title="Logout" role="button">
          <i class="fa fa-sign-out"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
  
    @include('backend._shared.sidebar')   

  
  
  <!-- Main Sidebar Container -->
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <section class="content">
      <div class="container-fluid">
    <!-- Main content -->
    @include('backend.include.flash-message') 
    @yield('content')
    <!-- /.content -->
  
</div>
</div>
  
  
  
  </div>
  <!-- /.content-wrapper -->
  @include('backend._shared.footer') 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
@include('backend._shared.footer_script') 
</body>
</html>
