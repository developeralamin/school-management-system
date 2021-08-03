<?php

namespace App\Http\Controllers\Backend;

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
use App\Models\AssignSubject;

class DefaultController extends Controller
{

   public function GetSubject(Request $request){
    	$class_id = $request->class_id;
    	$allData = AssignSubject::with(['student_subject'])->where('class_id',$class_id)->get();
    	return response()->json($allData);

    }
//End method

     public function GetStudents(Request $request){
    	$year_id = $request->year_id;
    	$class_id = $request->class_id;
    	$allData = AssignStudent::with(['student'])->where('year_id',$year_id)->where('class_id',$class_id)->get();
    	return response()->json($allData);

    }



}
