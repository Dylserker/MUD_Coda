<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamLake9 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(2, -3);
    }

    public function name(): string { return 'Incarnam - Lac 9'; }
    public function description(): string { return 'Lac numéro 9 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('lake');
    }
}
