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
        return ['savegame.save', 'savegame.load', 'savegame.choose_and_load'];
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
            case 'savegame.choose_and_load':
                $this->chooseAndLoad();
                break;
        }
    }

    private function ensureSavesDir(): string {
        $dir = rtrim($this->config['directory'], '/');
        if(!is_dir($dir)) { @mkdir($dir, 0777, true); }
        return $dir;
    }

    private function slug(string $name): string {
        $name = trim($name);
        $name = iconv('UTF-8', 'ASCII//TRANSLIT', $name);
        $name = preg_replace('~[^A-Za-z0-9_\-]+~', '_', $name);
        $name = preg_replace('~_+~', '_', $name);
        return trim($name, '._-') ?: 'player';
    }

    private function guessFileNameForCharacter(): string {
        $dir = $this->ensureSavesDir();
        $character = $this->container->getCharacter();
        $slug = $this->slug($character?->name ?? 'player');
        return $dir . '/' . $slug . '.json';
    }

    private function performSave() : void {
        $file = $this->guessFileNameForCharacter();

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
                'race' => $character?->race ?? null,
                'statistics' => $character?->statistics?->asArray() ?? [],
                'equipment' => array_map(function($item){ return $item?->name(); }, $character?->equipment ?? [])
            ],
            'inventory' => array_map(function($item){ return $item->name(); }, $inventory?->inventory ?? []),
            'saved_at' => date('c')
        ];

        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE));
        // Mettre à jour le slot courant pour un prochain load direct
        $this->config['slot'] = basename($file);
        $this->container->getPrettyPrinter()?->writeLn('Sauvegarde effectuée dans ' . basename($file), 'green');
    }

    private function performLoad() : void {
        $dir = $this->ensureSavesDir();
        $file = $dir . '/' . $this->config['slot'];
        if(!is_file($file)) {
            $this->container->getPrettyPrinter()?->writeLn('Aucune sauvegarde trouvée: ' . $this->config['slot'], 'red');
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
            if (isset($json['character']['race'])) {
                $character->race = $json['character']['race'];
            }
            $stats = $json['character']['statistics'] ?? [];
            foreach($stats as $k=>$v) { $character->statistics->set($k, (int)$v); }
        }

        $this->container->getPrettyPrinter()?->writeLn('Partie chargée depuis ' . basename($file), 'green');
    }

    private function chooseAndLoad() : void {
        $pp = $this->container->getPrettyPrinter();
        $dir = $this->ensureSavesDir();
        $files = array_values(array_filter(scandir($dir) ?: [], function($f){ return str_ends_with($f, '.json'); }));

        if(empty($files)) {
            $pp?->writeLn('Aucune sauvegarde disponible.', 'red');
            return;
        }

        $rows = [];
        foreach($files as $i => $f) {
            $path = $dir . '/' . $f;
            $meta = @json_decode(@file_get_contents($path) ?: '', true);
            $title = $meta['game'] ?? 'Inconnue';
            $pname = $meta['character']['name'] ?? 'Inconnu';
            $time = $meta['saved_at'] ?? date('c', @filemtime($path) ?: time());
            $rows[] = [$i, $f, $pname, $title, $time];
        }
        $pp?->writeTable(['Index','Fichier','Personnage','Jeu','Date'], $rows);

        $choice = null;
        while(!is_numeric($choice) || !isset($files[(int)$choice])) {
            $choice = readline('Choisissez une sauvegarde (index) >> ');
        }
        $this->config['slot'] = $files[(int)$choice];
        $this->performLoad();
    }
}
