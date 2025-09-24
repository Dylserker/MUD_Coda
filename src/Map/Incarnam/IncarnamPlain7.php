<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamPlain7 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(5, 2);
    }

    public function name(): string { return 'Incarnam - Plaine 7'; }
    public function description(): string { return 'Plaine numéro 7 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new \App\Npc\Incarnam\Marylork()]; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('plain');
    }
}
