<?php

namespace App\Staurie\Interface;

use App\Staurie\Container;

/**
 * Used when the element should be stored in the Container
 */
interface Containerable extends Nameable {
    public function setContainer(Container $container) : void;
    public function name() : string;
}