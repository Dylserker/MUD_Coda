<?php

namespace App\Staurie\Component\Map\CoreFunctions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class MapFunction extends AbstractConsoleFunction {

    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('map.map');
    }

    public function name() : string {
        return 'map';
    }

    public function description() : string {
        return 'Global map';
    }

    public function getArgs() : int|array {
        return 0;
    }
}