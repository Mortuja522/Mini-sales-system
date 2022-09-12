<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\Sell;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";
    public $timestamps = false;

    public function customer()
    {
        return $this->belongsTo(Customer::class , 'customer_id');

    }

    public function sells()
    {
        return $this->hasMany(Sell::class , 'order_id');

    }


}
