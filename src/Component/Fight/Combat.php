<?php

namespace MUD_Coda\Component\Fight;

use App\Staurie\Component\Character\MainCharacter;
use App\Staurie\Component\Character\Statistics;

class Combat
{
    private MainCharacter $player;
    private MainCharacter $monster;
    private bool $isPlayerTurn = true;
    private bool $combatEnded = false;

    public function __construct(MainCharacter $player, MainCharacter $monster)
    {
        $this->player = $player;
        $this->monster = $monster;
    }

    public function start()
    {
        while (!$this->combatEnded) {
            if ($this->isPlayerTurn) {
                echo "\nVotre tour ! Que voulez-vous faire ?\n";
                echo "1. Attaquer\n2. Défendre\n3. Esquiver\n4. Fuir\nChoix : ";
                $handle = fopen("php://stdin", "r");
                $input = trim(fgets($handle));
                fclose($handle);
                switch ($input) {
                    case '1':
                        $this->playerAction('attack');
                        break;
                    case '2':
                        $this->playerAction('defend');
                        break;
                    case '3':
                        $this->playerAction('esquive');
                        break;
                    case '4':
                        $this->playerAction('fuir');
                        break;
                    default:
                        echo "Choix invalide, tour perdu !\n";
                        break;
                }
            } else {
                $this->monsterAction();
            }
            $this->isPlayerTurn = !$this->isPlayerTurn;
        }
    }

    public function playerAction(string $action)
    {
        switch ($action) {
            case 'attack':
                $this->attack($this->player, $this->monster);
                break;
            case 'defend':
                $this->defend($this->player);
                break;
            case 'esquive':
                $this->esquive($this->player);
                break;
            case 'fuir':
                $this->fuir($this->player);
                break;
        }
        $this->checkEnd();
    }

    private function monsterAction()
    {
        // IA simple : attaque ou défend aléatoirement
        $actions = ['attack', 'defend', 'esquive'];
        $action = $actions[array_rand($actions)];
        switch ($action) {
            case 'attack':
                $this->attack($this->monster, $this->player);
                break;
            case 'defend':
                $this->defend($this->monster);
                break;
            case 'esquive':
                $this->esquive($this->monster);
                break;
        }
        $this->checkEnd();
    }

    private function attack(MainCharacter $attacker, MainCharacter $defender)
    {
        $damage = $attacker->statistics->value('ability') - $defender->statistics->value('defense');
        if ($damage < 0) $damage = 0;
        $defender->statistics->sub('pv', $damage);
    }

    private function defend(MainCharacter $character)
    {
        $character->statistics->add('defense', 2);
    }

    private function esquive(MainCharacter $character)
    {

        $chance = $character->statistics->value('chance');
        if (rand(0, 100) < $chance) {
            // Esquive réussie
        } else {
            // Esquive ratée
        }
    }

    private function fuir(MainCharacter $character)
    {
        // Jet de chance pour fuir
        $chance = $character->statistics->value('chance');
        if (rand(0, 100) < $chance) {
            $this->combatEnded = true;
            // Fuite réussie
        } else {
            // Fuite ratée
        }
    }

    private function checkEnd()
    {
        if ($this->player->statistics->value('pv') <= 0 || $this->monster->statistics->value('pv') <= 0) {
            $this->combatEnded = true;
        }
    }
}
