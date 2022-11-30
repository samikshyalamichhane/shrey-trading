<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    public function product_info (){
		return $this->hasOne(Product::class, 'id', 'product_id');
	}
	public function user_info (){
		return $this->hasOne(User::class, 'id', 'user_id');

	}
    public function client (){
		return $this->hasOne(Client::class, 'id', 'client_id');

	}
	public function order_list(){
		return $this->hasMany(OrderList::class,'order_id');
	}
    
}
