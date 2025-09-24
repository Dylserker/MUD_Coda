<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class QuitterFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->state()->stop(); }
    public function name() : string { return 'quitter'; }
    public function description() : string { return 'Quitter le jeu'; }
    public function getArgs() : int|array { return 0; }
}
