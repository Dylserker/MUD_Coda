<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Incarnam\Plain\Charle_IA;
use App\Monster\Incarnam\Plain\Boufton;
use App\Monster\Incarnam\Plain\Bouftou;

class IncarnamPlain extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 1);
    }

    public function name(): string { return 'Incarnam - Plaine'; }
    public function description(): string { return 'Une vaste plaine balayée par le vent.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new Charle_IA()]; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Boufton(), new Bouftou()]; }
}