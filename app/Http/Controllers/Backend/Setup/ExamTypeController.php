<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\ExamType;


class ExamTypeController extends Controller
{
     public function ExamTypeView()
     {
     	$this->data['allData'] = ExamType::all();

     	return view('backend.setup.exam_type.view_exam_type',$this->data);
     }

 // End Method
      
      public function ExamTypeAdd()
      {
      	return view('backend.setup.exam_type.add_exam_type');
      }
  
 // End Method

      public function ExamTypeStore(Request $request)
      {
      	
      	 $validata = $request->validate([
	    	'name'  => 'required|unique:exam_types',
	     
	     ]);	

   	    $data              = new ExamType();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Exam Type Successfully Saved :)' ,'Success');
      return redirect()->route('exam.type.view');

      }

 // End Method

      public function ExamTypeEdit($id)
      {
      	$this->data['editData'] = ExamType::find($id);

     	return view('backend.setup.exam_type.edit_exam_type',$this->data);
      }

 // End Method

    public function ExamTypeUpdate(Request $request, $id)
    {
    	
   	    $data              =  ExamType::find($id);
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Exam Type Successfully Update :)' ,'Success');
      return redirect()->route('exam.type.view');
    }

 //End Method


    public function ExamTypeDelete($id)
    {
    	  $exam_type = ExamType::find($id);

    	  $exam_type->delete();

      Toastr::success('Student Exam Type Successfully Delete :)' ,'Success');
       return redirect()->back();
    }


}
