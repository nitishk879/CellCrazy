<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mac extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'mac', 'model_number', 'message', 'status'];
}
