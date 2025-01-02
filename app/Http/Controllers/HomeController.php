<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Service;

use App\Models\Appointment;

use App\Models\Contact;

use App\Models\User;

use App\Models\Payment;

use App\Models\Gallary;

//Calender
use Carbon\Carbon;

class HomeController extends Controller
{
    //
    public function detail_service($id)
    {

        $service = Service::find($id);

        return view('home.detail_service',compact('service'));

    }

    // 
    public function add_appointment(Request $request, $id)
    {
        $user = auth()->user();
        $data = new Appointment;

        $data->appointment_id = $id;

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;


        $startTime = $request->startTime;

        $endTime = $request->endTime;

        $onDate = $request->sDate;

        // Check for overlapping appointments on the same date
        $isBooked = Appointment::where('ondate', $onDate) // Ensure same date
            ->where(function ($query) use ($startTime, $endTime) {
                $query->where(function ($q) use ($startTime, $endTime) {
                    // Check for overlap with any existing appointment
                    $q->where('start_time', '<', $endTime)
                      ->where('end_time', '>', $startTime);
                });
            })->exists();

        // $isBooked = Appointment::where('appointment_id',$id)
        // ->where('start_time','<=',$endTime)
        // ->where('end_time','>=',$startTime)->exists();

        if($isBooked)
        {
            return redirect()->back()->with('message','Appointment is already taken, please try different time');
        }

                // Save the new appointment
            $data->start_time = $startTime;
            $data->end_time = $endTime;
            $data->ondate = $onDate;
            $data->user_id = $user->id; 

            $data->save();

            return redirect()->back()->with('message', 'Booking Appointment Successfully');

        // else
        // {
        // $data->start_time = $request->startTime;

        // $data->end_time = $request->endTime;

        // // 
        // $data->ondate = $request->sDate;
        // // 
        // $data->user_id = $user->id;

        // $data->save();

        // return redirect()->back()->with('message','Booking Appointment Successfully');
        // }

    }


    public function contact(Request $request)
    {

        $contact = new Contact;

        $contact->name = $request->name;

        $contact->email = $request->email;

        $contact->phone = $request->phone;

        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Message Sent Successfully');

    }


    // 
    public function contact_us()
    {
        return view('home.contact_us');
    }

    public function my_appointments()
    {
        $data = auth()->user()->appointments;
        // $data = Service::all();

        return view('home.my_appointments', compact('data'));

    }

    public function calendar(Request $request)
    {
            // Get the requested month and year or use the current month/year if none specified
            $month = $request->input('month', Carbon::now()->month);
            $year = $request->input('year', Carbon::now()->year);
    
            // Calculate previous and next month
            $currentDate = Carbon::create($year, $month, 1);
            $previousMonth = $currentDate->copy()->subMonth();
            $nextMonth = $currentDate->copy()->addMonth();
    
            // Retrieve all appointments for the specified month and year
            $data = Appointment::whereYear('ondate', $year)
                                ->whereMonth('ondate', $month)
                                ->get();
    
            // Pass data to the view
            return view('home.calendar', [
                'data' => $data,
                'month' => $month,
                'year' => $year,
                'previousMonth' => $previousMonth,
                'nextMonth' => $nextMonth
            ]);
    }

    public function about_us()
    {
        return view('home.about_us');
    }

    // payment
    public function payment()
    {
        return view('home.payment');
    }

    public function add_payment(Request $request)
    {
        $data = new Payment();

        $data->title = $request->title;

        $data->description = $request->description;

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('invoiceandpayment',$filename);

        $data->file=$filename;

        $data->save();

        return redirect()->back();
    }

    public function view_paymentUser()
    {
        $data=Payment::all();
        return view('home.view_paymentUser',compact('data'));
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('invoiceandpayment/'.$file));
    }

    public function show_payment($id)
    {
        $data=Payment::find($id);
        return view('home.show_payment',compact('data'));
    }

    public function policy()
    {
        return view('home.policy');
    }

    // service information
    public function info_service()
    {
        return view('home.info_service');
    }

}
