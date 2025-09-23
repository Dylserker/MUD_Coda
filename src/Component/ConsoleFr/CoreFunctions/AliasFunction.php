<?php

namespace App\Component\ConsoleFr\CoreFunctions;

use Jugid\Staurie\Component\Console\AbstractConsoleFunction;

class AliasFunction extends AbstractConsoleFunction {

    private array $aliases = [
        // carte
        'carte' => 'map',
        'boussole' => 'compass',
        'voir' => 'view',
        'aller' => 'move',
        'nord' => 'north',
        'sud' => 'south',
        'ouest' => 'west',
        'est' => 'east',
        // personnage
        'moi' => 'me',
        'parler' => 'speak',
        // inventaire
        'inventaire' => 'inventory',
        'taille' => 'size',
        'prendre' => 'take',
        'poser' => 'drop',
        // argent
        'argent' => 'money',
        // sauvegarde
        'sauver' => 'save',
        'charger' => 'load',
        // sortie/aide
        'aide' => 'help',
        'quitter' => 'exit',
    ];

    public function action(array $args) : void {
        // Utilisation: alias <commande_fr> [args...]
        if(!isset($args[0])) { echo "Utilisation: alias <commande_fr> [args]\n"; return; }
        $fr = $args[0];
        $rest = array_slice($args, 1);

        if(!isset($this->aliases[$fr])) {
            echo "Alias inconnu: $fr\n";
            return;
        }

        $en = $this->aliases[$fr];
        // Remap directions FR -> EN si besoin
        $mappedArgs = array_map(function($arg){
            return $this->aliases[$arg] ?? $arg;
        }, $rest);

        // Recomposer et redispatcher comme si l’utilisateur avait tapé la commande EN
        $cmd = $en . (empty($mappedArgs) ? '' : ' ' . implode(' ', $mappedArgs));
        // Petite astuce: on pousse dans readline en simulant l’entrée
        $this->getContainer()->dispatcher()->dispatch('console.debug', ['cmd'=>$cmd]);
        // Fallback: si pas de debug, on appelle directement la fonction si elle existe
        $console = $this->getContainer()->getConsole();
        $functions = $console->getFunctionsDefinition(); // [name, desc, args]
        $nameOnly = array_map(fn($f) => $f[0], $functions);
        $index = array_search($en, $nameOnly, true);
        if($index === false) {
            echo "Commande introuvable: $en\n"; return;
        }
        // Exécute réellement
        switch($en) {
            case 'move': $this->getContainer()->dispatcher()->dispatch('map.move', ['direction'=>$mappedArgs[0] ?? 'north']); break;
            case 'view': $this->getContainer()->dispatcher()->dispatch('map.view'); break;
            case 'compass': $this->getContainer()->dispatcher()->dispatch('map.compass'); break;
            case 'map': $this->getContainer()->dispatcher()->dispatch('map.map'); break;
            case 'me': $this->getContainer()->dispatcher()->dispatch('character.me', []); break;
            case 'speak': $this->getContainer()->dispatcher()->dispatch('character.speak', ['to'=>$mappedArgs[0] ?? '']); break;
            case 'inventory':
                $sub = $mappedArgs[0] ?? 'view';
                if($sub === 'view') $this->getContainer()->dispatcher()->dispatch('inventory.view');
                if($sub === 'size') $this->getContainer()->dispatcher()->dispatch('inventory.size');
                break;
            case 'take': $this->getContainer()->dispatcher()->dispatch('inventory.take', ['item_name'=>$mappedArgs[0] ?? '']); break;
            case 'drop': $this->getContainer()->dispatcher()->dispatch('inventory.drop', ['item_name'=>$mappedArgs[0] ?? '']); break;
            case 'money': $this->getContainer()->dispatcher()->dispatch('money.show'); break;
            case 'save': $this->getContainer()->dispatcher()->dispatch('staurie.save'); break;
            case 'load': $this->getContainer()->dispatcher()->dispatch('staurie.load'); break;
            case 'help': echo "Utilisez 'help' pour l'aide détaillée.\n"; break;
            case 'exit': $this->getContainer()->state()->stop(); break;
        }
    }

    public function name() : string { return 'alias'; }

    public function description() : string { return 'Alias français vers les commandes du jeu'; }

    public function getArgs() : int|array { return 1; }
}
