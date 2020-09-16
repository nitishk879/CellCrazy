<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    protected $table =  'colors';
    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'user_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
