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


}
