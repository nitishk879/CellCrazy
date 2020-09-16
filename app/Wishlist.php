<?php

namespace App;

class Wishlist
{
    public $items = null;
    public $quantity = 0;
    public $totalPrice = 0;
    public $service=0;

    public function __construct($oldCart){
        if ($oldCart){
            $this->items        = $oldCart->items;
            $this->quantity     = $oldCart->quantity;
            $this->totalPrice   = $oldCart->totalPrice;
        }
    }

    public function add($item, $id){
        $exWishList = array('quantity' => 0, 'price' => $item['price'], 'item' => $item);

        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $exWishList = $this->items[$id];
            }
        }

        $exWishList['quantity']++;
        $exWishList['price']  = $item['price'] * $exWishList['quantity'];
        $this->items[$id]       = $exWishList;
        $this->quantity         ++;
        $this->totalPrice       += $item['price'];
    }

    public function removeItem($id){
        $this->quantity     -= $this->items[$id]['quantity'];
        $this->totalPrice   -=$this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
