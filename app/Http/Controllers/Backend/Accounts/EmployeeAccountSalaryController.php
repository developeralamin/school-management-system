<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\FeeCategory;
use App\Models\FeeAmount;
use App\Models\EmployeeAttendance;
use App\Models\EmployeeAccountSalary;

use DB;
use PDF;

class EmployeeAccountSalaryController extends Controller
{
    public function ViewAccountFee()
    {
    	 $this->data['allData']  = EmployeeAccountSalary::all();
    	 return view('backend.accounts.employee_fee.employee_account_view',$this->data); 
    }
//End methodd

    public function AddEmployeeAccountFee()
    {
    	return view('backend.accounts.employee_fee.employee_account_add'); 
    }

//End method


    public function getemployeeSalary(Request $request)
    {
    	$date = date('Y-m',strtotime($request->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }
    	 
    	 $data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	 // dd($allStudent);
    	 $html['thsource']  = '<th>SL</th>';
    	 $html['thsource'] .= '<th>ID NO.</th>';
    	 $html['thsource'] .= '<th>Employee Name</th>';
    	 $html['thsource'] .= '<th>Basic Salary</th>';
    	 $html['thsource'] .= '<th>Salary This Month</th>';
    	 $html['thsource'] .= '<th>Action</th>';


    	 foreach ($data as $key => $employe) {

    $account_salary = EmployeeAccountSalary::where('employee_id',$employe->employee_id)->where('date',$date)->first();

			if($account_salary !=null) {
			 	$checked = 'checked';
			 }else{
			 	$checked = '';
			 }  	 	 



 	$totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$employe->employee_id)->get();
 $absentcount = count($totalattend->where('attendace_status','Absent'));

 	$color = 'success';
 	$html[$key]['tdsource']  = '<td>'.($key+1).'<input type="hidden" name="date" value="'.$date.'">'.'</td>';
 	
 	$html[$key]['tdsource'] .= '<td>'.$employe['user']['id_no'].'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$employe['user']['name'].'</td>';
 	$html[$key]['tdsource'] .= '<td>'.$employe['user']['salary'].'</td>';
    	 	 
    	 	
 	$salary = (float)$employe['user']['salary'];
 	$salaryperday = (float)$salary/30;
 	$totalsalaryminus = (float)$absentcount*(float)$salaryperday;
 	$totalsalary = (float)$salary-(float)$totalsalaryminus;

 	$html[$key]['tdsource'] .='<td>'.$totalsalary.'<input type="hidden" name="amount[]" value="'.$totalsalary.'">'.'</td>';
    $html[$key]['tdsource'] .='<td>';
 	$html[$key]['tdsource'] .='<td>'.'<input type="hidden" name="employee_id[]" value="'.$employe->employee_id.'">'.'<input type="checkbox" name="checkmanage[]" id="'.$key.'" value="'.$key.'" '.$checked.' style="transform: scale(1.5);margin-left: 10px;"> <label for="'.$key.'"> </label> '.'</td>'; 

    	 }  //end foreach
    	return response()->json(@$html);
    }
//End method

    public function getemployeeSalaryStore(Request $request)
    {
    	 $date = date('Y-m',strtotime($request->date));  

    EmployeeAccountSalary::where('date',$date)->delete();


    $checkdata = $request->checkmanage;

      if ($checkdata !=null) {
      	for ($i=0; $i <count($checkdata ); $i++) { 
      		 $data = new EmployeeAccountSalary();
      		 $data->date = $request->date;
      		 $data->employee_id = $request->employee_id[$checkdata[$i]];
      		 $data->amount = $request->amount[$checkdata[$i]];

      		 $data->save();

      	}//end for loop
      }//end if condtiotion

      if (!empty(@$data) || empty($checkdata)) {

    	$notification = array(
    		'message' => 'Well Done Data Successfully Updated',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('empoyee.account.fee')->with($notification);
    	}

    	else{
    		$notification = array(
    		'message' => 'Sorry Data not Saved',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);

    	} 

    } // end method 
    

//End method




}
