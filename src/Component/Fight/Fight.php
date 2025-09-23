<?php

namespace App\Component\Fight;

use Jugid\Staurie\Component\AbstractComponent;
use Jugid\Staurie\Component\Console\Console;
use Jugid\Staurie\Component\Map\Map;
use Jugid\Staurie\Component\PrettyPrinter\PrettyPrinter;
use Jugid\Staurie\Component\Level\Level;
use Jugid\Staurie\Component\Character\MainCharacter;
use App\Component\Fight\CoreFunctions\FightFunction;
use Jugid\Staurie\Game\Monster as GameMonster;

class Fight extends AbstractComponent {

    public function name() : string { return 'fight'; }
    public function getEventName() : array { return ['fight.start']; }
    public function require() : array { return [Console::class, PrettyPrinter::class, Map::class, Level::class, MainCharacter::class]; }

    public function initialize() : void {
        $this->container->getConsole()->addFunction(new FightFunction());
    }

    public function defaultConfiguration() : array { return []; }

    protected function action(string $event, array $arguments) : void {
        switch($event) {
            case 'fight.start':
                $this->startFight($arguments['monster'] ?? '');
                break;
        }
    }

    private function startFight(string $monsterName) : void {
        $pp = $this->container->getPrettyPrinter();
        $map = $this->container->getMap();
        $character = $this->container->getCharacter();
        $level = $this->container->getComponent('level');

        $bp = $map->getCurrentBlueprint();
        $monsters = $bp->getMonsters() ?? [];
        if(!isset($monsters[$monsterName])) {
            $pp->writeLn("Monster '$monsterName' not found here", 'red');
            return;
        }
        /** @var GameMonster $monster */
        $monster = $monsters[$monsterName];

        $playerHp = max(10, 20 + ($character->statistics->value('defense') ?? 0));
        $monsterHp = $monster->health_points();

        $pp->writeUnder("Fight vs {$monster->name()} (Lv {$monster->level()})", 'green');

        $round = 1;
        while($playerHp > 0 && $monsterHp > 0) {
            $pp->writeUnder("Round $round", 'yellow');
            // Player attacks
            $playerAttack = max(1, 3 + $character->statistics->value('ability'));
            $damageToMonster = max(1, $playerAttack - $monster->defense());
            $monsterHp -= $damageToMonster;
            $pp->writeLn("You hit {$monster->name()} for $damageToMonster (HP: ".max(0,$monsterHp).")");
            if($monsterHp <= 0) { break; }

            // Monster attacks
            $skills = $monster->skills();
            $skillName = array_rand($skills);
            $skillDmg = (int)$skills[$skillName];
            $playerDefense = $character->statistics->value('defense');
            $damageToPlayer = max(1, $skillDmg - $playerDefense);
            $playerHp -= $damageToPlayer;
            $pp->writeLn("{$monster->name()} uses $skillName for $damageToPlayer (Your HP: ".max(0,$playerHp).")");

            $round++;
        }

        if($playerHp <= 0 && $monsterHp <= 0) {
            $pp->writeLn('It\'s a draw... both fell.', 'yellow');
            return;
        }

        if($playerHp <= 0) {
            $pp->writeLn('You were defeated...', 'red');
            return;
        }

        // Player wins
        $pp->writeLn("{$monster->name()} defeated!", 'green');
        // Remove monster from blueprint
        unset($bp->monsters[$monster->name()]);
        // Gain experience
        $xp = $monster->experience();
        $level->experience += $xp;
        $pp->writeLn("You gained $xp XP");
        $level->verifiy();
    }
}
