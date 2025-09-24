<?php

namespace App\Staurie\Component\Race;

use App\Staurie\Interface\Describable;
use App\Staurie\Interface\Nameable;

abstract class AbstractRace implements Nameable, Describable{
    abstract public function statistics() : array;
}