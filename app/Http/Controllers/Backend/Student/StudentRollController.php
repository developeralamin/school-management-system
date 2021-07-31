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
          
          return view('backend.student.roll_generate.roll_student_view',$this->data); 
    }

    public function GetStudents(Request $request)
    {
    	dd('ok done');
    }


  public function StudentStore()
  {
  	# code...
  }

}
