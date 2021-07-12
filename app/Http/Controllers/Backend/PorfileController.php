<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;


class PorfileController extends Controller
{
    public function ViewProfile()
    {
    	$id = Auth::user()->id;
    	$user = User::find($id);

    	return view('backend.users.view_profile',compact('user'));
    }

    public function EditProfile()
    {
    	$id 			= Auth::user()->id;
    	$editData       = User::find($id);

    	return view('backend.users.edit_profile',compact('editData'));
    }

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
       



}
