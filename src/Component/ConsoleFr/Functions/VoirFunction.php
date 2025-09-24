<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class VoirFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('map.view'); }
    public function name() : string { return 'voir'; }
    public function description() : string { return 'Voir la carte'; }
    public function getArgs() : int|array { return 0; }
}
