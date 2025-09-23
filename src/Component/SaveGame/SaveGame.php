<?php

namespace App\Component\SaveGame;

use Jugid\Staurie\Component\AbstractComponent;
use Jugid\Staurie\Component\Console\Console;
use Jugid\Staurie\Component\PrettyPrinter\PrettyPrinter;
use App\Component\SaveGame\CoreFunctions\SaveFunction;
use App\Component\SaveGame\CoreFunctions\LoadFunction;

class SaveGame extends AbstractComponent {

    public function name() : string {
        return 'savegame';
    }

    public function getEventName() : array {
        return ['savegame.save', 'savegame.load'];
    }

    public function require() : array {
        return [Console::class, PrettyPrinter::class];
    }
    
    public function initialize() : void {
        $console = $this->container->getConsole();
        $console->addFunction(new SaveFunction());
        $console->addFunction(new LoadFunction());
    }

    public function defaultConfiguration() : array {
        return [
            'directory' => __DIR__ . '/../../../saves',
            'slot' => 'slot1.json'
        ];
    }

    protected function action(string $event, array $arguments) : void {
        switch($event) {
            case 'savegame.save':
                $this->performSave();
                break;
            case 'savegame.load':
                $this->performLoad();
                break;
        }
    }

    private function performSave() : void {
        $dir = rtrim($this->config['directory'], '/');
        if(!is_dir($dir)) { @mkdir($dir, 0777, true); }
        $file = $dir . '/' . $this->config['slot'];

        $map = $this->container->getMap();
        $character = $this->container->getCharacter();
        $inventory = $this->container->getInventory();

        $data = [
            'game' => $this->container->state()->getGameName(),
            'map' => [
                'x' => $map?->current_position->x ?? 0,
                'y' => $map?->current_position->y ?? 0,
            ],
            'character' => [
                'name' => $character?->name ?? 'Unknown',
                'gender' => $character?->gender ?? 'Unknown',
                'statistics' => $character?->statistics?->asArray() ?? [],
                'equipment' => array_map(function($item){ return $item?->name(); }, $character?->equipment ?? [])
            ],
            'inventory' => array_map(function($item){ return $item->name(); }, $inventory?->inventory ?? []),
            'saved_at' => date('c')
        ];

        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        $this->container->getPrettyPrinter()?->writeLn('Sauvegarde effectuée.', 'green');
    }

    private function performLoad() : void {
        $dir = rtrim($this->config['directory'], '/');
        $file = $dir . '/' . $this->config['slot'];
        if(!is_file($file)) {
            $this->container->getPrettyPrinter()?->writeLn('Aucune sauvegarde trouvée.', 'red');
            return;
        }

        $json = json_decode(file_get_contents($file), true);
        if(!is_array($json)) {
            $this->container->getPrettyPrinter()?->writeLn('Sauvegarde corrompue.', 'red');
            return;
        }

        $map = $this->container->getMap();
        if($map !== null) {
            $map->current_position->x = (int)($json['map']['x'] ?? 0);
            $map->current_position->y = (int)($json['map']['y'] ?? 0);
        }

        $character = $this->container->getCharacter();
        if($character !== null) {
            $character->name = $json['character']['name'] ?? $character->name;
            $character->gender = $json['character']['gender'] ?? $character->gender;
            $stats = $json['character']['statistics'] ?? [];
            foreach($stats as $k=>$v) { $character->statistics->set($k, (int)$v); }
        }

        $this->container->getPrettyPrinter()?->writeLn('Partie chargée.', 'green');
    }
}
