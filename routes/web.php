<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollNewStudentController;
use App\Http\Controllers\FranchiseController;
use App\Http\Controllers\StudentListController;
use App\Http\Controllers\WalletController;
use App\Models\Franchise;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\ImagePdfController;

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

// Route::get('/', function () {return view('layout');
// });
// Route::group(['middleware' => ['admin']], function () {
//     Route::get('/admin', function () {
//         return view("admin");
//     })->name('admin');
//  });
/** 
 * authenrication
 */
Route::get('/login',[Authcontroller::class, 'login'])->name('login');
Route::post('/login',[Authcontroller::class, 'userlogin']);
Route::get('logout',[Authcontroller::class, 'logout'])->name('logout');



Route::middleware(['auth'])->group(function () {
    

/** 
 * franchise panel
 */
Route::get('/dashboard',[Authcontroller::class, 'dashboard'])->middleware("auth")->name('dashboard');

// Route::get('/phpinfo', function () {
//     phpinfo();
// });

/** 
 * franchise
 */
// Route::get('franchise/student-enquiry-form', [enquiryFormController::class,'showEnquiryForm']);
// Route::post('/enquiryform', [enquiryFormController::class, 'store'])->name('enquiryform');
// Route::get('/student-enquiry-list', [enquiryFormController::class, 'showEnquiryList'])->name('student-enquiry-list');

// Route::get('/edit-enquiry-form/{id}', [enquiryFormController::class, 'edit'])->name('edit-enquiry-form');
// Route::put('/update-enquiry-form/{id}', [enquiryFormController::class, 'update'])->name('update-enquiry-form');


// Route::get('franchise/enroll-new-student', function () {
    
//     $title = 'Enroll-Student';
//     return view("franchise/enroll-new-student",compact('title'));
//     })->name('enroll-new-student');


Route::get('franchise/enroll-new-student', [FranchiseController::class,'enrollNewStudent'])->name('enroll-new-student');
Route::get('franchise/student-enquiry-form', [FranchiseController::class,'showEnquiryForm'])->name('franchise.student-enquiry-form');
Route::post('franchise/student-enquiry-form', [FranchiseController::class,'createEnquiry'])->name('franchise.student-enquiry-form');

Route::post('franchise/create-student', [FranchiseController::class, 'createStudent'])->name('create-student');
// Route::post('franchise/deposit-amount', [WalletController::class, 'create'])->name('deposit-amount');

Route::get('franchise/create-student/{id?}', [FranchiseController::class, 'createStudent'])->name('create-student');
Route::get('franchise/student-enquiry-list', [FranchiseController::class, 'showEnquiryList'])->name('student-enquiry-list');

// Enquiry Form
Route::get('franchise/edit-enquiry-form/{id}', [FranchiseController::class, 'edit'])->name('edit-enquiry-form');
Route::put('franchise/update-enquiry-form/{id}', [FranchiseController::class, 'update'])->name('update-enquiry-form');

// Student list
// Route::get('registered-students', function () {
//     $title = 'Student';
//     return view("franchise/registered-student",compact('title'));

//     })->name('registered-students');
//     Route::get('unregistered-students', function () {
//         $title = 'Student';
//         return view("franchise/unregistered-student",compact('title'));
//         })->name('unregistered-students');

Route::get('registered-student', [FranchiseController::class,'showRegStudent'])->name('registered-students');
Route::get('unregistered-student', [FranchiseController::class,'showUnRegStudent'])->name('unregistered-students');



// Route::get('unregistered-student', [FranchiseController::class,'showUnRegStudent'])->name('student/unregistered-students');



/** 
 * admin panel
 */
Route::get('/admin', 
    [AdminController::class,'adminlayout'])->middleware("isadmin")->name('admin');
    Route::get('/', function () {return redirect()->route('dashboard');})->name('/');
// Route::get('/admin/create-franchise', function () {
//     return view("admin/create-franchise");})->name('create-franchise');

Route::get('/admin/create-franchise',[AdminController::class, 'createFranchiseform'])->name('create-franchise');
Route::post('/admin/create-new-franchise',[AdminController::class, 'createFranchise'])->name('create-new-franchise');

Route::get('/admin/manage-franchise',[AdminController::class, 'manageFranchise'])->name('manage-franchise');
Route::get('/admin/manage-franchise/edit-franchise/{id}',[AdminController::class, 'editFranchise'])->name('edit-franchise');
Route::post('/admin/manage-franchise/update-franchise/{id}',[AdminController::class, 'updateFranchise'])->name('update-franchise');
// Route::get('/admin/edit-franchise/{id}', function ($id){
//     $franchise = Franchise::findOrFail($id);
//     return view("admin/edit-franchise",compact('franchise'));
// })->name('edit-franchise');

// Route::post('/admin/edit-franchise/{id}', function ($id){
//     $franchise = Franchise::findOrFail($id);
//     return view("admin/edit-franchise",compact('franchise'));
// })->name('edit-franchise');

Route::get('/admin/franchises/{id}', [AdminController::class, 'deleteFranchise'])->name('delete-franchise');

Route::get('/admin/franchise-list',[FranchiseController::class, 'viewFranchise'])->name('view-franchise');
Route::get('/admin/coursesList',[CourseController::class, 'index'])->name('coursesList');

Route::get('/admin/view-transaction',[WalletController::class, 'viewTransaction'])->name('view-transaction');
Route::get('/admin/view-franchise-deposite',[WalletController::class, 'viewAmountRequest'])->name('view-franchise-deposite');


Route::get('/admin/view-student-enquiry-list',[FranchiseController::class, 'viewStudentEnquiry'])->name('view-student-enquiry-list');



Route::get('franchise/download-certificates', [ImagePdfController::class, 'downloadCertificates'])->name('download-certificates');
Route::get('franchise/appricial-pdf', [ImagePdfController::class, 'apprecialPdfForm'])->name('franchise-appricial-pdf');
Route::post('franchise/appricial-pdf', [ImagePdfController::class, 'generateApprecialPdf'])->name('generate-appricial-pdf');


Route::get('list-student', [FranchiseController::class, 'listStudent'])->name('list-student');


// clear-config-cache
Route::get('/clear-config-cache', function() {
    $exitCode = Artisan::call('config:clear');
    return 'Config cache cleared successfully';
});


Route::post('admin/courses/manage', 'CourseController@index')->name('courses.show'); 
Route::post('admin/courses/create', [CourseController::class, 'createCourse'])->name('courses.create'); 
Route::get('admin/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit'); 
Route::post('admin/courses/{id}', [CourseController::class, 'updateCourse'])->name('courses.update'); 
// Route::get('admin/courses/{id}/edit', 'CourseController@edit')->name('courses.edit');
// Route::put('admin/courses/{id}', 'CourseController@updateCourse')->name('courses.update');
// Route::delete('admin/courses/{id}', 'CourseController@destroyCourse')->name('courses.delete');

Route::get('/admin/enroll-new-student', [AdminController::class, 'enrollNewStudent'])->name('add-new-student');
Route::get('/admin/view-student-list',[AdminController::class, 'viewStudent'])->name('view-student');

Route::post('/admin/create-student', [AdminController::class, 'createStudent'])->name('create-new-student');

Route::get('/admin/student/{id}', [FranchiseController::class, 'deleteStudent'])->name('delete-student');
});