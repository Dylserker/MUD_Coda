<?php

namespace App\Staurie\Component\Map\CoreFunctions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class ViewFunction extends AbstractConsoleFunction {

    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('map.view');
    }

    public function name() : string {
        return 'view';
    }

    public function description() : string {
        return 'View of the map';
    }

    public function getArgs() : int|array {
        return 0;
    }
}