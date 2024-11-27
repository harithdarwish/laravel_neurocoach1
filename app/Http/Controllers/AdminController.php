<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 
use Illuminate\Http\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;

use App\Models\Appointment;

use App\Models\Contact;

//Send Mail
use Notification;
use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    //
        public function index()
        {
            if (Auth::id()) 
            {
                $usertype = Auth()->user()->usertype;

                if ($usertype == 'user') {

                    $service = Service::all();
                    // $gallary = Gallary::all();
                    return view('home.index', compact('service'));
                   
                } 
                else if ($usertype == 'admin') 
                {
                    return view('admin.index');
                }
                else 
                {
                    return redirect()->back();
                }
            }
        }


        
        public function home()
        {
            $service = Service::all();
            // $gallary = Gallary::all();
            return view('home.index',compact('service'));
         
        }

        public function create_service()
    {
        return view('admin.create_service');
    }

    public function add_service(Request $request)
    {
        //  Service model table = create_service form using add_service function
        $data = new Service();

        $data->service_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->service_type = $request->type;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('service',$imagename);

            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function view_service()
    {
        $data = Service::all();

        return view('admin.view_service',compact('data'));

    }

    public function delete_service($id)
    {
        $data = Service::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function update_service($id)
    {
        $data = Service::find($id);

        return view('admin.update_service',compact('data'));
    }

    public function edit_service(Request $request, $id)
    {
        $data = Service::find($id);

        $data->service_title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->service_type = $request->type;

        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('service',$imagename);

            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }

    // admin manage the appointment
    public function appointments()
    {
        $data = Appointment::all();
        return view('admin.appointment',compact('data'));

    }

    public function delete_appointment($id)
    {
        $data = Appointment::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function approve_appointment($id)
    {
        $appointment = Appointment::find($id);

        $appointment->status='APPROVE';

        $appointment->save();

        return redirect()->back();
    }

    public function rejected_appointment($id)
    {
        $appointment = Appointment::find($id);

        $appointment->status='REJECTED';

        $appointment->save();

        return redirect()->back();
    }


    //Contact_Us
    public function all_messages()
    {
        $data = Contact::all();

        return view('admin.all_messages',compact('data'));
    }

    public function send_mail($id)
    {
        $data = Appointment::find($id);

        return view('admin.send_mail',compact('data'));
    }

    public function mail(Request $request,$id)
    {
        $data = Appointment::find($id);

        $details = [
            'greeting' => $request->greeting,

            'body' => $request->body,

            'action_text' => $request->action_text,

            'action_url' => $request->action_url,

            'endline' => $request->endline,
        ];

        // Notification::send($data,new SendEmailNotification($details));
        // Send notification
        $data->notify(new SendEmailNotification($details));

        return redirect()->back();
    }



}
