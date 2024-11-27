<!DOCTYPE html>
<html>
  <head> 
    <title>update_service</title>

    {{-- to get the css --}}
    <base href="/public"> 

    @include('admin.css')

            <style type="text/css">
                label
                {
                    display: inline-block;
                    width: 200px;
                }
                .div_deg
                {
                    padding-top: 30px;
                }
                .div_center
                {
                    text-align: center;
                    padding-top: 40px;
                }
            </style>

  </head>
  <body>
   
    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->


        <div class="page-content">
            <div class="page-header">
              <div class="container-fluid">


                <div class="div_center">
                    <h1 style="font-size: 30px; font-weight:bold">Update Booking</h1>
                    <form action="{{url('edit_service',$data->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_deg">
                            <label>Service Title</label>
                            <input type="text" name="title" value="{{$data->service_title}}">
        
                        </div>
                        <div class="div_deg">
                            <label>Description</label>
                            <textarea name="description">{{$data->description}}</textarea>
        
                        </div>
                        <div class="div_deg">
                            <label>Price</label>
                            <input type="number" name="price" value="{{$data->price}}">
        
                        </div>
                        <div class="div_deg">
                            <label>Service Type</label>
                            <select name="type">
                                <option selected value="{{$data->service_type}}">{{$data->service_type}}</option>
        
                                <option value="EEG & ALERTNESS">EEG & ALERTNESS</option>
                                <option value="BRAIN TRAINING">BRAIN TRAINING</option>
                            </select>
                        </div>
        
                        <div class="div_deg">
                            <label>Current Image</label>
                            <img style="margin:auto;" width="100" src="/service/{{$data->image}}">
                        </div>
        
        
                        <div class="div_deg">
                            <label>Upload Image</label>
                            <input type="file" name="image">
                        </div>
        
                        <div class="div_deg">
                            <input class="btn btn-primary" type="submit" value="Update Booking">
                        </div>
                    </form>
                </div>


              </div>
            </div>
        </div>
         
    @include('admin.footer')
      
  </body>
</html>