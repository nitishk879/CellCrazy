<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = ['name', 'slug', 'user_id'];

    public function items(){
        return $this->belongsToMany(Item::class);
    }
}
