<?php

namespace App\Staurie\Game;

abstract class Item_Equippable extends Item {

    abstract public function body_part() : string;
    
}