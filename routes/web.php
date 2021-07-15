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

Route::get('student/class/view',[StudentClassController::class,'ClassView'])->name('student.class.view');

Route::get('student/class/add',[StudentClassController::class,'ClassAdd'])->name('student.class.add');

Route::post('student/class/store',[StudentClassController::class,'ClassStore'])->name('student.class.store');

Route::get('student/class/edit/{id}',[StudentClassController::class,'ClassEdit'])->name('student.class.edit');

Route::post('student/class/update/{id}',[StudentClassController::class,'ClassUpdate'])->name('student.class.update');

Route::get('student/class/delete/{id}',[StudentClassController::class,'ClassDelete'])->name('student.class.delete');


// Setup Management StudentYear All Route

Route::get('student/year/view',[StudentYearController::class,'YearView'])->name('student.year.view');

Route::get('student/year/add',[StudentYearController::class,'YearAdd'])->name('student.year.add');

Route::post('student/year/store',[StudentYearController::class,'YearStore'])->name('student.year.store');

Route::get('student/year/edit/{id}',[StudentYearController::class,'YearEdit'])->name('student.year.edit');

Route::post('student/year/update/{id}',[StudentYearController::class,'YearUpdate'])->name('student.year.update');

Route::get('student/year/delete/{id}',[StudentYearController::class,'YearDelete'])->name('student.year.delete');


// Setup Management StudentGroup All Route

Route::get('student/group/view',[StudentGroupController::class,'GroupView'])->name('student.group.view');

Route::get('student/group/add',[StudentGroupController::class,'GroupAdd'])->name('student.group.add');

Route::post('student/group/store',[StudentGroupController::class,'GroupStore'])->name('student.group.store');


Route::get('student/group/edit/{id}',[StudentGroupController::class,'GroupEdit'])->name('student.group.edit');

Route::post('student/group/update/{id}',[StudentGroupController::class,'GroupUpdate'])->name('student.group.update');

Route::get('student/group/delete/{id}',[StudentGroupController::class,'GroupDelete'])->name('student.group.delete');



// Setup Management StudentShift All Route


Route::get('student/shift/view',[StudentShiftController::class,'ShiftView'])->name('student.shift.view');

Route::get('student/shift/add',[StudentShiftController::class,'ShiftAdd'])->name('student.shift.add');

Route::post('student/shift/store',[StudentShiftController::class,'ShiftStore'])->name('student.shift.store');


Route::get('student/shift/edit/{id}',[StudentShiftController::class,'ShiftEdit'])->name('student.shift.edit');

Route::post('student/shift/update/{id}',[StudentShiftController::class,'ShiftUpdate'])->name('student.shift.update');

Route::get('student/shift/delete/{id}',[StudentShiftController::class,'ShiftDelete'])->name('student.shift.delete');


// Setup Management FeeCategory All Route

Route::get('fee/category/view',[StudentFeeCateroyController::class,'FeeCategoryView'])->name('fee.category.view');

Route::get('fee/category/add',[StudentFeeCateroyController::class,'FeeCategoryAdd'])->name('fee.category.add');

Route::post('fee/category/store',[StudentFeeCateroyController::class,'FeeCategoryStore'])->name('fee.category.store');


Route::get('fee/category/edit/{id}',[StudentFeeCateroyController::class,'FeeCategoryEdit'])->name('fee.category.edit');

Route::post('fee/category/update/{id}',[StudentFeeCateroyController::class,'FeeCategoryUpdate'])->name('fee.category.update');

Route::get('fee/category/delete/{id}',[StudentFeeCateroyController::class,'FeeCategoryDelete'])->name('fee.category.delete');




// Setup Management Fee Amount All Route

Route::get('fee/amount/view',[FeeAmountController::class,'FeeAmountView'])->name('fee.amount.view');

Route::get('fee/amount/add',[FeeAmountController::class,'FeeAmountAdd'])->name('fee.amount.add');

Route::post('fee/amount/store',[FeeAmountController::class,'FeeAmountStore'])->name('fee.amount.store');

Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'FeeAmountEdit'])->name('fee.amount.edit');

Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'FeeAmountUpdate'])->name('fee.amount.update');

Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'FeeAmountDetails'])->name('fee.amount.details');

});