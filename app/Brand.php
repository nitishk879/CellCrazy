<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'brands';

    use SoftDeletes;
    protected $fillable = ['name', 'slug', 'user_id'];

    public function services(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function accessory(){
        return $this->hasOne(Accessory::class);
    }

    // this need brand_id @ items table. This is best, because, one product has one brand
    public function items(){
        return $this->hasMany(Item::class);
    }
}
