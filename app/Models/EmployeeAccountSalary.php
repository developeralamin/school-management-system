<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAccountSalary extends Model
{
    use HasFactory;
    
 public function employee()
   {
      return $this->belongsTo(User::class,'employee_id','id');
   }


}
