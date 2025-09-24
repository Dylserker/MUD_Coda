<?php

namespace App\Staurie\Game;

use App\Staurie\Interface\Configurable;
use App\Staurie\Interface\Describable;
use App\Staurie\Interface\Initializable;
use App\Staurie\Interface\Nameable;

abstract class Item implements Nameable, Describable, Initializable {

    public function initialize(): void
    {
        
    }

    abstract public function statistics() : array;
}