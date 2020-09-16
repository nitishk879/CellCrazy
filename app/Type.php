<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'user_id'];

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function brands(){
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }

    // this need type_id @ items table. This is best, because,
    // one product has one type i.e. phone/iPad/laptop
    public function items(){
        return $this->hasMany(Item::class);
    }
}
