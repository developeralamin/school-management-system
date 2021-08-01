<?php

namespace App\Http\Controllers\Backend\Student;

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
use DB;
use PDF;


class StudentRollController extends Controller
{
    public function ViewRollGenerate()
    {
    	  $this->data['classes']        = StudentClass::all();
          $this->data['years']        = StudentYear::all();
          
          return view('backend.student.roll_generate.roll_generate_view',$this->data); 
    }

    public function GetStudents(Request $request)
    {
    	 $this->data['allData'] =AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

       // dd($this->data['allData'])->toArray();
       return response()->json($this->data['allData']);

    }


  public function StudentStore(Request $request)
  {
  	
        $year_id  = $request->year_id;
        $class_id = $request->class_id;

        if ($request->student_id !=null) {
          for ($i=0; $i <count($request->student_id) ; $i++) { 
            AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(['roll' => $request->roll[$i]]);
          }//end for loop

        }else{
            $notification = array(
            'message' => 'Sorry there are no Student',
            'alert-type' => 'error'
         );
       return redirect()->back()->with($notification);
        }//end if conditions

         $notification = array(
            'message' => 'Well Done Roll Generate Successfully',
            'alert-type' => 'success'
          );
       return redirect()->route('roll.generate.view')->with($notification);

  }


}
