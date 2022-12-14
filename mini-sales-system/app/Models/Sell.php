<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;

class Sell extends Model
{
    use HasFactory;

    protected $table = "sells";
    public $timestamps = false;


    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');

    }

    public function product()
    {
        return $this->belongsTo(Product::class , 'product_id');

    }

    public function order()
    {
        return $this->belongsTo(Order::class , 'order_id');

    }
}
