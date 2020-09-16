<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function brands(){
        return $this->belongsToMany(Brand::class)->withTimestamps();
    }
}
