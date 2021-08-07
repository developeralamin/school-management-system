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

class MarkSheetController extends Controller
{
	public function MarkSheetView()
	{
		$this->data['years']       = StudentYear::all();
		$this->data['classes']     = StudentClass::all();
		$this->data['exam_types']  = ExamType::all();

		return view('backend.reports.marksheet.marks_generate_view',$this->data); 
	}
//End method


	public function MarkSheetGet(Request $request)
	{
		
			$year_id      = $request->year_id;
			$class_id     = $request->class_id;
			$exam_type_id = $request->exam_type_id;
			$id_no        = $request->id_no;

	$count_fail =StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->where('marks','<','33')->get();		

		// dd($count_fail);
	$single_student =StudentMark::where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->first();	

	if($single_student == true){
       
       $allmarks = StudentMark::with(['assign_subject','year'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('id_no',$id_no)->get();	

       // dd($allmarks);

       $allgrade =GradePoint::all();

      return view('backend.reports.marksheet.marksheet_pdf',compact('count_fail','allgrade','allmarks'));

	}else{
		$notification = array(
    		'message' => 'Sorry these Criteria Does not Match',
    		'alert-type' => 'error'
    	);

    	return redirect()->back()->with($notification);
	}





	}//End method




}
