<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\OtherCost;


class OtherCostController extends Controller
{
    public function OtherAccountCostView()
    {
    	$this->data['allData']  = OtherCost::all();
    	 return view('backend.accounts.others_fee.others_account_view',$this->data); 
    }
//End method

    public function OtherAccountCostAdd()
    {
    	 return view('backend.accounts.others_fee.others_account_add'); 
    }
//End method

    public function OtherAccountCosStore(Request $request)
    {
    	  $validata = $request->validate([
	    	'amount'  => 'required',
	    	'date'  => 'required',
	    	'description'  => 'required',
	     ]);	
   
    $data = new OtherCost();

    $data->amount       = $request->amount;
    $data->date         = date('Y-m-d',strtotime($request->date));
    $data->description  = $request->description;
   
     if ($request->file('image')) {
        $file = $request->file('image');
        // @unlink(public_path('uploads/user_image/'.$user->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('uploads/other_cost_image'),$filename);
        $data['image'] = $filename;
    }

    $data->save();

     Toastr::success('Account Other Cost Successfully Saved :)' ,'Success');
    return redirect()->route('account.others.cost');
 }
//End method


  public function OtherAccountCosedit($id)
  {
     $this->data['editData']  = OtherCost::find($id);
         return view('backend.accounts.others_fee.others_account_edit',$this->data); 
  }

//End method
  public function OtherAccountCosUpdate(Request $request , $id)
  {
       $data = OtherCost::find($id);

    $data->amount       = $request->amount;
    $data->date         = date('Y-m-d',strtotime($request->date));
    $data->description  = $request->description;
   
     if ($request->file('image')) {
        $file = $request->file('image');
        @unlink(public_path('uploads/other_cost_image/'.$user->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('uploads/other_cost_image'),$filename);
        $data['image'] = $filename;
    }

    $data->save();

    Toastr::success('Account Other Cost Successfully Update :)' ,'Success');
    return redirect()->route('account.others.cost');
  }
//End method

  public function OtherAccountCosdelete($id)
  {
      $data = OtherCost::find($id);
      $data->delete();

    Toastr::success('Account Other Cost Successfully Delete :)' ,'Success');
    return redirect()->route('account.others.cost');

  }




}
