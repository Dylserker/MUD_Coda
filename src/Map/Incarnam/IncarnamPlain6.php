<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamPlain6 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(4, 2);
    }

    public function name(): string { return 'Incarnam - Plaine 6'; }
    public function description(): string { return 'Plaine numéro 6 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new \App\Npc\Incarnam\Xelorat()]; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('plain');
    }
}
