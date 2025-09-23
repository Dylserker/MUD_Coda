<?php

namespace App\Component\SaveGame\CoreFunctions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class LoadFunction extends AbstractConsoleFunction {

    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('savegame.load');
    }

    public function name() : string { return 'load'; }

    public function description() : string { return 'Charger la partie'; }

    public function getArgs() : int|array { return 0; }
}
