<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamPlain5 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(3, 2);
    }

    public function name(): string { return 'Incarnam - Plaine 5'; }
    public function description(): string { return 'Plaine numéro 5 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('plain');
    }
}
