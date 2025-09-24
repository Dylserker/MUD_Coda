<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamGraveyard6 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(5, -4);
    }

    public function name(): string { return 'Incarnam - Cimetière 6'; }
    public function description(): string { return 'Cimetière numéro 6 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('graveyard');
    }
}
