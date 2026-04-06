<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'first_name','last_name','email','phone',
        'address','city','state','postcode',
        'subtotal','shipping','total','order_id','product_id','quantity','price','payment_method','status',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
