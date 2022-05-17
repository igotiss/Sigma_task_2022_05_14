<?php

function strahovka ($items, $str){
    return array_sum($items)-$str;
}

class Things {
    private $items = [];
    public function __construct($items)
    {
        $this->items = $items;
    }
    public function getItems() {
        return $this->items;
    }

}

$items = new Things([
    'skate' => 200,
    "painting" => 100,
    ]);

var_dump (strahovka($items->getItems(),  100));