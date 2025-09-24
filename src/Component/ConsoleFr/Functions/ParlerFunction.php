<?php

namespace App\Component\ConsoleFr\Functions;

use App\Staurie\Component\Console\AbstractConsoleFunction;

class ParlerFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('character.speak', ['to'=>$args[0] ?? '']); }
    public function name() : string { return 'parler'; }
    public function description() : string { return 'Parler à un PNJ (ex: parler Tripin)'; }
    public function getArgs() : int|array { return 1; }
}
