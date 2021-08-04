<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    public function student()
   {
      return $this->belongsTo(User::class,'student_id','id');
   }

     public function assign_subject(){
    	return $this->belongsTo(AssignSubject::class, 'assign_subject_id','id');
    }
    
  public function student_subject()
   {
      return $this->belongsTo(SchoolSubject::class,'subject_id','id');
   }
    
}
