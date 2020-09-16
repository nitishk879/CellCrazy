<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use SoftDeletes;
    protected $fillable = ['regular', 'sales', 'discount', 'item_id', 'category_id', 'memory_id', 'condition_id', 'network_id', 'user_id'];

    public function model(){
        $this->belongsTo(ProductModel::class, 'model_id', 'id');
    }
}
