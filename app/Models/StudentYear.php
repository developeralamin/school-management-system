<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function deliveryList() {
    return $this->hasMany( DeliveryList::class, 'order_lists_id' );
}
}
