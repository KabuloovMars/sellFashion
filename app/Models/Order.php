<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable= [

            'product_id',

            'user_name',

            'user_id',

            'user_email',

            'user_address',

            'user_phone',

            'product_name',

            'product_price',

            'total_price',

            'product_quantity',

            'img',

            'order_status',
    ];
}
