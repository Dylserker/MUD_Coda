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
use App\Component\SaveGame\SaveGame;
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

$character = $container->getCharacter();
$character->configuration([
    'ask_name' => false,
    'ask_gender' => false,
    'name' => 'Héro',
    'gender' => 'X'
]);

$staurie->run();