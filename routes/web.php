<?php

use Illuminate\Support\Facades\Route;

// 
use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.index');
// });

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

route::get('/',[AdminController::class,'home']);


route::get('/home',[AdminController::class,'index'])->name('home');

Route::get('/create_service', [AdminController::class,'create_service'])->middleware(['auth','admin']);
Route::post('/add_service', [AdminController::class,'add_service'])->middleware(['auth','admin']);

Route::get('/view_service', [AdminController::class,'view_service'])->middleware(['auth','admin']);

Route::get('/delete_service/{id}', [AdminController::class,'delete_service'])->middleware(['auth','admin']);

Route::get('/update_service/{id}', [AdminController::class,'update_service'])->middleware(['auth','admin']);

Route::post('/edit_service/{id}', [AdminController::class,'edit_service'])->middleware(['auth','admin']);


//HomeController
Route::get('/detail_service/{id}', [HomeController::class,'detail_service'])->middleware(['auth']);

Route::post('/add_appointment/{id}', [HomeController::class,'add_appointment']);

//AdminController
// Route::get('/appointments', [AdminController::class,'appointments']);

Route::get('/appointments', [AdminController::class,'appointments'])->middleware(['auth','admin']);

Route::get('/delete_appointment/{id}', [AdminController::class,'delete_appointment'])->middleware(['auth','admin']);

Route::get('/approve_appointment/{id}', [AdminController::class,'approve_appointment'])->middleware(['auth','admin']);

Route::get('/rejected_appointment/{id}', [AdminController::class,'rejected_appointment'])->middleware(['auth','admin']);

//HomeController
Route::post('/contact', [HomeController::class,'contact']);

//AdminController
Route::get('/all_messages', [AdminController::class,'all_messages'])->middleware(['auth','admin']);

Route::get('/send_mail/{id}', [AdminController::class,'send_mail'])->middleware(['auth','admin']);

Route::post('/mail/{id}', [AdminController::class,'mail'])->middleware(['auth','admin']);



// Direct to Contact Us page
Route::get('/contact_us', [HomeController::class,'contact_us']);

// user view the appointment
Route::get('/my_appointments', [HomeController::class, 'my_appointments']);

//user view Calender
Route::get('/calendar', [HomeController::class,'calendar'])->name('calendar.index');
// Route::get('/calendar', [HomeController::class,'calendar']);






