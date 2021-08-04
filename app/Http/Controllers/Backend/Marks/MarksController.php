<?php

namespace App\Http\Controllers\Backend\Marks;

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
use App\Models\ExamType;

use DB;
use PDF;
use App\Models\StudentMark;



class MarksController extends Controller
{
    public function MarksAdd()
    {
    	$this->data['classes']       = StudentClass::all();
        $this->data['years']         = StudentYear::all();	
        $this->data['exam_types']    = ExamType::all();	

    	return view('backend.marks.marks_add',$this->data);
    }
//End method

	 public function MarksStore(Request $request)
	 {
	 	$studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New StudentMark();
    		$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);

    }// end method


// End method

    public function MarksEdit()
    {
    	$this->data['classes']       = StudentClass::all();
        $this->data['years']         = StudentYear::all();	
        $this->data['exam_types']    = ExamType::all();	

    	return view('backend.marks.marks_edit',$this->data);
    }
//End method

    public function MarksEditgetstudents(Request $request)
    {
    	  $year_id           = $request->year_id;
    	  $class_id          = $request->class_id;
    	  $exam_type_id      = $request->exam_type_id;
    	  $assign_subject_id = $request->assign_subject_id;

    	  $getstudents = StudentMark::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->where('exam_type_id',$exam_type_id)->where('assign_subject_id',$assign_subject_id)->get();

    	  return response()->json($getstudents);

    }
//End method


    public function MarksUpdategetstudents(Request $request)
    {
    StudentMark::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('exam_type_id',$request->exam_type_id)->where('assign_subject_id',$request->assign_subject_id)->delete();



      $studentcount = $request->student_id;
    	if ($studentcount) {
    		for ($i=0; $i <count($request->student_id) ; $i++) { 
    		$data = New StudentMark();
    		$data->year_id = $request->year_id;
    		$data->class_id = $request->class_id;
    		$data->assign_subject_id = $request->assign_subject_id;
    		$data->exam_type_id = $request->exam_type_id;
    		$data->student_id = $request->student_id[$i];
    		$data->id_no = $request->id_no[$i];
    		$data->marks = $request->marks[$i];
    		$data->save();

    		} // end for loop
    	}// end if conditon

			$notification = array(
    		'message' => 'Student Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->back()->with($notification);
    }


}
