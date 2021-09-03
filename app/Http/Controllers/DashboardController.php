<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Charts\SchoolChart;

class DashboardController extends Controller
{
   
   public function AdminView()
   {
       $count_student = User::where('usertype','Student')->count();
         
 $today_users = User::whereDate('created_at', today())->count();
$yesterday_users = User::whereDate('created_at', today()->subDays(1))->count();
$users_2_days_ago = User::whereDate('created_at', today()->subDays(2))->count();

$chart = new SchoolChart;
$chart->labels(['2 days ago', 'Yesterday', 'Today']);
$chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);

       return view('admin.index',compact('count_student')); 
   }
    
   
}
