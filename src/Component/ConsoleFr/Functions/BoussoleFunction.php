<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class BoussoleFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('map.compass'); }
    public function name() : string { return 'boussole'; }
    public function description() : string { return 'Afficher les directions possibles'; }
    public function getArgs() : int|array { return 0; }
}
