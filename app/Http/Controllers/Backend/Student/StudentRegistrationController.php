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



class StudentRegistrationController extends Controller
{
    public function ViewRegistration()
    {
        $this->data['allData']  = AssignStudent::all();

        return view('backend.student.student_reg.student_view',$this->data);    
    }

//End method

    public function AddStudentRegistration()
    {
      $this->data['classes'] = StudentClass::all();
      $this->data['years']   = StudentYear::all();	
      $this->data['groups'] = StudentGroup::all();	
      $this->data['shifts'] = StudentShift::all();	
      
      return view('backend.student.student_reg.student_add',$this->data);
    }

//End method
    
    public function StudentRegistraionStore(Request $requst)
    {
    	# code...
    }

   //End method




}
