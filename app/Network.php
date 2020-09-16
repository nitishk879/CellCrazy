<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Network extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'condition_id', 'user_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
