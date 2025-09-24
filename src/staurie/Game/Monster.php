<?php

namespace App\Staurie\Game;

use App\Staurie\Container;
use App\Staurie\Interface\Containerable;
use App\Staurie\Interface\Describable;
use App\Staurie\Interface\Fightable;
use App\Staurie\Interface\Nameable;

abstract class Monster implements Containerable, Describable {

    protected Container $container;

    final public function setContainer(Container $container) : void {
        $this->container = $container;
    }

    abstract function level() : int;
    abstract function health_points() : int;
    abstract function defense() : int;
    abstract function experience() : int;
    abstract function skills() : array;
}