<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Component extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    public function brand(){
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }

    public function items(){
        return $this->hasMany(Item::class);
    }
}
