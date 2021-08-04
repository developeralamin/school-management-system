<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GradePoint;


class GradpoinController extends Controller
{
    public function GradePointView()
    {
    	$this->data['allData']  = GradePoint::all();
    	return view('backend.marks.view_marks_grade_point',$this->data);
    }
//End method

    public function GradePointAdd()
    {
    	return view('backend.marks.add_marks_grade_point');
    }
//End method

 public function GradePointStore(Request $request)
 {
 	   $data = new GradePoint();
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Marks Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.grade')->with($notification);
 }

// Toastr::success('Employee Registration Successfully Saved :)' ,'Success');
//     	return redirect()->route('employee.registration.view');

  public function GradePointEdit($id)
  {
  	   $this->data['editData']  = GradePoint::find($id);
     return view('backend.marks.edit_marks_grade_point',$this->data);
  }

//End method

  public function GradePointUpdate(Request $request , $id)
  {
  	   $data = GradePoint::find($id);
    	$data->grade_name = $request->grade_name;
    	$data->grade_point = $request->grade_point;
    	$data->start_marks = $request->start_marks;
    	$data->end_marks = $request->end_marks;
    	$data->start_point = $request->start_point;
    	$data->end_point = $request->end_point;
    	$data->remarks = $request->remarks;
    	$data->save();

		$notification = array(
    		'message' => 'Grade Marks Updated Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.grade')->with($notification);
  }

//End method

  public function GradePointDelete($id)
  {
  	   $data = GradePoint::find($id);
  	   $data->delete();

  	   $notification = array(
    		'message' => 'Grade Marks Delete Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('marks.grade')->with($notification);

  }


}
