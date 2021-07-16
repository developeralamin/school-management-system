<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\User;


class UserController extends Controller
{
    public function UserView()
    {
    	 $this->data['allData'] = User::where('usertype','Admin')->get();

    	 return view('backend.users.view_user',$this->data);
    }
     // End method

    public function UserAdd()
    {
    	return view('backend.users.add_user');
    }

 // End method

    public function UserStore (Request $request)
    {
    	
    $validata = $request->validate([
    	'email' => 'required|unique:users',
        'name' => 'required',
    ]);	

        $data              = new User();
        $code              = rand(00000,999999);
        $data->usertype    = 'Admin';
        $data->role        = $request->role;
        $data->name        = $request->name;
        $data->email       = $request->email;
        $data->password    = bcrypt($code);
        $data->code        = $code;
        $data->save();

     Toastr::success('User Successfully Saved :)' ,'Success');
      return redirect()->route('user.view');
       
    }

 // End method


    public function UserEdit($id)
    {
    	 $this->data['editData'] = User::find($id);

    	 return view('backend.users.edit_user',$this->data);
    }

    public function UserUpdate(Request $request, $id)
    {
    	 $data              = User::find($id);
      $data->name         = $request->name;
      $data->email        = $request->email;
      $data->role         = $request->role;
      $data->save();

      Toastr::success('User Successfully Updated :)' ,'Success');
      return redirect()->route('user.view');
    }
 // End method

    

  public function UserDelete($id)
  {
  	   $user = User::find($id);

  	   $user->delete();

  	   Toastr::success('User Successfully Delete :)' ,'Success');
       return redirect()->route('user.view');
  }

 // End method

}
