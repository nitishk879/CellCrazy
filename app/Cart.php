<?php

namespace App;

class Cart
{
    public $items = null;
    public $models = null;
    public $quantity = 0;
    public $totalPrice = 0;
    public $color=0;
    public $model=0;

    public function __construct($oldCart){
        if ($oldCart){
            $this->items        = $oldCart->items;
            $this->models       = $oldCart->models;
            $this->quantity     = $oldCart->quantity;
            $this->totalPrice   = $oldCart->totalPrice;
            $this->color        = $oldCart->color;
            $this->model        = $oldCart->model;
        }
    }

    public function add($item, $id, $model){
        $exGirlFriend = array('quantity' => 0, 'price' => $item['price'], 'item' => $item, 'models' => $item['model']);

        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $exGirlFriend = $this->items[$id];
                if(array_key_exists($model, $this->models)){
                    $exGirlFriend = $this->models[$id];
                }
            }
        }

        $exGirlFriend['quantity']++;
        $exGirlFriend['price']  = $item['price'] * $exGirlFriend['quantity'];
        $this->items[$id]       = $exGirlFriend;
        $this->items[$id]['models'] = $exGirlFriend['models'];
        $this->quantity         ++;
        $this->totalPrice       += $item['price'];
    }

    public function removeItem($id){
        $this->quantity     -= $this->items[$id]['quantity'];
        $this->totalPrice   -=$this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
