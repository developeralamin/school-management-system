<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\SchoolSubject;


class SchoolSubjectController extends Controller
{
    public function SchoolSubjectView()
    {
    	 $this->data['allData'] = SchoolSubject::all();
     	return view('backend.setup.school_subject.view_school_subject',$this->data);

    }
 //End method
  
  public function SchoolSubjectAdd()
  {
  	  return view('backend.setup.school_subject.add_school_subject',$this->data);
  }

//End mehtod
   
   public function SchoolSubjectStore(Request $request)
   {
   	   $validata = $request->validate([
	    	'name'  => 'required|unique:school_subjects',
	     
	     ]);	

   	    $data              = new SchoolSubject();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('School Subject Successfully Saved :)' ,'Success');
      return redirect()->route('school.subject.view');
   }

//End method

   public function SchoolSubjectEdit($id)
   {
   	 $this->data['editData'] = SchoolSubject::find($id);
     	return view('backend.setup.school_subject.edit_school_subject',$this->data);

   }

//End method

   public function SchoolSubjectUpdate(Request $request , $id)
   {
        $data              =  SchoolSubject::find($id);
        $data->name        = $request->name;
        $data->save();

      Toastr::success('School Subject Successfully Update :)' ,'Success');
      return redirect()->route('school.subject.view');
   }


//End method


   public function SchoolSubjectDelete($id)
   {
   	   $school_subject = SchoolSubject::find($id);
   	   $school_subject->delete();


   	   Toastr::success('School Subject Successfully Delete :)' ,'Success');
      return redirect()->back();
   }




}
