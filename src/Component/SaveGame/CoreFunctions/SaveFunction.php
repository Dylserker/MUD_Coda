<?php

namespace App\Component\SaveGame\CoreFunctions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class SaveFunction extends AbstractConsoleFunction {

    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('savegame.save');
    }

    public function name() : string { return 'save'; }

    public function description() : string { return 'Sauvegarder la partie'; }

    public function getArgs() : int|array { return 0; }
}
