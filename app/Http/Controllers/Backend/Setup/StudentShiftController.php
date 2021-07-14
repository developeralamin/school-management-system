<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class StudentShiftController extends Controller
{
    
    public function ShiftView()
    {
    	 $this->data['allData'] = StudentShift::all();
    	 return view('backend.setup.student_shift.view_shift',$this->data);
    }

  //End Mehtod

    public function ShiftAdd()
    {
    
    return view('backend.setup.student_shift.add_shift');

    }

   //End Mehtod

    public function ShiftStore(Request $request)
    {
    
       $validata = $request->validate([
	    	'name'  => 'required|unique:student_shifts',
	     
	     ]);	

   	    $data              = new StudentShift();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Shift Successfully Saved :)' ,'Success');
      return redirect()->route('student.shift.view');

    }

     //End Mehtod

   public function ShiftEdit($id)
   {
   	  $this->data['editData'] = StudentShift::find($id);
      return view('backend.setup.student_shift.edit_shift',$this->data);
   }
  
  //End Mehtod


  public function ShiftUpdate(Request $request , $id)
  {
  	    $data              = StudentShift::find($id);
        $data->name        = $request->name;
        $data->save();

       Toastr::success('Student Shift Successfully Update :)' ,'Success');
      return redirect()->route('student.shift.view');
  }

  //End Mehtod

  public function ShiftDelete($id)
  {
  	      $shift = StudentShift::find($id);
	  	  $shift->delete();
	  	  Toastr::success('Student Shift Successfully Update :)' ,'Success');
          return redirect()->route('student.shift.view');
  }



}
