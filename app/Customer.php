<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address_line_1', 'address_line_2', 'city',
        'county', 'country', 'postal_code', 'imei', 'message', 'account_holder_name', 'account_number',
        'account_short_code'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
