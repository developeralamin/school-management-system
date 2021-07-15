<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;

  public function student_classes()
   {
      return $this->belongsTo(StudentClass::class,'class_id','id');
   }

  public function student_subject()
   {
      return $this->belongsTo(SchoolSubject::class,'subject_id','id');
   }
   
   
}
