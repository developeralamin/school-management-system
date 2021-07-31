<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;

use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\Employee;
use App\Models\Designation;
use DB;
use PDF;



class EmployeeRegistrationController extends Controller

{

    public function EmployeeView()
    {

    $this->data['allData'] = User::where('usertype','Employee')->get();
    return view('backend.employee.employee_reg.employee_view',$this->data); 

     }

//End method 

   public function EmployeeAdd()
   {
 
      $this->data['designation']      = Designation::all();	
      return view('backend.employee.employee_reg.employee_add',$this->data);

   }

//End method 


  public function EmployeeStore(Request $request)
  {
      DB::transaction(function() use($request){
    	$checkYear = date('Ym',strtotime($request->join_date));
    	//dd($checkYear);
    	$employee = User::where('usertype','employee')->orderBy('id','DESC')->first();

    	if ($employee == null) {
    		$firstReg = 0;
    		$employeeId = $firstReg+1;
    		if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}
    	}else{
     $employee = User::where('usertype','employee')->orderBy('id','DESC')->first()->id;
     	$employeeId = $employee+1;
     	if ($employeeId < 10) {
    			$id_no = '000'.$employeeId;
    		}elseif ($employeeId < 100) {
    			$id_no = '00'.$employeeId;
    		}elseif ($employeeId < 1000) {
    			$id_no = '0'.$employeeId;
    		}

    	} // end else 

    	$final_id_no = $checkYear.$id_no;
    	$user = new User();
    	$code = rand(0000,9999);
    	$user->id_no = $final_id_no;
    	$user->password = bcrypt($code);
    	$user->usertype = 'employee';
    	$user->code = $code;
    	$user->name = $request->name;
    	$user->fname = $request->fname;
    	$user->mname = $request->mname;
    	$user->mobile = $request->mobile;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	$user->religion = $request->religion;
    	$user->salary = $request->salary;
    	$user->designation_id = $request->designation_id;
    	$user->dob = date('Y-m-d',strtotime($request->dob));
    	$user->join_date = date('Y-m-d',strtotime($request->join_date));

    	if ($request->file('image')) {
    		$file = $request->file('image');
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('uploads/employee_image'),$filename);
    		$user['image'] = $filename;
    	}
 	    $user->save();

          $employee_salary = new Employee();
          $employee_salary->employee_id = $user->id;
          $employee_salary->effected_salary = date('Y-m-d',strtotime($request->join_date));
          $employee_salary->previous_salary = $request->salary;
          $employee_salary->present_salary = $request->salary;
          $employee_salary->increment_salary = '0';
          $employee_salary->save();

           
    	});


    	 Toastr::success('Employee Registration Successfully Saved :)' ,'Success');
    	return redirect()->route('employee.registration.view');


  }

//End method 


  public function EmployeeEdit($id)
  {
       $this->data['editData']     = User::find($id);
       $this->data['designation']  = Designation::all();

       return view('backend.employee.employee_reg.employee_edit',$this->data);
  }


//End Method

  public function EmployeeUpdate(Request $request ,$id)
  {
      
      $user = User::find($id);
      $user->name = $request->name;
      $user->fname = $request->fname;
      $user->mname = $request->mname;
      $user->mobile = $request->mobile;
      $user->address = $request->address;
      $user->gender = $request->gender;
      $user->religion = $request->religion;
      $user->designation_id = $request->designation_id;
      $user->dob = date('Y-m-d',strtotime($request->dob));


      if ($request->file('image')) {

        $file = $request->file('image');
        @unlink(public_path('uploads/employee_image/'.$user->image));
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('uploads/employee_image'),$filename);
        $user['image'] = $filename;


      }

      $user->save();

      Toastr::success('Employee Registration Successfully Updated :)' ,'Success');
      return redirect()->route('employee.registration.view');
  }

//End method
//End method
  


  public function EmployeeDetails($id)
  {


  $this->data['details']  = User::find($id);  
     // dd($this->data['editData']->toArray());
  $pdf = PDF::loadView('backend.employee.employee_reg.employe_pdf',$this->data);
  $pdf->SetProtection(['copy', 'print'], '', 'pass');
  return $pdf->stream('document.pdf');


  }

 //End method
 //End method
   




}
