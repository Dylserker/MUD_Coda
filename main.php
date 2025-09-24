<?php

use App\Staurie\Component\Character\MainCharacter;
use App\Staurie\Component\Console\Console;
use App\Staurie\Component\Introduction\Introduction;
use App\Staurie\Component\Inventory\Inventory;
use App\Staurie\Component\Level\Level;
use App\Staurie\Component\Map\Map;
use App\Staurie\Component\Menu\Menu;
use App\Staurie\Component\Money\Money;
use App\Staurie\Component\PrettyPrinter\PrettyPrinter;
use App\Staurie\Component\Race\Race;
use App\Component\Races\Sacrieur;
use App\Component\Races\Eniripsa;
use App\Component\Races\Feca;
use App\Component\SaveGame\SaveGame;
use App\Component\Fight\Fight;
use App\Staurie\Staurie;

require_once __DIR__.'/vendor/autoload.php';

$staurie = new Staurie('Incarnam - Monde de Coda');
$staurie->register([
    Console::class,
    PrettyPrinter::class,
    MainCharacter::class,
    Inventory::class,
    Level::class
]);

$container = $staurie->getContainer();

$menu = $container->registerComponent(Menu::class);
$menu->configuration([
    'text'=> "Bienvenue dans Incarnam (Coda)",
    'labels'=> [
        'new_game' => 'Entrer dans le monde',
        'continue' => 'Continuer la partie',
        'quit'=> 'Quitter le jeu',
    ]
]);

$map = $container->registerComponent(Map::class);
$map->configuration([
    'directory'=>__DIR__.'/src/Map/Incarnam',
    'namespace'=>'App\\Map\\Incarnam',
    'navigation'=>true,
    'map_enable'=>true,
    'compass_enable'=>true,
    'x_start'=>0,
    'y_start'=>0
]);

$introduction = $container->registerComponent(Introduction::class);
$introduction->configuration([
    'text'=>[
        'Bienvenue aventurier !',
        'Utilisez les commandes pour vous déplacer et interagir.',
    ],
    'title'=>'Chapitre 1 : Le Début',
    'scrolling'=>false
]);

$money = $container->registerComponent(Money::class);
$money->configuration([
    'name' => 'Kamas',
    'start_with' => 100
]);

$save = $container->registerComponent(SaveGame::class);
$save->configuration([
    'directory' => __DIR__.'/saves',
    'slot' => 'slot1.json'
]);

$race = $container->registerComponent(Race::class);
$race->configuration([
    'races' => [Sacrieur::class, Eniripsa::class, Feca::class]
]);

$fight = $container->registerComponent(Fight::class);

$character = $container->getCharacter();
$character->configuration([
    'ask_name' => true,
    'ask_gender' => true,
    'character_has_name' => true,
    'character_has_gender' => true
]);

$staurie->run();