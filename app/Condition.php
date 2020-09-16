<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condition extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'category_id', 'user_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function category(){
        return $this->belongsTo(Condition::class);
    }
}
