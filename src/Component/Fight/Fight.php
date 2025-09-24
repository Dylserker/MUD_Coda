<?php

namespace App\Component\Fight;

use App\Staurie\Component\AbstractComponent;
use App\Staurie\Component\Console\Console;
use App\Staurie\Component\Map\Map;
use App\Staurie\Component\PrettyPrinter\PrettyPrinter;
use App\Staurie\Component\Level\Level;
use App\Staurie\Component\Character\MainCharacter;
use App\Component\Fight\CoreFunctions\FightFunction;
use App\Staurie\Game\Monster as GameMonster;

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
        $defenseBoost = 0;
        $esquiveActive = false;
        while($playerHp > 0 && $monsterHp > 0) {
            $pp->writeUnder("Round $round", 'yellow');
            // Choix du joueur
            $pp->writeLn("Que veux-tu faire ?", 'cyan');
            $pp->writeLn("1. Attaquer\n2. Défendre\n3. Esquiver\n4. Fuir", 'white');
            $choice = trim(fgets(STDIN));
            switch($choice) {
                case '1': // Attaquer
                    $playerAttack = max(1, 3 + $character->statistics->value('ability'));
                    $damageToMonster = max(1, $playerAttack - $monster->defense());
                    $monsterHp -= $damageToMonster;
                    $pp->writeLn("Tu frappes {$monster->name()} pour $damageToMonster (HP: ".max(0,$monsterHp).")", 'green');
                    break;
                case '2': // Défendre
                    $defenseBoost = 3;
                    $pp->writeLn("Tu te mets en position défensive (+3 DEF ce tour)", 'yellow');
                    break;
                case '3': // Esquiver
                    $esquiveActive = true;
                    $pp->writeLn("Tu tentes d'esquiver la prochaine attaque !", 'yellow');
                    break;
                case '4': // Fuir
                    $chance = $character->statistics->value('chance');
                    if(rand(0,100) < $chance) {
                        $pp->writeLn("Tu as réussi à fuir !", 'green');
                        return;
                    } else {
                        $pp->writeLn("Fuite ratée !", 'red');
                    }
                    break;
                default:
                    $pp->writeLn("Action invalide, tu perds ton tour !", 'red');
                    break;
            }
            if($monsterHp <= 0) { break; }

            // Tour du monstre (IA simple)
            $monsterActions = ['attack', 'defend', 'esquive'];
            $monsterChoice = $monsterActions[array_rand($monsterActions)];
            $monsterDefBoost = 0;
            $monsterEsquive = false;
            switch($monsterChoice) {
                case 'attack':
                    $skills = $monster->skills();
                    $skillName = array_rand($skills);
                    $skillDmg = (int)$skills[$skillName];
                    $totalDefense = $character->statistics->value('defense') + $defenseBoost;
                    if($esquiveActive) {
                        $chance = $character->statistics->value('chance');
                        if(rand(0,100) < $chance) {
                            $pp->writeLn("Tu esquives l'attaque du monstre !", 'green');
                            $damageToPlayer = 0;
                        } else {
                            $damageToPlayer = max(1, $skillDmg - $totalDefense);
                            $pp->writeLn("Esquive ratée !", 'red');
                        }
                    } else {
                        $damageToPlayer = max(1, $skillDmg - $totalDefense);
                    }
                    $playerHp -= $damageToPlayer;
                    $pp->writeLn("{$monster->name()} utilise $skillName et inflige $damageToPlayer (HP: ".max(0,$playerHp).")", 'red');
                    break;
                case 'defend':
                    $monsterDefBoost = 3;
                    $pp->writeLn("{$monster->name()} se met en position défensive (+3 DEF ce tour)", 'yellow');
                    break;
                case 'esquive':
                    $monsterEsquive = true;
                    $pp->writeLn("{$monster->name()} tente d'esquiver la prochaine attaque !", 'yellow');
                    break;
            }
            // Application de l'esquive du monstre au prochain tour
            if($monsterEsquive && $choice === '1') {
                $chance = $monster->chance();
                if(rand(0,100) < $chance) {
                    $pp->writeLn("{$monster->name()} esquive ton attaque !", 'yellow');
                    // Annule les dégâts du joueur ce tour
                    $monsterHp += $damageToMonster;
                }
            }
            // Application de la défense du monstre
            if($monsterDefBoost > 0 && $choice === '1') {
                $monsterHp += 3; // Simule la réduction de dégâts
            }
            // Reset boosts/esquive
            $defenseBoost = 0;
            $esquiveActive = false;
            $round++;
        }

        // Bloc de victoire et sauvegarde en dehors de la boucle
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
        // Gain experience avec LevelSystem
        $xp = $monster->experience();
        if (!isset($character->levelSystem)) {
            $character->levelSystem = new \MUD_Coda\Component\LevelSystem();
        }
        $character->levelSystem->addXp($xp);
        $pp->writeLn("You gained $xp XP");
        // Sauvegarde automatique après gain d'XP et de niveau
        $saveGame = $this->container->getComponent('savegame');
        if ($saveGame) {
            $saveGame->performSave();
        }

            // Tour du monstre (IA simple)
            $monsterActions = ['attack', 'defend', 'esquive'];
            $monsterChoice = $monsterActions[array_rand($monsterActions)];
            $monsterDefBoost = 0;
            $monsterEsquive = false;
            switch($monsterChoice) {
                case 'attack':
                    $skills = $monster->skills();
                    $skillName = array_rand($skills);
                    $skillDmg = (int)$skills[$skillName];
                    $totalDefense = $character->statistics->value('defense') + $defenseBoost;
                    if($esquiveActive) {
                        $chance = $character->statistics->value('chance');
                        if(rand(0,100) < $chance) {
                            $pp->writeLn("Tu esquives l'attaque du monstre !", 'green');
                            $damageToPlayer = 0;
                        } else {
                            $damageToPlayer = max(1, $skillDmg - $totalDefense);
                            $pp->writeLn("Esquive ratée !", 'red');
                        }
                    } else {
                        $damageToPlayer = max(1, $skillDmg - $totalDefense);
                    }
                    $playerHp -= $damageToPlayer;
                    $pp->writeLn("{$monster->name()} utilise $skillName et inflige $damageToPlayer (HP: ".max(0,$playerHp).")", 'red');
                    break;
                case 'defend':
                    $monsterDefBoost = 3;
                    $pp->writeLn("{$monster->name()} se met en position défensive (+3 DEF ce tour)", 'yellow');
                    break;
                case 'esquive':
                    $monsterEsquive = true;
                    $pp->writeLn("{$monster->name()} tente d'esquiver la prochaine attaque !", 'yellow');
                    break;
            }
            // Application de l'esquive du monstre au prochain tour
            if($monsterEsquive && $choice === '1') {
                $chance = $monster->chance();
                if(rand(0,100) < $chance) {
                    $pp->writeLn("{$monster->name()} esquive ton attaque !", 'yellow');
                    // Annule les dégâts du joueur ce tour
                    $monsterHp += $damageToMonster;
                }
            }
            // Application de la défense du monstre
            if($monsterDefBoost > 0 && $choice === '1') {
                $monsterHp += 3; // Simule la réduction de dégâts
            }
            // Reset boosts/esquive
            $defenseBoost = 0;
            $esquiveActive = false;
            $round++;
        }

        // Fin de la méthode startFight
    }
