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



class EmployeeLeaveController extends Controller
{
      
	public function LeaveView()
	{
	  $this->data['allData'] = EmployeeLeave::orderBy('id','desc')->get();
	 return view('backend.employee.employee_leave.leave_view',$this->data);

	}

//End method

	public function LeaveAdd()
	{
     $this->data['employees']      = User::where('usertype','employee')->get();
     $this->data['leave_purpose']  = LeavePurpose::all();
	 return view('backend.employee.employee_leave.leave_purpose_add',$this->data);


	}

//End method

	public function LeaveStore(Request $request)
	{
		
    	if ($request->leave_purpose_id == "0") {
    		$leavepurpose         = new LeavePurpose();
    		$leavepurpose->name   = $request->name;
    		$leavepurpose->save();

    		$leave_purpose_id     = $leavepurpose->id;

    	}else{
    		$leave_purpose_id     = $request->leave_purpose_id;
    	}

    	$data                      = new EmployeeLeave();
    	$data->employee_id         = $request->employee_id;
    	$data->leave_purpose_id    = $leave_purpose_id;
    	$data->start_date          = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date            = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee Leave Data Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);


	}

//End method
//End method

   public function LeaveEdit($id)
   {
   	   $this->data['editData']        = EmployeeLeave::find($id);
   	   $this->data['employees']       = User::where('usertype','employee')->get();
   	   $this->data['leave_purpose']   = LeavePurpose::all();
   	 
   	
   	   return view('backend.employee.employee_leave.leave_purpose_edit',$this->data);


   }

//End mehtod
//End mehtod

   public function LeaveUpdate(Request $request ,$id)
   {
   	if ($request->leave_purpose_id == "0") {
    		$leavepurpose         = new LeavePurpose();
    		$leavepurpose->name   = $request->name;
    		$leavepurpose->save();

    		$leave_purpose_id     = $leavepurpose->id;

    	}else{
    		$leave_purpose_id     = $request->leave_purpose_id;
    	}

    	$data                      = EmployeeLeave::find($id);
    	$data->employee_id         = $request->employee_id;
    	$data->leave_purpose_id    = $leave_purpose_id;
    	$data->start_date          = date('Y-m-d',strtotime($request->start_date));
    	$data->end_date            = date('Y-m-d',strtotime($request->end_date));
    	$data->save();

    	$notification = array(
    		'message' => 'Employee Leave Data Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('employee.leave.view')->with($notification);

   }

//End mehtod
//End mehtod


   public function LeaveDelete($id)
   {
   	  $employee_leave = EmployeeLeave::find($id);

   	  $employee_leave->delete();

   	  $notification = array(
    		'message' => 'Employee Leave Data Delete Successfully',
    		'alert-type' => 'success'
    	);

    return redirect()->route('employee.leave.view')->with($notification);


   }

}
