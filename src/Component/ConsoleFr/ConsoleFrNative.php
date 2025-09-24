<?php

namespace App\Component\ConsoleFr;

use App\Staurie\Component\AbstractComponent;
use App\Staurie\Component\Console\Console;
use App\Component\ConsoleFr\Functions\VoirFunction;
use App\Component\ConsoleFr\Functions\BoussoleFunction;
use App\Component\ConsoleFr\Functions\CarteFunction;
use App\Component\ConsoleFr\Functions\AllerFunction;
use App\Component\ConsoleFr\Functions\ParlerFunction;
use App\Component\ConsoleFr\Functions\MoiFunction;
use App\Component\ConsoleFr\Functions\InventaireFunctionFr;
use App\Component\ConsoleFr\Functions\PrendreFunction;
use App\Component\ConsoleFr\Functions\PoserFunction;
use App\Component\ConsoleFr\Functions\ArgentFunction;
use App\Component\ConsoleFr\Functions\SauverFunction;
use App\Component\ConsoleFr\Functions\ChargerFunction;
use App\Component\ConsoleFr\Functions\AideFunction;
use App\Component\ConsoleFr\Functions\QuitterFunction;

class ConsoleFrNative extends AbstractComponent {

    public function name() : string { return 'consolefr_native'; }
    public function getEventName() : array { return []; }
    public function require() : array { return [Console::class]; }

    public function initialize() : void {
        $console = $this->container->getConsole();
        $console->addFunction(new VoirFunction());
        $console->addFunction(new BoussoleFunction());
        $console->addFunction(new CarteFunction());
        $console->addFunction(new AllerFunction());
        $console->addFunction(new ParlerFunction());
        $console->addFunction(new MoiFunction());
        $console->addFunction(new InventaireFunctionFr());
        $console->addFunction(new PrendreFunction());
        $console->addFunction(new PoserFunction());
        $console->addFunction(new ArgentFunction());
        $console->addFunction(new SauverFunction());
        $console->addFunction(new ChargerFunction());
        $console->addFunction(new AideFunction());
        $console->addFunction(new QuitterFunction());
    }

    protected function action(string $event, array $arguments) : void {}
    public function defaultConfiguration() : array { return []; }
}
