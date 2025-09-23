<?php

namespace App\Component\ConsoleFr\Functions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class AllerFunction extends AbstractConsoleFunction {
    private array $dirs = ['nord'=>'north','sud'=>'south','ouest'=>'west','est'=>'east'];
    public function action(array $args) : void {
        $fr = $args[0] ?? 'nord';
        $en = $this->dirs[$fr] ?? 'north';
        $this->getContainer()->dispatcher()->dispatch('map.move', ['direction'=>$en]);
    }
    public function name() : string { return 'aller'; }
    public function description() : string { return 'Aller dans une direction (nord/sud/est/ouest)'; }
    public function getArgs() : int|array { return ['nord','sud','ouest','est']; }
}
