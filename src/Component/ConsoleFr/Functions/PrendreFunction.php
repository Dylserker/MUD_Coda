<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class PrendreFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('inventory.take', ['item_name'=>$args[0] ?? '']); }
    public function name() : string { return 'prendre'; }
    public function description() : string { return 'Prendre un objet'; }
    public function getArgs() : int|array { return 1; }
}
