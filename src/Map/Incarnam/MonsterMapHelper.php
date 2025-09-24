<?php

namespace App\Map\Incarnam;

class MonsterMapHelper
{
    public static function getMonstersForType(string $type): array
    {
        switch (strtolower($type)) {
            case 'field':
                return [
                    'Tofu',
                    'Wild_Sunflower',
                ];
            case 'forest':
                return [
                    'Prespic',
                    'Wild_Boar',
                ];
            case 'graveyard':
                return [
                    'Archer_Chafer',
                    'Chafer',
                ];
            case 'lake':
                return [
                    'Droplets',
                    'Puddles',
                ];
            case 'plain':
                return [
                    'Boufton',
                    'Bouftou',
                ];
            default:
                return [];
        }
    }
}
