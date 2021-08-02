<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\PorfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentFeeCateroyController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegistrationController;
use App\Http\Controllers\Backend\Student\StudentRollController;
use App\Http\Controllers\Backend\Student\StudengRegistrationFeeController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Student\StudentExamFeeController;


use App\Http\Controllers\Backend\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendaceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');


// User Management All Routes

//Admin Login System
Route::group(['middleware' => 'auth'],function(){

	

Route::prefix('users')->group(function (){

Route::get('/view',[UserController::class,'UserView'])->name('user.view');
Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');

});


Route::prefix('profile')->group(function (){

Route::get('/view',[PorfileController::class,'ViewProfile'])->name('profile.view');
Route::get('/edit',[PorfileController::class,'EditProfile'])->name('profile.edit');
Route::post('/store',[PorfileController::class,'StoreProfile'])->name('profile.store');
Route::get('/password/view',[PorfileController::class,'PasswordView'])->name('password.view');
Route::post('/password/update',[PorfileController::class,'PasswordUpdate'])->name('password.update');

});

// Setup Management All Routes

Route::prefix('setups')->group(function (){

// Setup Management  StudentClass All Route
// Setup Management  StudentClass All Route

Route::get('student/class/view',[StudentClassController::class,'ClassView'])->name('student.class.view');

Route::get('student/class/add',[StudentClassController::class,'ClassAdd'])->name('student.class.add');

Route::post('student/class/store',[StudentClassController::class,'ClassStore'])->name('student.class.store');

Route::get('student/class/edit/{id}',[StudentClassController::class,'ClassEdit'])->name('student.class.edit');

Route::post('student/class/update/{id}',[StudentClassController::class,'ClassUpdate'])->name('student.class.update');

Route::get('student/class/delete/{id}',[StudentClassController::class,'ClassDelete'])->name('student.class.delete');


// Setup Management StudentYear All Route
// Setup Management StudentYear All Route

Route::get('student/year/view',[StudentYearController::class,'YearView'])->name('student.year.view');

Route::get('student/year/add',[StudentYearController::class,'YearAdd'])->name('student.year.add');

Route::post('student/year/store',[StudentYearController::class,'YearStore'])->name('student.year.store');

Route::get('student/year/edit/{id}',[StudentYearController::class,'YearEdit'])->name('student.year.edit');

Route::post('student/year/update/{id}',[StudentYearController::class,'YearUpdate'])->name('student.year.update');

Route::get('student/year/delete/{id}',[StudentYearController::class,'YearDelete'])->name('student.year.delete');


// Setup Management StudentGroup All Route
// Setup Management StudentGroup All Route

Route::get('student/group/view',[StudentGroupController::class,'GroupView'])->name('student.group.view');

Route::get('student/group/add',[StudentGroupController::class,'GroupAdd'])->name('student.group.add');

Route::post('student/group/store',[StudentGroupController::class,'GroupStore'])->name('student.group.store');


Route::get('student/group/edit/{id}',[StudentGroupController::class,'GroupEdit'])->name('student.group.edit');

Route::post('student/group/update/{id}',[StudentGroupController::class,'GroupUpdate'])->name('student.group.update');

Route::get('student/group/delete/{id}',[StudentGroupController::class,'GroupDelete'])->name('student.group.delete');



// Setup Management StudentShift All Route
// Setup Management StudentShift All Route


Route::get('student/shift/view',[StudentShiftController::class,'ShiftView'])->name('student.shift.view');

Route::get('student/shift/add',[StudentShiftController::class,'ShiftAdd'])->name('student.shift.add');

Route::post('student/shift/store',[StudentShiftController::class,'ShiftStore'])->name('student.shift.store');


Route::get('student/shift/edit/{id}',[StudentShiftController::class,'ShiftEdit'])->name('student.shift.edit');

Route::post('student/shift/update/{id}',[StudentShiftController::class,'ShiftUpdate'])->name('student.shift.update');

Route::get('student/shift/delete/{id}',[StudentShiftController::class,'ShiftDelete'])->name('student.shift.delete');


// Setup Management FeeCategory All Route
// Setup Management FeeCategory All Route

Route::get('fee/category/view',[StudentFeeCateroyController::class,'FeeCategoryView'])->name('fee.category.view');

Route::get('fee/category/add',[StudentFeeCateroyController::class,'FeeCategoryAdd'])->name('fee.category.add');

Route::post('fee/category/store',[StudentFeeCateroyController::class,'FeeCategoryStore'])->name('fee.category.store');


Route::get('fee/category/edit/{id}',[StudentFeeCateroyController::class,'FeeCategoryEdit'])->name('fee.category.edit');

Route::post('fee/category/update/{id}',[StudentFeeCateroyController::class,'FeeCategoryUpdate'])->name('fee.category.update');

Route::get('fee/category/delete/{id}',[StudentFeeCateroyController::class,'FeeCategoryDelete'])->name('fee.category.delete');




// Setup Management Fee Amount All Route
// Setup Management Fee Amount All Route

Route::get('fee/amount/view',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');

Route::get('fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('fee.amount.add');

Route::post('fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('fee.amount.store');

Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');

Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'FeeAmountUpdate'])->name('fee.amount.update');

Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'FeeAmountDetails'])->name('fee.amount.details');



// Setup Management Exam Type All Route
// Setup Management Exam Type All Route

Route::get('exam/type/view',[ExamTypeController::class,'ExamTypeView'])->name('exam.type.view');

Route::get('exam/type/add',[ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');

Route::post('exam/type/store',[ExamTypeController::class,'ExamTypeStore'])->name('exam.type.store');


Route::get('exam/type/edit/{id}',[ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');

Route::post('exam/type/update/{id}',[ExamTypeController::class,'ExamTypeUpdate'])->name('exam.type.update');

Route::get('exam/type/delete/{id}',[ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');



// Setup Management School Subject All Route
// Setup Management School Subject All Route


Route::get('school/subject/view',[SchoolSubjectController::class,'SchoolSubjectView'])->name('school.subject.view');

Route::get('school/subject/add',[SchoolSubjectController::class,'SchoolSubjectAdd'])->name('school.subject.add');

Route::post('school/subject/store',[SchoolSubjectController::class,'SchoolSubjectStore'])->name('school.subject.store');


Route::get('school/subject/edit/{id}',[SchoolSubjectController::class,'SchoolSubjectEdit'])->name('school.subject.edit');

Route::post('school/subject/update/{id}',[SchoolSubjectController::class,'SchoolSubjectUpdate'])->name('school.subject.update');

Route::get('school/subject/delete/{id}',[SchoolSubjectController::class,'SchoolSubjectDelete'])->name('school.subject.delete');


// Setup Management AssignSubject All Route
// Setup Management AssignSubject All Route


Route::get('assign/subject/view',[AssignSubjectController::class,'AssignSubjectView'])->name('assign.subject.view');

Route::get('assign/subject/add',[AssignSubjectController::class,'AssignSubjectAdd'])->name('assign.subject.add');

Route::post('assign/subject/store',[AssignSubjectController::class,'AssignSubjectStore'])->name('assign.subject.store');

Route::get('assign/subject/edit/{class_id}',[AssignSubjectController::class,'AssignSubjectEdit'])->name('assign.subject.edit');

Route::post('assign/subject/update/{class_id}',[AssignSubjectController::class,'AssignSubjectUpdate'])->name('assign.subject.update');

Route::get('assign/subject/details/{class_id}',[AssignSubjectController::class,'AssignSubjectDetails'])->name('assign.subject.details');



// Setup Management Designation All Route
// Setup Management Designation All Route


Route::get('designation/view',[DesignationController::class,'DesignationView'])->name('designation.view');

Route::get('designation/add',[DesignationController::class,'DesignationAdd'])->name('designation.add');

Route::post('designation/store',[DesignationController::class,'DesignationStore'])->name('designation.store');


Route::get('designation/edit/{id}',[DesignationController::class,'DesignationEdit'])->name('designation.edit');

Route::post('designation/update/{id}',[DesignationController::class,'DesignationUpdate'])->name('designation.update');

Route::get('designation/delete/{id}',[DesignationController::class,'DesignationDelete'])->name('designation.delete');


});


// Student Management All Routes
// Student Registration  All Routes

Route::prefix('students')->group(function (){

Route::get('/reg/view',[StudentRegistrationController::class,'ViewRegistration'])->name('reg.view');

Route::get('/reg/Add',[StudentRegistrationController::class,'AddStudentRegistration'])->name('reg.Add');


Route::post('/reg/store',[StudentRegistrationController::class,'StudentRegistraionStore'])->name('reg.store');


Route::get('/reg/year/class/wish',[StudentRegistrationController::class,'StudentClassYearWise'])->name('reg.year.class.wish');


Route::get('/student/reg/Edit/{student_id}',[StudentRegistrationController::class,'EditStudentRegistration'])->name('student.reg.edit');

Route::post('/student/reg/update/{student_id}',[StudentRegistrationController::class,'UpdateStudentRegistration'])->name('student.reg.update');


Route::get('/student/promotion/{student_id}',[StudentRegistrationController::class,'StudentPromotion'])->name('student.promotion');

Route::post('/promotion/student/registration/{student_id}',[StudentRegistrationPromotionController::class,'UpdateStudentRegistration'])->name('promotion.student.registration');


Route::get('/student/details/{student_id}',[StudentRegistrationController::class,'StudentDetails'])->name('student.details');


   
// Student Roll Generate  All Routes
// Student Roll Generate  All Routes

 
Route::get('roll/generate/view',[StudentRollController::class,'ViewRollGenerate'])->name('roll.generate.view');

Route::get('roll/getstudents',[StudentRollController::class,'GetStudents'])->name('student.registration.getstudents');


Route::post('roll/store',[StudentRollController::class,'StudentStore'])->name('roll.generate.store');


// Student Registration Fee  All Routes
// Student Registration Fee  All Routes

 
Route::get('regis/fee/view',[StudengRegistrationFeeController::class,'ViewRegistration'])->name('regis.fee.view');

Route::get('regis/fee/classData',[StudengRegistrationFeeController::class,'RegFeeClassData'])->name('student.registration.fee.classwise.get');

Route::get('regis/fee/payslip',[StudengRegistrationFeeController::class,'RegFeePayslip'])->name('student.registration.fee.payslip');


// Student Monthly Fee  All Routes
// Student Monthly Fee  All Routes

 
Route::get('monthly/fee/view',[MonthlyFeeController::class,'ViewMonthlyFee'])->name('monthly.fee.view');

Route::get('monthly/fee/classdata',[MonthlyFeeController::class,'ViewMonthlyData'])->name('student.monthly.fee.classwise.get');

Route::get('monthly/fee/payslip',[MonthlyFeeController::class,'PaySlipMonthlyData'])->name('student.monthly.fee.payslip');



// Student Exam Fee  All Routes
// Student Exam Fee  All Routes

Route::get('exam/fee/view',[StudentExamFeeController::class,'ViewExamFee'])->name('exam.fee.view');

Route::get('exam/fee/classdata',[StudentExamFeeController::class,'ViewExamTypeData'])->name('student.examy_type.fee.classwise.get');

Route::get('exam/fee/payslip',[StudentExamFeeController::class,'PaySlipExamTypeData'])->name('student.examy_type.fee.payslip');


});





// Employee Management All Routes
// Employee Management All Routes

Route::prefix('employees')->group(function (){


// Employee Registration  All Routes
// Employee Registration  All Routes

 Route::get('employee/registration/view',[EmployeeRegistrationController::class,'EmployeeView'])->name('employee.registration.view');

 Route::get('employee/registration/add',[EmployeeRegistrationController::class,'EmployeeAdd'])->name('employee.registration.add');


 Route::post('employee/registration/store',[EmployeeRegistrationController::class,'EmployeeStore'])->name('employee.registration.store');
 
Route::get('employee/registration/edit/{id}',[EmployeeRegistrationController::class,'EmployeeEdit'])->name('employee.registration.edit');

Route::post('employee/registration/update/{id}',[EmployeeRegistrationController::class,'EmployeeUpdate'])->name('employee.registration.update');


Route::get('employee/registration/details/{id}',[EmployeeRegistrationController::class,'EmployeeDetails'])->name('employee.registration.details');


// Employee Salary  All Routes
// Employee Salary  All Routes

 Route::get('employee/salary/view',[EmployeeSalaryController::class,'SalaryView'])->name('employee.salary.view');

 Route::get('employee/salary/increment/{id}',[EmployeeSalaryController::class,'SalaryIncrement'])->name('employee.salary.increment');

 Route::post('employee/salary/update/store/{id}',[EmployeeSalaryController::class,'SalaryStoreUpdate'])->name('employee.salary.store.update');


 Route::get('employee/salary/details/{id}',[EmployeeSalaryController::class,'SalaryDetails'])->name('employee.salary.details');



// Employee Leave  All Routes
// Employee Leave  All Routes

 Route::get('employee/leave/view',[EmployeeLeaveController::class,'LeaveView'])->name('employee.leave.view');

 Route::get('employee/leave/add',[EmployeeLeaveController::class,'LeaveAdd'])->name('employee.leave.add');

 Route::post('employee/leave/store',[EmployeeLeaveController::class,'LeaveStore'])->name('employee.leave.store');

 Route::get('employee/leave/edit/{id}',[EmployeeLeaveController::class,'LeaveEdit'])->name('employee.leave.edit');

 Route::post('employee/leave/update/{id}',[EmployeeLeaveController::class,'LeaveUpdate'])->name('employee.leave.update');

Route::get('employee/leave/delete/{id}',[EmployeeLeaveController::class,'LeaveDelete'])->name('employee.leave.delete');






// Employee Attendance  All Routes
// Employee Attendance  All Routes

 Route::get('employee/attendance/view',[EmployeeAttendaceController::class,'AttendanceView'])->name('employee.attendance.view');

 Route::get('employee/attendance/add',[EmployeeAttendaceController::class,'AttendanceAdd'])->name('employee.attendance.add');

 Route::post('employee/attendance/store',[EmployeeAttendaceController::class,'AttendanceStore'])->name('employee.attendance.store');


 Route::get('employee/attendance/edit/{date}',[EmployeeAttendaceController::class,'AttendanceEdit'])->name('employee.attendance.edit');

 Route::post('employee/attendance/update/{date}',[EmployeeAttendaceController::class,'AttendanceUpdate'])->name('employee.attendance.update');

 Route::get('employee/attendance/details/{date}',[EmployeeAttendaceController::class,'AttendanceDetails'])->name('employee.attendance.details');




});



 });