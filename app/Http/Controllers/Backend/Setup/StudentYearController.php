<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class StudentYearController extends Controller
{

    public function YearView()
    {
    	 $this->data['allData'] = StudentYear::all();
    	 return view('backend.setup.student_year.view_year',$this->data);
    }

// End method
   
    public function YearAdd()
    {
    	 return view('backend.setup.student_year.add_year');
    }

// End method
   
   public function YearStore(Request $request)
   {
      $validata = $request->validate([
	    	'name'  => 'required|unique:student_years',
	     
	     ]);	

   	    $data              = new StudentYear();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Year Successfully Saved :)' ,'Success');
      return redirect()->route('student.year.view');
   }

   //End Mehtod

   public function YearEdit($id)
   {
         $this->data['editData'] = StudentYear::find($id);

    	 return view('backend.setup.student_year.edit_year',$this->data);
   }

   //End Method


   public function YearUpdate(Request $request, $id)
   {
   	    $data              =  StudentYear::find($id);
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Year Successfully Saved :)' ,'Success');
      return redirect()->route('student.year.view');
   }

  //End Method

   public function YearDelete($id)
   {
   	   $year = StudentYear::find($id);

  	   $year->delete();

  	   Toastr::success('Student Year Successfully Delete :)' ,'Success');
       return redirect()->route('student.year.view');
   }

  //End Method


}
