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


            <div class="row justify-content-center" >
              @foreach($service as $services)

              <div class="col-md-4 col-sm-6">
                  <div id="serv_hover" class="service" style="border: 1px solid grey; padding: 15px; border-radius: 5px; background-color:  #ebfff5; margin-bottom: 20px;">
                      <div class="service_img" style="display: flex; justify-content: center; align-items: center;">
                          <figure><img style="height:200px; width:350px" src="service/{{$services->image}}" alt="#"/></figure>
                      </div>

                      <div class="1_service" style="text-align: center;">
                          <h3 style="font-weight: bold;" >{{$services->service_title}}</h3>
                          <p style="padding:20px">{!! Str::limit($services->description,100) !!}</p>
                          
                          <a class="btn btn-primary" href="{{url('detail_service',$services->id)}}">Service Details</a>
                      </div>
                  </div>
              </div>

              @endforeach

        
       </div>
    </div>
 </div>




{{-- -------------------------------------------------------------------------------------------------------- --}}

 {{-- CSS --}}
 <style>
    .service:hover {
        box-shadow: 0px 0px 10px rgba(255, 0, 0, 0.5);
    }
    </style>