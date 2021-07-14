<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;


class StudentFeeCateroyController extends Controller
{
    public function FeeCategoryView()
    {
    	 $this->data['allData'] = FeeCategory::all();
    	 return view('backend.setup.fee_category.view_fee_cat',$this->data);
    }

//End Method


    public function FeeCategoryAdd()
    {
    	 return view('backend.setup.fee_category.add_fee_cat');
    }
//End Method


    public function FeeCategoryStore(Request $request)
    {
    	 
    	  $validata = $request->validate([
	    	'name'  => 'required|unique:fee_categories',
	     
	     ]);	

   	    $data              = new FeeCategory();
        $data->name        = $request->name;
        $data->save();

      Toastr::success('Student Fee Category Successfully Saved :)' ,'Success');
      return redirect()->route('fee.category.view');

    }
//End Method


   public function FeeCategoryEdit($id)
   {
   	  $this->data['editData'] = FeeCategory::find($id);
      return view('backend.setup.fee_category.edit_fee_cat',$this->data);
   }
  
  //End Mehtod


     public function FeeCategoryUpdate(Request $request , $id)
  {
  	    $data              = FeeCategory::find($id);
        $data->name        = $request->name;
        $data->save();

       Toastr::success('Student Fee Category Successfully Update :)' ,'Success');
      return redirect()->route('fee.category.view');
  }

  //End Mehtod



	  public function FeeCategoryDelete($id)
	  {
	  	      $feeCategory = FeeCategory::find($id);
		  	  $feeCategory->delete();
		  	  Toastr::success('Student Shift Successfully Update :)' ,'Success');
	          return redirect()->route('fee.category.view');
	  }



}
