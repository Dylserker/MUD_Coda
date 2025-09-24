<?php

namespace App\Staurie\Component\Map\CoreFunctions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class CompassFunction extends AbstractConsoleFunction {

    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('map.compass');
    }

    public function name() : string {
        return 'compass';
    }

    public function description() : string {
        return 'Show possible directions';
    }

    public function getArgs() : int|array {
        return 0;
    }
}