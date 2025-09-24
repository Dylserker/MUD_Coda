<?php

namespace App\Map\Incarnam;
use App\Map\Helper\MonsterMapHelper;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamPlain2 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(4, 1);
    }

    public function name(): string { return 'Incarnam - Plaine 2'; }
    public function description(): string { return 'Plaine numéro 2 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array {
        return MonsterMapHelper::getMonstersForType('plain');
    }
}
