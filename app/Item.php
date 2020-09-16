<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'items';
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'short_desc', 'long_desc', 'slug', 'published', 'stock', 'category_id', 'type_id', 'brand_id', 'user_id'];

    // Item belongs to only single brand
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    // Item belongs to only single brand
    public function type(){
        return $this->belongsTo(Type::class);
    }
    // Item belongs to only single brand
    public function category(){
        return $this->belongsTo(Category::class);
    }
    // Item belongs to only single brand
    public function service(){
        return $this->belongsTo(Service::class);
    }

    // Item belongs to a particular memory
    public function memory(){
        return $this->belongsTo(Memory::class);
    }

    // Item belongs to a particular memory
    public function condition(){
        return $this->belongsTo(Condition::class);
    }

    public function models(){
        return $this->hasMany(ProductModel::class);
    }

    /**
    ** Service is doubtful
    **/
    public function services(){
        return $this->belongsToMany(Service::class)->withTimestamps();
    }

    public function categories(){
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function memories(){
        return $this->belongsToMany(Memory::class)->withTimestamps();
    }

    public function conditions(){
        return $this->belongsToMany(Condition::class)->withTimestamps();
    }

    public function networks(){
        return $this->belongsToMany(Network::class)->withTimestamps();
    }

    public function price(){
        return $this->hasOne(Price::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class)->withTimestamps();
    }

    public function repairs(){
        return $this->belongsToMany(Repair::class)->withTimestamps();
    }


    // Let's make it with variants $item->models->map->category
    public function prices(){
        return $this->hasMany(Price::class);
    }

}
