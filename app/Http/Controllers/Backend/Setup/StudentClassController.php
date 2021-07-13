<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class StudentClassController extends Controller
{
    public function ClassView()
    {
    	 $this->data['allData'] = StudentClass::all();
    	 return view('backend.setup.student_class.view_class',$this->data);

    }

// End method

   public function ClassAdd()
   {
   	  return view('backend.setup.student_class.add_class');
   }

// End method

   public function ClassStore(Request $request)
   {
   	    $validata = $request->validate([
	    	'name'  => 'required|unique:student_classes',
	     
	     ]);	

   	    $data              = new StudentClass();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Class Successfully Saved :)' ,'Success');
      return redirect()->route('student.class.view');
   }


 // End method

  public function ClassEdit($id)
  {
  	     $this->data['editData'] = StudentClass::find($id);

    	 return view('backend.setup.student_class.edit_class',$this->data);
  }
 // End method


	public function ClassUpdate(Request $request, $id)
	{
	    $data              = StudentClass::find($id);
        $data->name        = $request->name;
        $data->save();

       Toastr::success('Student Class Successfully Saved :)' ,'Success');
      return redirect()->route('student.class.view');
	}


 // End method

   public function ClassDelete($id)
   {
   	   $class = StudentClass::find($id);

  	   $class->delete();

  	   Toastr::success('Student Class Successfully Delete :)' ,'Success');
       return redirect()->route('student.class.view');
   }
 // End method
}
