<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_status', 'order_price', 'order_type', 'product_id', 'product_quantity', 'product_price', 'total_price', 'order_details', 'customer_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function item(){
        return $this->belongsTo('App\Item', 'product_id', 'id');
    }
}
