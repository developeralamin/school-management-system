<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

use DB;
use PDF;
use App\Models\StudentMark;
use App\Models\GradePoint;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\ExamType;

class ResultReportController extends Controller
{
    public function ResultReportView()
    {
    	$this->data['years']       = StudentYear::all();
		$this->data['classes']     = StudentClass::all();
		$this->data['exam_types']  = ExamType::all();

		return view('backend.reports.student_result.student_result',$this->data); 
    }

//End methodd

    public function ResultReportStore(Request $request)
    {
    	  $year_id        =$request->year_id;
    	  $class_id       =$request->class_id;
    	  $exam_type_id  =$request->exam_type_id;

    $singleResult =StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->get();

    if ($singleResult == true) {
    	  $this->data['allData'] = StudentMark::select('year_id','class_id','student_id','exam_type_id')->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->groupBy('year_id')->groupBy('class_id')->groupBy('exam_type_id')->groupBy('student_id')->get();

    	  // dd($this->data['allData']->toArray());

   $pdf = PDF::loadView('backend.reports.student_result.student_result_pdf', $this->data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

    }else{
    	$notification = array(
    		'message' => 'Sorry These Criteria Donse not match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
    }//end if condition



    }//end method

   public function StudentCardView()
   {
        $this->data['years']       = StudentYear::all();
        $this->data['classes']     = StudentClass::all();

        return view('backend.reports.student_id_card.student_id_card',$this->data); 
   }

//End method

   public function StudentCardStore(Request $request)
   {
         $year_id  = $request->year_id;
         $class_id = $request->class_id;

    $StudentCard =AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->first();
      
    if ($StudentCard == true) {
         $this->data['allData'] =AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->get();
         // dd($this->data)->toArray();

   $pdf = PDF::loadView('backend.reports.student_id_card.student_id_card_pdf', $this->data);
    $pdf->SetProtection(['copy', 'print'], '', 'pass');
    return $pdf->stream('document.pdf');

    }else{
        $notification = array(
            'message' => 'Sorry These Criteria Donse not match',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }//end if condition



   }//End method



}
