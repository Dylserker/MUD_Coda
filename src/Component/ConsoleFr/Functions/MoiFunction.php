<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class MoiFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('character.me', []); }
    public function name() : string { return 'moi'; }
    public function description() : string { return 'Afficher les informations du personnage'; }
    public function getArgs() : int|array { return 0; }
}
