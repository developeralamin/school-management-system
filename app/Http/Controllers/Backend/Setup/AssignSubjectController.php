<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignSubject;
use App\Models\SchoolSubject;
use App\Models\StudentClass;


class AssignSubjectController extends Controller
{
     public function AssignSubjectView()
     {
     	 $this->data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
     // $this->data['allData'] = AssignSubject::all();
     return view('backend.setup.assign_subject.assign_subject_view',$this->data);

     }
    // End Method
    

    public function AssignSubjectAdd($value='')
     {
     	 $this->data['classes']           = StudentClass::all();
    	 $this->data['subjects']           = SchoolSubject::all();
     	 return view('backend.setup.assign_subject.assign_subject_add',$this->data);
     } 

  // End Method


   public function AssignSubjectStore(Request $request)
   {
   	  $countSubject = count($request->subject_id); 

		if($countSubject != NULL){

			for ($i=0; $i < $countSubject ; $i++) { 
				
				$assign_subject                    = new AssignSubject();
				$assign_subject->class_id          = $request->class_id;
				$assign_subject->subject_id        = $request->subject_id[$i];
				$assign_subject->full_mark         = $request->full_mark[$i];
				$assign_subject->pass_mark         = $request->pass_mark[$i];
				$assign_subject->subjective_mark   = $request->subjective_mark[$i];
				
		       $assign_subject->save();

			} // End for loop

		} //End if conditon
		  
       Toastr::success('Assign Subject Successfully Saved :)' ,'Success');
       return redirect()->route('assign.subject.view');
   
   }

 // End Method






}
