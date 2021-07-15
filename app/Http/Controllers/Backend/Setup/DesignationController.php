<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\Designation;


class DesignationController extends Controller
{
    public function DesignationView()
    {
    	$this->data['allData']  = Designation::all();

       return view('backend.setup.designation.view_designation',$this->data);
    }

     // End method
   
   public function DesignationAdd()
   {
   	    return view('backend.setup.designation.add_designation');
   }

    //End method
    
    public function DesignationStore(Request $request)
    {
    	  $validata = $request->validate([
	    	'name'  => 'required|unique:designations',
	     
	     ]);	

   	    $data              = new Designation();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Designation Successfully Saved :)' ,'Success');
      return redirect()->route('designation.view');
    }

   //End method

    public function DesignationEdit($id)
    {
    	 $this->data['editData']  = Designation::find($id);

       return view('backend.setup.designation.edit_designation',$this->data);
    }

  //End mehtod

    public function DesignationUpdate(Request $request ,$id)
    {
    	  $data                =  Designation::find($id);
        $data->name            = $request->name;
        $data->save();

      Toastr::success('Designation Successfully Update :)' ,'Success');
      return redirect()->route('designation.view');
    }

   // End method

   
   public function DesignationDelete($id)
   {
   	  $designation = Designation::find($id);

   	  $designation->delete();

   	   Toastr::success('Designation Successfully Delete :)' ,'Success');
      return redirect()->back();
   }



}
