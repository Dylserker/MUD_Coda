<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamLake10 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(1, -4);
    }

    public function name(): string { return 'Incarnam - Lac 10'; }
    public function description(): string { return 'Lac numéro 10 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('lake');
    }
}
