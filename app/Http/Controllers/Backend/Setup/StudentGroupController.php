<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class StudentGroupController extends Controller
{
    public function GroupView()
    {
    	 $this->data['allData'] = StudentGroup::all();
    	 return view('backend.setup.student_group.view_group',$this->data);
    }

   // End method
  
	  public function GroupAdd()
	  {
	  	  return view('backend.setup.student_group.add_group');
	  }
	// End method

	  public function GroupStore(Request $request)
	  {
	  	 $validata = $request->validate([
	    	'name'  => 'required|unique:student_groups',
	     
	     ]);	

   	    $data              = new StudentGroup();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Group Successfully Saved :)' ,'Success');
      return redirect()->route('student.group.view');
	  }

	// End method


}
