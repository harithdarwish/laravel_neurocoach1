<!DOCTYPE html>
<html>
  <head>
    <title>appointment</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@include('admin.css')
<style type="text/css">

    .table_deg
    {
        border: 2px solid white;
        width: 100%;
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

<div class="page-content">
    <div class="page-header">
      <div class="container-fluid">

        <table class="table_deg">
            <tr>
               <th class="th_deg">ID</th>
               <th class="th_deg">Appointment Type</th>
               <th class="th_deg">Patient Name</th>
               <th class="th_deg">Email</th>
               <th class="th_deg">Phone</th>
               <th class="th_deg">Start</th>
               <th class="th_deg">End</th>
               <th class="th_deg">Date</th>
               <th class="th_deg">Status</th>
               <th class="th_deg">Delete</th>
               <th class="th_deg">Status Update</th>
               <th class="th_deg">Send Mail</th>
            </tr>

            @foreach($data as $data)
            <tr>
                <td>{{$data->appointment_id}}</td>
                <td>{{$data->service->service_type}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->start_time}}</td>
                <td>{{$data->end_time}}</td>
                <td>{{$data->ondate}}</td>
                <td>
                    @if($data->status == 'APPROVE')
                    <span style="color: skyblue;">APPROVED</span>
                    @endif

                    @if($data->status == 'REJECTED')
                    <span style="color: red;">REJECTED</span>
                    @endif

                    @if($data->status == 'waiting')
                    <span style="color: yellow;">WAITING</span>
                    @endif
                </td>
                <td> <a onclick="return confirm('Are you sure you want to delete this appointment?');" class="btn btn-danger" href="{{ url('delete_appointment', $data->id) }}">Delete</a></td>
               
                <td>
                    <span style="padding-bottom: 10px;">
                         <a class="btn btn-success" href="{{url('approve_appointment',$data->id)}}">Approve</a> </span>
                    <a class="btn btn-warning" href="{{url('rejected_appointment',$data->id)}}">Rejected</a>
                </td>

                <td><a class= "btn btn-success" href="{{url('send_mail',$data->id)}}">Send Mail</a></td>
            </tr>

            @endforeach

        </table>

      </div>
    </div>
</div>

        @include('admin.footer')

        {{-- <script type= "text/javascript">
            function confirmation(ev)
            {
              ev.preventDefault();

              var urlToRedirect=ev.currentTarget.getAttribute('href');

              console.log(urlToRedirect);

              swal({

                title: "Are you Sure to delete this ",

                text: "You won't be able to revert this delete ",

                icon: "warning",

                buttons: true,

                dangerMode: true ,
              })

              .then((willCancel)=>
              {

                if(willCancel)
              {
                window.location.href=urlToRedirect;
              }

              });
            }
            </script> --}}
  </body>
</html>