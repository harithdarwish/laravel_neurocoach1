<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    <nav id="sidebar">
      <!-- Sidebar Header-->
      <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="admin/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
          <h1 class="h5">NC Admin</h1>
          <p>NDL of IIUM</p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main Menu</span>
      <ul class="list-unstyled">
              <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{url('/home')}}"> <i class="icon-home" style="color: #DB6574;"></i>Home </a></li>
              
              <li><a href="#servicedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows" style="color: #DB6574;"></i>Service Management </a>
                <ul id="servicedropdownDropdown" class="collapse list-unstyled {{ Request::is('create_service', 'view_service', 'reminder') ? 'show' : '' }}">
                  <li class="{{ Request::is('create_service') ? 'active' : '' }}"><a href="{{url('create_service')}}">Add Service</a></li>
                  <li class="{{ Request::is('view_service') ? 'active' : '' }}"><a href="{{url('view_service')}}">View Service</a></li>
                  
                  <li class="{{ Request::is('reminder') ? 'active' : '' }}"><a href="{{url('reminder')}}">Reminder</a></li>
                </ul>
              </li>

              <li class="{{ Request::is('appointments') ? 'active' : '' }}"><a href="{{url('appointments')}}"> <i class="fa fa-calendar" style="color: #DB6574;"></i>Appointments</a></li>

              <li class="{{ Request::is('view_gallary') ? 'active' : '' }}"><a href="{{url('view_gallary')}}"> <i class="fa fa-camera" style="color: #DB6574;"></i>Gallary</a></li>

              <li><a href="#reportdropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-folder" style="color: #DB6574;"></i>Report Management</a>
                <ul id="reportdropdownDropdown" class="collapse list-unstyled {{ Request::is('create_report', 'view_report') ? 'show' : '' }}">
                  <li class="{{ Request::is('create_report') ? 'active' : '' }}"><a href="{{url('create_report')}}">Add Report</a></li>
                  <li class="{{ Request::is('view_report') ? 'active' : '' }}"><a href="{{url('view_report')}}">View Report</a></li>
                </ul>
              </li>

              <li><a href="#invoicedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-file" style="color: #DB6574;"></i>Payment and Invoice</a>
                <ul id="invoicedropdownDropdown" class="collapse list-unstyled {{ Request::is('create_invoice', 'view_invoice', 'view_payment') ? 'show' : '' }}">
                  <li class="{{ Request::is('create_invoice') ? 'active' : '' }}"><a href="{{url('create_invoice')}}">Add Invoice</a></li>
                  <li class="{{ Request::is('view_invoice') ? 'active' : '' }}"><a href="{{url('view_invoice')}}">View Invoice</a></li>
                  <li class="{{ Request::is('view_payment') ? 'active' : '' }}"><a href="{{url('view_payment')}}">View Payment</a></li>
                </ul>
              </li>

              <li class="{{ Request::is('all_messages') ? 'active' : '' }}" ><a href="{{url('all_messages')}}"> <i class="fa fa-envelope" style="color: #DB6574;"></i>Messages</a></li>
      </ul>

    </nav>