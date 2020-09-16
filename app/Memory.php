<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memory extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

}
