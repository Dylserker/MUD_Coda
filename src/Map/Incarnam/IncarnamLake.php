<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Incarnam\Lake\Grandmother_Pipette;
use App\Monster\Incarnam\Lake\Puddles;
use App\Monster\Incarnam\Lake\Droplets;

class IncarnamLake extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(-1, 0);
    }

    public function name(): string { return 'Incarnam - Lac'; }
    public function description(): string { return 'Un lac limpide entouré de brumes.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new Grandmother_Pipette()]; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Puddles(), new Droplets()]; }
}