<section class="banner_main">
   <div class="static-box">
       <h2>Discover Your Potential</h2>
       <p>Unlock your brain's potential with our advanced services. Start your journey today!</p>
       <a href="#our-service-section" class="btn btn-primary">Book Now</a>
   </div>

   <div id="myCarousel" class="carousel slide banner" data-ride="carousel" data-interval="5000"> <!-- 10-second auto-slide -->
       <ol class="carousel-indicators">
           <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
           <li data-target="#myCarousel" data-slide-to="1"></li>
           <li data-target="#myCarousel" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
           <!-- First Slide to Third Slide -->
           <div class="carousel-item active">
               <img class="first-slide" src="{{ asset('images/slideNDL1.jpg') }}" alt="First slide" style="width: 100%; height: 500px; object-fit: cover;">
           </div>
      
           <div class="carousel-item">
               <img class="second-slide" src="{{ asset('images/slideNDL2.jpg') }}" alt="Second slide" style="width: 100%; height: 500px; object-fit: cover;">
           </div>
   
           <div class="carousel-item">
               <img class="third-slide" src="{{ asset('images/slideNDL3.jpg') }}" alt="Third slide" style="width: 100%; height: 500px; object-fit: cover;">
           </div>
       </div>
       <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
       </a>
   </div>
</section>

<!-- CSS for Transparent Box -->
<style>
   .banner_main {
       position: relative;
   }

   .static-box {
       position: absolute;
       top: 50%;
       left: 50%;
       transform: translate(-50%, -50%);
       background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
       color: white; /* White font for title and description */
       text-align: center;
       padding: 20px;
       border-radius: 10px;
       max-width: 500px;
       width: 80%;
       z-index: 10; /* Ensures it stays above the carousel */
   }

   .static-box h2 {
       font-size: 24px;
       margin-bottom: 10px;
       color: white; /* White font for the title */
   }

   .static-box p {
       font-size: 16px;
       margin-bottom: 20px;
       color: white; /* White font for the description */
   }

   .static-box .btn {
       font-size: 16px;
       padding: 10px 20px;
   }

   #myCarousel {
       position: relative;
       z-index: 1; /* Ensures the carousel stays below the static box */
   }

   .carousel-inner img {
       transition: transform 1s ease-in-out;
   }

   .carousel-indicators {
    position: absolute;
    bottom: 20px; /* Adjust this value to position the indicators below the static box */
    left: 43%;
    transform: translateX(-50%);
    z-index: 20; /* Ensures the indicators are above the carousel images */
}

</style>
