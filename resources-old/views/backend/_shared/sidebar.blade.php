<aside class="main-sidebar elevation-4 sidebar-light-navy">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link navbar-white" style="color: white;font-weight: bold;">
      <img src="{{ URL::asset('public/favicon_io/android-chrome-512x512.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;width: 22%;height: 44px;max-height: 45px !important;">
      <span class="brand-text font-weight-dark" style="color: #336b88;font-size: x-large;">MDC</span>
    </a>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-scrollbar-vertical-hidden os-host-transition os-host-foreign"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div><div class="os-resize-observer"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 599px;"></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 599px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible"><div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ env('APP_URL') }}public/images/avtar2.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="http://localhost/mdc/dashboard" class="d-block">MDC Admin</a>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link @if(Request::segment(1) == 'dashboard') active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>



          </li><li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'user' && Request::segment(2) == 'listing' || Request::segment(1) == 'user' && Request::segment(2) == 'view') active @endif">
              <i class="nav-icon nav-icon fas fa-user-plus"></i>
              <p>
                Members
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link inactive">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>

         </li><li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'offer' && Request::segment(2) == 'listing' || Request::segment(1) == 'offer' && Request::segment(2) == 'add' || Request::segment(1) == 'offer' && Request::segment(2) == 'edit') active @endif">
              <i class="nav-icon nav-icon fas fa-gifts"></i>
              <p>
                Offers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('offer.add') }}" class="nav-link @if(Request::segment(1) == 'offer' && Request::segment(2) == 'add' ) active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Offer</p>
                </a>
              </li>
          </ul>
          
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('offer.index') }}" class="nav-link inactive">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>

        </li><li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'hospital' && Request::segment(2) == 'listing' || Request::segment(1) == 'hospital' && Request::segment(2) == 'add' || Request::segment(1) == 'hospital' && Request::segment(2) == 'view' || Request::segment(1) == 'hospital' && Request::segment(2) == 'edit' ||  Request::segment(1) == 'hospital' && Request::segment(2) == 'service')  active @endif">
              <i class="nav-icon nav-icon fa fa-medkit"></i>
              <p>
                Hospital
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('hospital.add') }}" class="nav-link @if(Request::segment(1) == 'hospital' && Request::segment(2) == 'add') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Hospital</p>
                </a>
              </li>
          </ul>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('hospital.index') }}" class="nav-link @if(Request::segment(1) == 'hospital' && Request::segment(2) == 'listing') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>

         </li><li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'card' && Request::segment(2) == 'request'  || Request::segment(1) == 'card' && Request::segment(2) == 'family'  && Request::segment(3) == 'vieww'  || Request::segment(1) == 'card' && Request::segment(2) == 'single'  && Request::segment(3) == 'view'  || Request::segment(1) == 'card' && Request::segment(2) == 'single' && Request::segment(3) == 'view' ) active @endif">
              <i class="nav-icon nav-icon fa fa-id-card-o"></i>
              <p>
                Request Card
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('request.single') }}" class="nav-link @if(Request::segment(1) == 'card' && Request::segment(2) == 'single' && Request::segment(3) == 'view' || Request::segment(1) == 'card' && Request::segment(2) == 'request' && Request::segment(3) == 'single') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Single Card </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('request.family') }}" class="nav-link @if(Request::segment(1) == 'card' && Request::segment(2) == 'family' && Request::segment(3) == 'vieww' || Request::segment(1) == 'card' && Request::segment(2) == 'request' && Request::segment(3) == 'vieww' || Request::segment(1) == 'card' && Request::segment(2) == 'request' && Request::segment(3) == 'family') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Family Card</p>
                </a>
              </li>

          </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'cardtype' && Request::segment(2) == 'listing' || Request::segment(1) == 'cardtype' && Request::segment(2) == 'add' || Request::segment(1) == 'cardtype' && Request::segment(2) == 'view' || Request::segment(1) == 'cardtype' && Request::segment(2) == 'edit' ||  Request::segment(1) == 'cardtype' && Request::segment(2) == 'service')  active @endif">
              <i class="nav-icon nav-icon fa fa-id-card"></i>
              <p>
                Card Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('cardtype.add') }}" class="nav-link @if(Request::segment(1) == 'cardtype' && Request::segment(2) == 'add') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Card Type</p>
                </a>
              </li>
          </ul>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('cardtype.index') }}" class="nav-link @if(Request::segment(1) == 'cardtype' && Request::segment(2) == 'listing') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'documenttype' && Request::segment(2) == 'listing' || Request::segment(1) == 'documenttype' && Request::segment(2) == 'add' || Request::segment(1) == 'documenttype' && Request::segment(2) == 'view' || Request::segment(1) == 'documenttype' && Request::segment(2) == 'edit' ||  Request::segment(1) == 'documenttype' && Request::segment(2) == 'service')  active @endif">
              <i class="nav-icon nav-icon fa fa-id-card"></i>
              <p>
                Document Type
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('documenttype.add') }}" class="nav-link @if(Request::segment(1) == 'documenttype' && Request::segment(2) == 'add') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Document Type</p>
                </a>
              </li>
          </ul>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('documenttype.index') }}" class="nav-link @if(Request::segment(1) == 'documenttype' && Request::segment(2) == 'listing') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'notification' && Request::segment(2) == 'listing' )  active @endif">
              <i class="nav-icon nav-icon fa fa-envelope"></i>
              <p>
               Notifications
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('notification.index') }}" class="nav-link @if(Request::segment(1) == 'notification' && Request::segment(2) == 'listing') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listing</p>
                </a>
              </li>
          </ul>
        </li>
        
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'policy' && Request::segment(2) == 'view' )  active @endif">
              <i class="nav-icon nav-icon fa fa-lock" style="font-size: 20px;"></i>
              <p>
               Privacy Policy
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('policy.view') }}" class="nav-link @if(Request::segment(1) == 'policy' && Request::segment(2) == 'view') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
          </ul>
        </li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'condition' && Request::segment(2) == 'view' || Request::segment(1) == 'condition' && Request::segment(2) == 'edit' )  active @endif">
              <i class="nav-icon nav-icon fa fa-gear" style="font-size: 20px;"></i>
              <p>
               Terms of Service
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('condition.view') }}" class="nav-link @if(Request::segment(1) == 'condition' && Request::segment(2) == 'view') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
          </ul>
        </li>

        
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link @if(Request::segment(1) == 'aboutus' && Request::segment(2) == 'view' || Request::segment(1) == 'aboutus' && Request::segment(2) == 'edit')  active @endif">
              <i class="nav-icon nav-icon fas fa-copyright"></i>
              <p>
               About Us
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('aboutus.view') }}" class="nav-link @if(Request::segment(1) == 'aboutus' && Request::segment(2) == 'view') active @endif">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View</p>
                </a>
              </li>
          </ul>
        </li>



            <li class="nav-item has-treeview">
            <a href="{{ route('web.logout') }}" class="nav-link">
              <i class="nav-icon nav-icon fa fa-sign-out"></i>
              <p>
                Logout

              </p>
            </a>
        </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track"><div class="os-scrollbar-handle" style="height: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    <!-- /.sidebar -->
  </aside>
