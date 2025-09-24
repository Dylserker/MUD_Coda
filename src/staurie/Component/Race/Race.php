<?php

namespace App\Staurie\Component\Race;

use App\Staurie\Component\AbstractComponent;
use App\Staurie\Component\PrettyPrinter\PrettyPrinter;
use LogicException;

class Race extends AbstractComponent {

    private $chosen_race = null;

    final public function name() : string {
        return 'race';
    }

    final public function getEventName() : array {
        return ['race.view', 'race.ask'];
    }

    final public function require() : array {
        return [PrettyPrinter::class];
    }
    
    final public function initialize() : void {
        if(empty($this->config['races'])) {
            throw new LogicException('You should add races if this component is register.');
        }

        foreach($this->config['races'] as $race) {
            if(!is_subclass_of($race, AbstractRace::class)) {
                throw new LogicException('The class ' . $race . ' should be a subclass of AbstractRace');
            }
        }
    }

    final protected function action(string $event, array $arguments) : void {
        $this->eventToAction($event);
    }

    protected function view() {
        $pp = $this->container->getPrettyPrinter();
        if ($this->chosen_race !== null) {
            $pp->writeLn('Race : ' . $this->chosen_race->description());
        } else {
            $pp->writeLn('Aucune race sélectionnée.', 'yellow');
        }
    }

    protected function ask() {
        $pp = $this->container->getPrettyPrinter();
        $print_race = [];
        foreach($this->config['races'] as $index => $raceClass) {
            $raceTmp = new $raceClass();
            $print_race[] = [$index, $raceTmp->name(), $raceTmp->description()];
        }

        $pp->writeTable(
            ['Index', 'Name', 'Description'],
            $print_race
        );

        while($this->chosen_race === null) {
            $choice = readline('Choose your race index >> ');
            if(isset($this->config['races'][$choice])) {
                $class_race = $this->config['races'][$choice];
                $this->chosen_race = new $class_race();
                $pp->writeLn('Race ' . $this->chosen_race->name() . ' chosen', 'green');
            } else {
                $pp->writeLn('Not a valid race index', 'red');
            }
        }

        // Apply race statistics to character
        $character = $this->container->getCharacter();
        if($character !== null) {
            foreach($this->chosen_race->statistics() as $stat=>$value) {
                $character->statistics->add($stat, (int)$value);
            }
        }
    }

    public function getChosenRaceName() : ?string {
        return $this->chosen_race?->name();
    }

    public function isChosenRace(string $name) : bool {
        return strtolower($this->getChosenRaceName() ?? '') === strtolower($name);
    }

    final public function defaultConfiguration() : array {
        return [
            'races'=>[]
        ];
    }
}