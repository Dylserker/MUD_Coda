<?php

use Jugid\Staurie\Component\Character\MainCharacter;
use Jugid\Staurie\Component\Console\Console;
use Jugid\Staurie\Component\Introduction\Introduction;
use Jugid\Staurie\Component\Inventory\Inventory;
use Jugid\Staurie\Component\Level\Level;
use Jugid\Staurie\Component\Map\Map;
use Jugid\Staurie\Component\Menu\Menu;
use Jugid\Staurie\Component\Money\Money;
use Jugid\Staurie\Component\PrettyPrinter\PrettyPrinter;
use Jugid\Staurie\Component\Race\Race;
use App\Component\Races\Sacrieur;
use App\Component\Races\Eniripsa;
use App\Component\Races\Feca;
use App\Component\SaveGame\SaveGame;
use App\Component\Fight\Fight;
use Jugid\Staurie\Staurie;

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