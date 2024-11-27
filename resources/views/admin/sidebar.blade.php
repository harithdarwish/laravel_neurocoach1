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
              <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
              
              <li><a href="#servicedropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows" style="color: #DB6574;"></i>Service Management </a>
                <ul id="servicedropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="{{url('create_service')}}">Add Service</a></li>
                  <li><a href="{{url('view_service')}}">View Service</a></li>
                  <li><a href="#">Reminder</a></li>
                </ul>
              </li>

              <li><a href="{{url('appointments')}}"> <i class="fa fa-calendar" style="color: #DB6574;"></i>Appointments</a></li>
             
              <li><a href="{{url('all_messages')}}"> <i class="fa fa-envelope" style="color: #DB6574;"></i>Messages</a></li>
      </ul>

    </nav>