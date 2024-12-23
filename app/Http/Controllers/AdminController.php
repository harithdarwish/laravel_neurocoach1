<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\User;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Models\Service;

use App\Models\Appointment;

use App\Models\Contact;

use App\Models\Report;

use App\Models\Invoice;

use App\Models\Payment;

use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

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

               else if ($usertype == 'admin') {

                // ------- Graph and Chart -----------------------
                // Fetch total number of users and appointments
                $user = User::where('usertype', 'user')->count();
                $appointment = Appointment::count();
                $report = Report::count();
                $invoice = Invoice::count();

                // Example maximum values
                $maxPatients = 100;
                $maxAppointments = 100;
                $maxReports = 100;
                $maxInvoice = 100;

                // Calculate progress percentages
                $patientProgress = ($user / $maxPatients) * 100;
                $patientProgress = min($patientProgress, 100); // Ensure it doesn't exceed 100%

                $appointmentProgress = ($appointment / $maxAppointments) * 100;
                $appointmentProgress = min($appointmentProgress, 100); // Ensure it doesn't exceed 100%

                $reportProgress = ($report / $maxReports) * 100;
                $reportProgress = min($reportProgress, 100); // Ensure it doesn't exceed 100%

                $invoiceProgress = ($invoice / $maxInvoice) * 100;
                $invoiceProgress = min($invoiceProgress, 100); // Ensure it doesn't exceed 100%

             // Line chart data: appointments per month for the current year
             $currentYear = Carbon::now()->year;

             $monthlyAppointments = DB::table('appointments')
                 ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
                 ->whereYear('created_at', $currentYear)
                 ->groupBy(DB::raw('MONTH(created_at)'))
                 ->pluck('count', 'month')->toArray();

             // Ensure all months are represented, even with 0 appointments
             $appointmentsData = [];
             for ($i = 1; $i <= 12; $i++) {
                 $appointmentsData[] = $monthlyAppointments[$i] ?? 0;
             }

              // Count appointments by status
            $approvedCount = Appointment::where('status', 'APPROVE')->count();
            $rejectedCount = Appointment::where('status', 'REJECTED')->count();
            $waitingCount = Appointment::where('status', 'waiting')->count();

             // Pass progress percentages and chart data to the view
             return view('admin.index', compact('user', 'appointment', 'report', 'invoice', 'patientProgress', 'appointmentProgress', 'reportProgress', 'invoiceProgress', 'appointmentsData','approvedCount','rejectedCount','waitingCount'));
            // ------- Graph and Chart -----------------------


            } else {
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


    public function create_report()
    {
        return view('admin.create_report');
    }

    public function add_report(Request $request)
    {
        $data = new Report;

        $data->report_writer = $request->name;

        $data->report_type = $request->type;

        $data->report_title = $request->title;

        $data->desc = $request->desc;

        $data->report_date = $request->date;

        $data->save();

        return redirect()->back();
    }

    public function view_report()
    {
        $data = Report::all();

        return view('admin.view_report',compact('data'));
    }

    public function delete_report($id)
    {
        $data = Report::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function update_report($id)
    {
        $data = Report::find($id);

        return view('admin.update_report',compact('data'));
    }

    public function edit_report(Request $request, $id)
    {
        $data = Report::find($id);

        $data->report_writer = $request->name;

        $data->report_type = $request->type;

        $data->report_title = $request->title;

        $data->desc = $request->desc;

        $data->report_date = $request->date;

        $data->save();

        return redirect()->back();
    }

    public function reminder()
    {
        $data = Appointment::all();

        return view('admin.reminder',compact('data'));
    }

    // invoice
    public function create_invoice()
    {
        return view('admin.create_invoice');
    }

    public function add_invoice(Request $request)
    {
        $data = new Invoice();

        $data->title = $request->title;

        $data->description = $request->description;

        $file=$request->file;

        $filename=time().'.'.$file->getClientOriginalExtension();

        $request->file->move('invoiceandpayment',$filename);

        $data->file=$filename;

        $data->save();

        return redirect()->back();
    }

    public function view_invoice()
    {
        $data=Invoice::all();
        return view('admin.view_invoice',compact('data'));
    }

    public function download(Request $request,$file)
    {
        return response()->download(public_path('invoiceandpayment/'.$file));
    }

    public function show_invoice($id)
    {
        $data=Invoice::find($id);
        return view('admin.show_invoice',compact('data'));
    }

    // payment
    public function view_payment()
        {
            $data=Payment::all();
            return view('admin.view_payment',compact('data'));
        }

        public function download_payment(Request $request,$file)
        {
            return response()->download(public_path('invoiceandpayment/'.$file));
        }

        public function show_payment($id)
        {
            $data=Payment::find($id);
            return view('admin.show_payment',compact('data'));
        }


    

}
