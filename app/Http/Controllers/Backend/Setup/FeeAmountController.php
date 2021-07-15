<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\StudentClass;


class FeeAmountController extends Controller
{
  public function FeeAmountView()
    {
    	 $this->data['allData'] = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

    	 return view('backend.setup.fee_amount.fee_amount_view',$this->data);

    }

// End method

    public function FeeAmountAdd()
    {
    	 $this->data['fee_categories']    = FeeCategory::all();
    	 $this->data['classes']           = StudentClass::all();

    	return view('backend.setup.fee_amount.fee_amount_add',$this->data);
    }

// End method

   public function FeeAmountStore(Request $request)
   {
      
   	  $countClass =count($request->class_id);

   	  if($countClass !=NULL){
          for ($i=0; $i < $countClass; $i++) { 
          	   $fee_amount                  = new FeeAmount();
          	   $fee_amount->fee_category_id = $request->fee_category_id;
          	   $fee_amount->class_id        = $request->class_id[$i];
          	   $fee_amount->amount          = $request->amount[$i];
          	   $fee_amount->save();
          }//End for loop

   	  } //End if condition

   	   Toastr::success('Student Fee Amount Successfully Saved :)' ,'Success');
       return redirect()->route('fee.amount.view');

   }// End method


  public function FeeAmountEdit($fee_category_id)
   {
      $this->data['editData']        = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();

      $this->data['fee_categories']    = FeeCategory::all();
      $this->data['classes']           = StudentClass::all();

    return view('backend.setup.fee_amount.fee_amount_edit',$this->data);


   }


// End Method

   public function FeeAmountUpdate(Request $request , $fee_category_id)
   {
       if ($request->class_id == NULL) {
	        $notification = array(
	        	'message' => 'Sorry You do not select any Fee Amount',
	        	'alert-type' => 'error'
	        );   
       	  // Toastr::success('Sorry You do not select any Fee Amount:)' ,'Success');

          return redirect()->back()->with($notification);

       }else{
          
       	 $countClass =count($request->class_id);

   	 FeeAmount::where('fee_category_id',$fee_category_id)->delete();
          for ($i=0; $i < $countClass; $i++) { 
          	   $fee_amount                  = new FeeAmount();
          	   $fee_amount->fee_category_id = $request->fee_category_id;
          	   $fee_amount->class_id        = $request->class_id[$i];
          	   $fee_amount->amount          = $request->amount[$i];
          	   $fee_amount->save();
          }//End for loop

       }
       Toastr::success('Data Updated Successfully:)' ,'Success');
       return redirect()->route('fee.amount.view');

   } //end else


// End Method

   public function FeeAmountDetails($fee_category_id)
   {
     	$this->data['DetailsData'] = FeeAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();

    	 return view('backend.setup.fee_amount.fee_amount_details',$this->data);
   }

	// End method




}
