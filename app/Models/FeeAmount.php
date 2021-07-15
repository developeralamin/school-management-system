<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;

   public function fee_category()
   {
      return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
   }

   public function student_classes()
   {
      return $this->belongsTo(StudentClass::class,'class_id','id');
   }

}
