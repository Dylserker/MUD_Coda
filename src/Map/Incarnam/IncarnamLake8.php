<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamLake8 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(1, -3);
    }

    public function name(): string { return 'Incarnam - Lac 8'; }
    public function description(): string { return 'Lac numéro 8 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('lake');
    }
}
