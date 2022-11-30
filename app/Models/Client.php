<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    // use Notifiable;
    protected $guard = 'client';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function products(){
    	return $this->belongsToMany(Product::class,'client_products');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

}
