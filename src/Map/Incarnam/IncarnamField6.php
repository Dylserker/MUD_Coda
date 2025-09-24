<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamField6 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(1, 2);
    }

    public function name(): string { return 'Incarnam - Champ 6'; }
    public function description(): string { return 'Champ numéro 6 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('field');
    }
}
