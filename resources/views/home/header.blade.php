   <!-- header inner -->
   <div class="header" style="background-color: #9AD0C2;"> 
    <div class="container">
       <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
             <div class="full">
                <div class="center-desk">
                   <div class="logo">
                    {{-- logo NDL --}}
                      <a href="{{ url('/') }}"> <img src="{{ asset('images/logoNDL1.png') }}" alt="Logo" style="width: 120px; height: auto;" /></a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
             <nav class="navigation navbar navbar-expand-md navbar-dark  ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                   <ul class="navbar-nav mr-auto">
                           <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ url('/') }}">Home</a>
                           </li>
                           <li class="nav-item {{ Request::is('about_us') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ url('about_us') }}">About</a>
                           </li>
                           <li class="nav-item {{ Request::is('my_appointments') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ url('my_appointments') }}">Appointment</a>
                           </li>
                        
                           <li class="nav-item {{ Request::is('calendar') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ url('calendar') }}">Calendar</a>
                           </li>

                           <li class="nav-item {{ Request::is('policy') ? 'active' : '' }}">
                              <a class="nav-link" href="{{ url('policy') }}">Policy</a>
                           </li>

                        <li class="nav-item {{ Request::is('contact_us') ? 'active' : '' }}">
                           <a class="nav-link" href="{{ url('contact_us') }}">Contact</a>
                        </li>

                        
                        {{-- Login and Register button --}}
                           @if (Route::has('login'))
                           @auth
                               <x-app-layout>
                              
                               </x-app-layout>
                           @else
                               <li class="nav-item" style="padding-right: 10px;">
                                   <a class="btn btn-success" href="{{ url('login') }}">Login</a>
                               </li>
                               @if (Route::has('register'))
                                   <li class="nav-item">
                                       <a class="btn btn-primary" href="{{ url('register') }}">Register</a>
                                   </li>
                               @endif
                           @endauth
                        @endif
                     </ul>

                </div>
             </nav>
          </div>
       </div>
    </div>
 </div>