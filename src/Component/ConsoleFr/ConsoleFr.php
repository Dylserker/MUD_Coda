<?php

namespace App\Component\ConsoleFr;

use App\Staurie\Component\AbstractComponent;
use App\Staurie\Component\Console\Console;
use App\Component\ConsoleFr\CoreFunctions\AliasFunction;

class ConsoleFr extends AbstractComponent {

    public function name() : string { return 'consolefr'; }
    public function getEventName() : array { return []; }
    public function require() : array { return [Console::class]; }
    public function initialize() : void {
        $console = $this->container->getConsole();
        // alias générique: alias <fr> <commande_en> [args]
        $console->addFunction(new AliasFunction());
    }
    protected function action(string $event, array $arguments) : void {}
    public function defaultConfiguration() : array { return []; }
}
