<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\Employee;
use App\Models\Designation;
use DB;
use PDF;


class EmployeeSalaryController extends Controller
{
    public function SalaryView()
    {

    $this->data['allData']= User::where('usertype','Employee')->get();
    return view('backend.employee.employee_salary.salary_view',$this->data);

    }

//End Method

    public function SalaryIncrement($id)
    {
    $this->data['editData']= User::find($id);
    return view('backend.employee.employee_salary.salary_add',$this->data);	

    }

//End Method

  public function SalaryStoreUpdate(Request $request ,$id)
  {
     $user             = User::find($id);
     $previous_salary  = $user->salary;
     $present_salary   = (float)$previous_salary+(float)$request->increment_salary;
     $user->salary     = $present_salary;
     $user->save();


     $salaryData                   = new Employee();
     $salaryData->employee_id      = $id;
     $salaryData->previous_salary  = $previous_salary;
     $salaryData->increment_salary = $request->increment_salary;
     $salaryData->present_salary   = $present_salary;

     $salaryData->effected_salary=date('Y-m-d',strtotime($request->effected_salary));

    $salaryData->save();

     Toastr::success('Employee Salary Successfully Increment :)' ,'Success');
      return redirect()->route('employee.salary.view');

  }

//End Method

  public function SalaryDetails($id)
  {

  	$this->data['details']  = User::find($id);

  	$this->data['salaryLog']  = Employee::where('employee_id',$this->data['details']->id)->get();

  	// dd($this->data['salaryLog']->toArray());

   return view('backend.employee.employee_salary.salary_details',$this->data);	

  
  }
//End Method



}
