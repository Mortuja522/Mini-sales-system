<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Customer extends Model
{
    use HasFactory;

    protected $table = "customers";
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');

    }

    public function orders()
    {
        return $this->hasMany(Order::class , 'customer_id');

    }


}
