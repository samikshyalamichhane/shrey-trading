<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    
    public function product_info (){
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
}
