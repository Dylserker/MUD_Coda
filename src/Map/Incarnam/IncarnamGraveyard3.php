<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamGraveyard3 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(5, -3);
    }

    public function name(): string { return 'Incarnam - Cimetière 3'; }
    public function description(): string { return 'Cimetière numéro 3 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('graveyard');
    }
}
