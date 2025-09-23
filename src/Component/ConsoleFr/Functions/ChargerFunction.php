<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class ChargerFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('staurie.load'); }
    public function name() : string { return 'charger'; }
    public function description() : string { return 'Charger la partie'; }
    public function getArgs() : int|array { return 0; }
}
