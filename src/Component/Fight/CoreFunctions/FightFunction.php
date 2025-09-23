<?php

namespace App\Component\Fight\CoreFunctions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class FightFunction extends AbstractConsoleFunction {
    public function action(array $args) : void {
        $this->getContainer()->dispatcher()->dispatch('fight.start', ['monster'=>$args[0] ?? '']);
    }
    public function name() : string { return 'fight'; }
    public function description() : string { return 'Fight a monster on the current map'; }
    public function getArgs() : int|array { return 1; }
}
