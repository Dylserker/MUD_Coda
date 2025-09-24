<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Map\Helper\MonsterMapHelper;

if (class_exists(MonsterMapHelper::class)) {
    echo "MonsterMapHelper chargée !\n";
} else {
    echo "MonsterMapHelper introuvable !\n";
}
