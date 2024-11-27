<!DOCTYPE html>
<html>
  <head> 
    <title>view_service</title>

    @include('admin.css')

            <style type="text/css">

                .table_deg
                {
                    border: 2px solid white;
                    width: 80%;
                    margin: auto;
                    text-align: center;
                    margin-top: 40px;
                }

                .th_deg
                {
                    background-color: skyblue;
                    padding: 15px;
                }

                tr
                {
                    border: 3px solid white;
                }

                td
                {
                    padding: 10px;
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


                <table class="table_deg">
                    <tr>
                       <th class="th_deg">Booking Title</th>
                       <th class="th_deg">Description</th>
                       <th class="th_deg">Price</th>
                       <th class="th_deg">Booking Type</th>
                       <th class="th_deg">Image</th>

                       <th class="th_deg">Delete</th>
                       <th class="th_deg">Update</th>
                    </tr>
        
                    @foreach($data as $data)
                    <tr>
                        <td>{{$data->service_title}}</td>
                        <td>{!! Str::limit($data->description,150) !!}</td>
                        <td>RM{{$data->price}}</td>
                        <td>{{$data->service_type}}</td>
                        <td><img width= "100" src="service/{{$data->image}}"></td>

                        <td> <a onclick="confirmation(event)" class= "btn btn-danger" href="{{url('delete_service',$data->id)}}">Delete</a></td>
                        
                        <td> <a class= "btn btn-warning" href="{{url('update_service',$data->id)}}">Update</a></td>
                    </tr>
        
                    @endforeach
                </table>


              </div>
            </div>
        </div>
         
    @include('admin.footer')
      
  </body>
</html>