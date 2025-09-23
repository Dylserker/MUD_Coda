<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class SauverFunction extends AbstractConsoleFunction {
    public function action(array $args) : void { $this->getContainer()->dispatcher()->dispatch('staurie.save'); }
    public function name() : string { return 'sauver'; }
    public function description() : string { return 'Sauvegarder la partie'; }
    public function getArgs() : int|array { return 0; }
}
