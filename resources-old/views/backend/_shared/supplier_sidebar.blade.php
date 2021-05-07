<aside class="main-sidebar elevation-4 sidebar-light-info">
    <!-- Brand Logo -->
    <a href="{{ route('supplier_dashboard') }}" class="brand-link navbar-info" style="color: white;font-weight: bold;">
      <img src="http://webapps.iqlance-demo.com/done/public/fevicon/ms-icon-70x70.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-dark">KHALAS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://webapps.iqlance-demo.com/done/public/images/avtar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('supplier_dashboard') }}" class="d-block">Supplier Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
           <li class="nav-item has-treeview menu-open">
            <a href="{{ route('supplier_dashboard') }}" class="nav-link {{ request()->segment(1) == 'supplier' && request()->segment(2) == 'dashboard' ? 'active' : 'inactive' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
         <li class="nav-item has-treeview">
            <a href="{{route('companypro')}}" class="nav-link {{ request()->segment(1) == 'company' && request()->segment(2) == 'profile' ? 'active' : 'inactive' }}">
              <i class="nav-icon nav-icon fas fa-user-plus"></i>
              <p>
                Company Profile
                
              </p>
            </a>
        </li>
         <li class="nav-item has-treeview">
            <a href="{{route('myorder', 'pending')}}" class="nav-link {{ request()->segment(1) == 'my' && request()->segment(2) == 'order' ? 'active' : 'inactive' }}">
              <i class="nav-icon nav-icon fa fa-google-wallet"></i>
              <p>
                My Order
                
              </p>
            </a>
        </li>
         <li class="nav-item has-treeview">
            <a href="{{route('myoffer')}}" class="nav-link {{ request()->segment(1) == 'my' && request()->segment(2) == 'offers' || request()->segment(1) == 'offer' && request()->segment(2) == 'edit' ? 'active' : 'inactive' }}">
              <i class="nav-icon nav-icon fa fa-fw fa-gift"></i>
              <p>
                My Offer
                
              </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon nav-icon fa fa-sign-out"></i>
              <p>
                Logout
                
              </p>
            </a>
        </li>
        
        
         

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
