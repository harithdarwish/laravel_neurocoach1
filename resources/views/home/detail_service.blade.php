<!DOCTYPE html>
<html lang="en">
   <head>
     <title>detail_service</title>

     <base href="/public">

     @include('home.css')

     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <style type="text/css">
      
      .service:hover {
          box-shadow: 0px 0px 10px rgba(255, 0, 0, 0.5);
      }


      label
         {
             display: inline-block;
             width: 200px;
         }
      
         input
         {
             width: 100%;
         }

      </style>


    

   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
        @include('home.header')
      </header>
    
      
              <div  class="our_service" style="background-color: #F7F4EF;" > 
                <div class="container">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="titlepage"  style="margin-top: 20px;">
                            <h2>Our Service</h2>
                            <p>Unlock your brain's potential with our offered services!</p>
                         </div>
                      </div>
                   </div>
               
               
                        <div class="row" >

                                    <div class="col-md-8">
                                       <div id="serv_hover" class="service"  style="border: 1px solid grey; padding: 15px; border-radius: 5px; background-color:  #ebfff5; margin-bottom: 20px;">
                                         <div style="padding:20px" class="service_img" style="display: flex; justify-content: center; align-items: center;">
                                               <img style="height:300px; width:1000px" src="/service/{{$service->image}}" alt="#"/>
                                           </div>
                                       
                                           <div class="1_service" style="text-align: center;">
                                             <h2>{{$service->service_title}}</h2>
                                             <p style="padding: 12px">{{$service->description}}</p>
                                             <h4 style="padding: 12px"> service Type : {{$service->service_type}}</h4>
                                             <h3 style="padding: 12px"> Price : RM{{$service->price}}</h3>
                                    
                                          </div>
                                       </div>
                                    </div>
                      
                                    {{-- Appointment Form --}}

                                    <div class="col-md-4">

                                       <h1 style="font-size: 35px!important;">Book Appointment</h1>
                       
                                       <div>
                       
                                       @if(session()->has('message'))
                       
                                       <div class="alert alert-success">
                       
                                           <button type="button" class="close" data-bs-dismiss="alert">X</button>
                       
                                       {{session()->get('message')}}
                       
                                       </div>
                       
                                       @endif
                       
                                      </div>
                       
                                       @if($errors)
                       
                                       @foreach($errors->all() as $errors)
                       
                                       <li>{{$errors}}</li>
                       
                                       @endforeach
                       
                                       @endif
                       
                                       <form action="{{url('add_appointment',$service->id)}}" method="Post">
                                           @csrf
                       
                                       <div>
                                           <label>Name</label>
                                           <input type="text" name="name" @if(Auth::id()) value="{{Auth::user()->name}}" @endif>
                                       </div>
                       
                                       <div>
                                           <label>Email</label>
                                           <input type="email" name="email" @if(Auth::id()) value="{{Auth::user()->email}}" @endif>
                                       </div>
                       
                                       <div>
                                           <label>Phone</label>
                                           <input type="number" name="phone" @if(Auth::id()) value="{{Auth::user()->phone}}" @endif>
                                       </div>
                       
                                       <div>
                                          <label>Date</label>
                                          <input type="date" name="sDate" id="startDate">
                                      </div>

                                       <div>
                                           <label>Start Time</label>
                                           <input type="time" name="startTime" id="startTime">
                                       </div>
                       
                                       <div>
                                           <label>End Time</label>
                                           <input type="time" name="endTime" id="endTime">
                                       </div>
                       
                                      
                                       <div style="padding-top:20px;">
                                           <input type="submit" style="background-color: rgb(20, 35, 238)" class="btn btn-primary" value="Book Appointment">
                                       </div>
                       
                                   </form>
                       
                                     </div>
                       





                        
                      
                      
                   </div>
                </div>
             </div>


     <!--  footer -->
     @include('home.footer')


      {{-- Calender --}}
     <script type="text/javascript">
      $(function(){
      var dtToday = new Date();
  
      var month = dtToday.getMonth() + 1;
  
      var day = dtToday.getDate();
  
      var year = dtToday.getFullYear();
  
      if(month < 10)
          month = '0' + month.toString();
  
      if(day < 10)
       day = '0' + day.toString();
  
      var maxDate = year + '-' + month + '-' + day;
      $('#startDate').attr('min', maxDate);
  
      });
      </script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

     
   </body>
</html>