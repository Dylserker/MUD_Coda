<?php
namespace App\Map\Helper;

use App\Monster\Incarnam\Field\Tofu;
use App\Monster\Incarnam\Field\Wild_Sunflower;
use App\Monster\Incarnam\Forest\Prespic;
use App\Monster\Incarnam\Forest\Wild_Boar;
use App\Monster\Incarnam\Graveyard\Archer_Chafer;
use App\Monster\Incarnam\Graveyard\Chafer;
use App\Monster\Incarnam\Lake\Droplets;
use App\Monster\Incarnam\Lake\Puddles;
use App\Monster\Incarnam\Plain\Boufton;
use App\Monster\Incarnam\Plain\Bouftou;

interface MonsterInterface
{
    public function getXpReward(): int;
    public function getStats(): \App\Component\StatsInterface;
}

class MonsterMapHelper
{
    public static function getMonstersForType(string $type): array
    {
        switch (strtolower($type)) {
            case 'field':
                return [
                    new Tofu(),
                    new Wild_Sunflower(),
                ];
            case 'forest':
                return [
                    new Prespic(),
                    new Wild_Boar(),
                ];
            case 'graveyard':
                return [
                    new Archer_Chafer(),
                    new Chafer(),
                ];
            case 'lake':
                return [
                    new Droplets(),
                    new Puddles(),
                ];
            case 'plain':
                return [
                    new Boufton(),
                    new Bouftou(),
                ];
            default:
                return [];
        }
    }
}
