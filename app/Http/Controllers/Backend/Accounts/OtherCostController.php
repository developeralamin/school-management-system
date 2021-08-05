<?php

namespace App\Http\Controllers\Backend\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    }


}
