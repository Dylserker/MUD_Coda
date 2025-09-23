<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class CarteFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('map.map'); }
    public function name() : string { return 'carte'; }
    public function description() : string { return 'Afficher la carte globale'; }
    public function getArgs() : int|array { return 0; }
}
