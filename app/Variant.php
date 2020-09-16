<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variant extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    public function items(){
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    public function price(){
        return $this->belongsToMany(Price::class)->withTimestamps();
    }
}
