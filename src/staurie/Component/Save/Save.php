<?php

namespace App\Staurie\Component\Save;

use App\Staurie\Component\AbstractComponent;
use App\Staurie\Component\Console\Console;
use App\Staurie\Component\PrettyPrinter\PrettyPrinter;
use App\Staurie\Component\Save\CoreFunctions\SaveFunction;

class Save extends AbstractComponent {

    final public function name() : string {
        return 'save';
    }

    final public function getEventName() : array {
        return [];
    }

    final public function require() : array {
        return [Console::class, PrettyPrinter::class];
    }
    
    final public function initialize() : void {
        $console = $this->container->getConsole();
        $console->addFunction(new SaveFunction());
    }

    final public function defaultConfiguration() : array {
        return [
            'directory'=>__DIR__.'/../../../../saves/'
        ];
    }

    final protected function action(string $event, array $arguments) : void {
        
    }
}