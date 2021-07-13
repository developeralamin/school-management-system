<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PorfileController extends Controller
{
    public function ViewProfile()
    {
    	$id = Auth::user()->id;
    	$user = User::find($id);

    	return view('backend.users.view_profile',compact('user'));
    }
    
 // End method


    public function EditProfile()
    {
    	$id 			= Auth::user()->id;
    	$editData       = User::find($id);

    	return view('backend.users.edit_profile',compact('editData'));
    }

 // End method

	  public function StoreProfile(Request $request)

	  {
	       $data  = User::find(Auth::user()->id);
           $data->name          = $request->name;
           $data->email         = $request->email;
           $data->address       = $request->address;
           $data->gender        = $request->gender;
           $data->mobile        = $request->mobile;

      // if($request->file('image')) {
      //      	 $file=$request->file('image');
      //      	 @unlink(public_path('uploads/user_image/'.$data->image));
      //      	 $filename = date('YmdHi').$file->getClientOriginalName();
      //      	 $file->move(public_path('uploads/user_image'),$filename);
      //      	 $data['image'] = $filename;
      //      }


 	   if ($request->file('image')) {
    		$file = $request->file('image');
    		@unlink(public_path('uploads/user_image/'.$data->image));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('uploads/user_image'),$filename);
    		$data['image'] = $filename;
    	}
    	

             $data->save();

            Toastr::success('Profile Successfully Updated :)' ,'Success');
            return redirect()->route('profile.view');

	   }  //end method
       
     
     public function PasswordView()
     {
     	return view('backend.users.edit_password');
     }
    // End method

     public function PasswordUpdate(Request $request)
     {
     	   $validata = $request->validate([
	    	'oldpassword'  => 'required',
	        'password'     => 'required|confirmed',
	     ]);	

     	   $haspassword = Auth::user()->password;

     	if(Hash::check($request->oldpassword,$haspassword)){
     	  	 $user = User::find(Auth::id());
     	  	 $user->password = Hash::make($request->password);
     	  	 $user->save();
     	  	 Auth::logout();
     	  	 return redirect()->route('login');
     	  }
     	  else{
     	  	 return redirect()->back();
     	  }
     }
 // End method

}
