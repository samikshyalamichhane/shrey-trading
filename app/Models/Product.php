<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    public function clients(){
    	return $this->belongsToMany(Client::class,'client_products');
    }
}
