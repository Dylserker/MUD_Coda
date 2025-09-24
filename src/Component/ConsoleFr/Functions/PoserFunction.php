<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class PoserFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('inventory.drop', ['item_name'=>$args[0] ?? '']); }
    public function name() : string { return 'poser'; }
    public function description() : string { return 'Poser un objet'; }
    public function getArgs() : int|array { return 1; }
}
