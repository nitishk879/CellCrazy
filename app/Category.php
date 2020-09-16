<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'categories';
    use SoftDeletes;
    protected $fillable = ['name', 'slug'];

    public function services(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function condition(){
        return $this->hasOne(Condition::class);
    }

    public function network(){
        return $this->hasOne(Network::class);
    }

    public function accessories(){
        return $this->hasMany(Accessory::class);
    }


    public function types(){
        return $this->belongsToMany(Type::class)->withTimestamps();
    }

    public function items(){
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    public function assignType($id){
        return $this->services()->sync($id, false);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }

    public function conditions(){
        return $this->hasMany(Condition::class);
    }

    public function price(){
        return $this->belongsTo(Price::class);
    }
}
