<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamField9 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 3);
    }

    public function name(): string { return 'Incarnam - Champ 9'; }
    public function description(): string { return 'Champ numéro 9 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('field');
    }
}
