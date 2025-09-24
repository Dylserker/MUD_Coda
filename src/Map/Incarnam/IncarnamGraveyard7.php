<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamGraveyard7 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(6, -4);
    }

    public function name(): string { return 'Incarnam - Cimetière 7'; }
    public function description(): string { return 'Cimetière numéro 7 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('graveyard');
    }
}
