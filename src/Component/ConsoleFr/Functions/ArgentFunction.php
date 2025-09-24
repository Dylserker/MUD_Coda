<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class ArgentFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('money.show'); }
    public function name() : string { return 'argent'; }
    public function description() : string { return 'Afficher vos kamas'; }
    public function getArgs() : int|array { return 0; }
}
