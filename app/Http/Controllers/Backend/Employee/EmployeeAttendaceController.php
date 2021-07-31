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

use App\Models\LeavePurpose;
use App\Models\EmployeeLeave;
use App\Models\EmployeeAttendance;


class EmployeeAttendaceController extends Controller
{
   public function AttendanceView()
   {
   	$this->data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->get('id','desc');
   return view('backend.employee.employee_attendance.employee_attendance_view',$this->data);

   }

//End method

	public function AttendanceAdd()
	{
	$this->data['employees'] = User::where('usertype','employee')->get();
	return view('backend.employee.employee_attendance.employee_attendance_add',$this->data);

	}	

//End method

	public function AttendanceStore(Request $request)
	{

    EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();
		$countEmployee =count($request->employee_id);
		for ($i=0; $i < $countEmployee; $i++) { 
			
			$atten_status ='attendace_status'.$i;

			$attend                      = new EmployeeAttendance();
			$attend->date                =date('Y-m-d',strtotime($request->date)) ;
			$attend->employee_id         = $request->employee_id[$i];
			$attend->attendace_status    =$request->$atten_status;

			$attend->save();

		}//end for loop


    	 Toastr::success('Employee Attendance Data Updated Successfully :)' ,'Success');
    	return redirect()->route('employee.attendance.view');
	}

//End method


	public function AttendanceEdit($date)
	{
		$this->data['editData'] = EmployeeAttendance::where('date',$date)->get();
		$this->data['employees'] = User::where('usertype','employee')->get();

   return view('backend.employee.employee_attendance.employee_attendance_edit',$this->data);
	}

//End method
//End method


  	public function AttendanceDetails($date)
  	{
  	$this->data['details'] = EmployeeAttendance::where('date',$date)->get();
  return view('backend.employee.employee_attendance.employee_attendance_details',$this->data);

  	}

//End method

  	

}
