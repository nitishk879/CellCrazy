<?php
namespace App;

class Compare{

    public $items = null;
    public $service = null;
    public $total = null;

    public function __construct($existing)
    {
        if($existing){
            $this->items = $existing->items;
            $this->total = $existing->total;
        }
    }

    public function add($item, $id){
        $existing = array(
            'total' =>0,
            'item' => $item,
            'service' => $item->service_id
        );
        if ($this->items){
            if (array_key_exists($id, $this->items)){
                $existing = $this->items[$id];
            }
        }

        $this->items[$id]   = $existing;
        $this->total ++;
    }

    public function remove($id){
        unset($this->items[$id]);
    }
}
