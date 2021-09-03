<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
   
   public function AdminView()
   {
       $count_student = User::where('usertype','Student')->count();
         

       return view('admin.index',compact('count_student')); 
   }

   
}
