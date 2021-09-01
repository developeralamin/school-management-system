<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

use DB;
use PDF;
use App\Models\User;
use App\Models\EmployeeAttendance;





class EmployeeAttendanceReport extends Controller
{
    public function AttendanceReportView()
    {

    $this->data['employees']= User::where('usertype','Employee')->get();
   return view('backend.reports.attend_report.attend_report_view',$this->data); 


    }
//End method

    public function AttendanceReportGetView(Request $request)
    {
    	$employee_id = $request->employee_id;
    	if ($employee_id !='') {
    		$where[] = ['employee_id',$employee_id];
    	}

    	 $date = date('Y-m',strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }

    $singleattendance = EmployeeAttendance::with(['user'])->where($where)->get();	 
    if ($singleattendance == true) {
    	$this->data['allData'] =  EmployeeAttendance::with(['user'])->where($where)->get();

    	// dd($this->data['allData']->toArray());
    	$this->data['absents'] =EmployeeAttendance::with(['user'])->where($where)->where('attendace_status','Absent')->get()->count();

    	$this->data['leaves'] =EmployeeAttendance::with(['user'])->where($where)->where('attendace_status','Leave')->get()->count();
        
       $this->data['month'] = date('m-Y',strtotime($request->date));

$pdf = PDF::loadView('backend.reports.attend_report.attend_report_pdf', $this->data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }

    else{
    	$notification = array([
    		'message' => 'Sorry These Criteria Does not match',
    		'alert-type' => 'error',
    	]);

    	return redirect()->back()->with($notification);
       }

    }//End if condition



    }

//End method



