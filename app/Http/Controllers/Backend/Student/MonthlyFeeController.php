<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\FeeAmount;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\ExamType;
use DB;
use PDF;

class MonthlyFeeController extends Controller
{
    public function ViewMonthlyFee()
    {
    	 $this->data['classes']        = StudentClass::all();
         $this->data['years']        = StudentYear::all();
          
       return view('backend.student.monthly_fee.monthly_fee_view',$this->data); 
    }
//end method


    public function ViewMonthlyData(Request $request)
    {
    	$year_id  = $request->year_id;
 	   $class_id = $request->class_id;

 	if($year_id !=''){
 		$where[] = ['year_id','like',$year_id.'%'];
 	}
 	if($class_id !=''){
 		$where[] = ['class_id','like',$class_id.'%'];
 	}

 	$allStudent =AssignStudent::with(['discount'])->where($where)->get();

 	   $html['thsource']  = '<th>SL</th>';
 	   $html['thsource']  .= '<th>ID NO.</th>';
 	   $html['thsource']  .= '<th>Student Name</th>';
 	   $html['thsource']  .= '<th>Roll No.</th>';
 	   $html['thsource']  .= '<th>Monthly Fee</th>';
 	   $html['thsource']  .= '<th>Discount</th>';
 	   $html['thsource']   .= '<th>Student Fee</th>';
 	   $html['thsource']  .= '<th>Actions</th>';

 	   foreach ($allStudent as $key => $v) {
 	     $registrationfee = FeeAmount::where('fee_category_id','2')->where('class_id',$v->class_id)->first();

 	     $color = 'success';

 	     $html [$key]['tdsource']   = '<td>'.($key+1).'</td>';
 	     $html [$key]['tdsource']  .= '<td>'.$v['student']['id_no'].'</td>';
 	     $html [$key]['tdsource']  .= '<td>'.$v['student']['name'].'</td>';
 	     $html [$key]['tdsource']  .= '<td>'.$v->roll.'</td>';
 	     $html [$key]['tdsource']  .= '<td>'.$registrationfee->amount.'</td>';
 	     $html [$key]['tdsource']  .= '<td>'.$v['discount']['discount'].'%'.'</td>';


 	     $originalfee         =$registrationfee->amount;
 	     $discount            =$v['discount']['discount'];
 	     $discounttablefee    =$discount/100*$originalfee;
 	     $finalfee            =(float)$originalfee-(float)$discounttablefee;

 	   	$html[$key]['tdsource'] .='<td>'.$finalfee.'$'.'</td>';

    	$html[$key]['tdsource'] .='<td>';
    	$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("student.monthly.fee.payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id. '&month='.$request->month.'">Fee Slip</a>';

    	 $html[$key]['tdsource'] .= '</td>';

 	   }
 	   return response()->json(@$html);
    }

//end mehtod

    public function PaySlipMonthlyData(Request $request)
    {
    	 $student_id   = $request->student_id;
    	$class_id     = $request->class_id;
    	$data['month']  = $request->month;

    	$data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->where('class_id',$class_id)->first();

    $pdf = PDF::loadView('backend.student.monthly_fee.monthly_fee_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');
    }



}
