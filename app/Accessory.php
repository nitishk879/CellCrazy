<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [ 'name', 'image', 'slug', 'price', 'published', 'stock', 'brand_id', 'category_id', 'user_id'];

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Brand::class);
    }
}
