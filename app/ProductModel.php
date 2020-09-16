<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'item_models';
    protected $primaryKey = 'model_id';
    use SoftDeletes;

    protected $fillable = ['item_id', 'category_id', 'condition_id', 'memory_id', 'network_id', 'user_id',];

    public function items(){
        return $this->belongsToMany(Item::class)->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class);
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

    // Fetch price only
    public function price(){
        return $this->hasOne(Price::class, 'model_id', 'id');
    }
    public function memory(){
        return $this->belongsTo(Memory::class);
    }
    public function condition(){
        return $this->belongsTo(Condition::class);
    }
    public function network(){
        return $this->belongsTo(Network::class);
    }
}
