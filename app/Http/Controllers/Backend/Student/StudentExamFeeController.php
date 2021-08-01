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

class StudentExamFeeController extends Controller
{
    public function ViewExamFee()
    {
        $this->data['classes']      = StudentClass::all();
         $this->data['years']       = StudentYear::all();
         $this->data['examy_type']  = ExamType::all();
          
       return view('backend.student.exam_fee.exam_fee_view',$this->data); 
    }
}
