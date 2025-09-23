<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class InventaireFunctionFr extends AbstractConsoleFunction {
    public function action(array $args) : void {
        $sub = $args[0] ?? 'voir';
        if($sub === 'voir') $this->getContainer()->dispatcher()->dispatch('inventory.view');
        if($sub === 'taille') $this->getContainer()->dispatcher()->dispatch('inventory.size');
    }
    public function name() : string { return 'inventaire'; }
    public function description() : string { return 'Inventaire (voir/taille)'; }
    public function getArgs() : int|array { return ['voir','taille']; }
}
