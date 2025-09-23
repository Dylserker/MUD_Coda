<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Incarnam\Forest\Ana_Trok;
use App\Monster\Incarnam\Forest\Prespic;
use App\Monster\Incarnam\Forest\Wild_Boar;

class IncarnamForest extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(1, 0);
    }

    public function name(): string { return 'Incarnam - Forêt'; }
    public function description(): string { return 'Une forêt dense et mystérieuse.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new Ana_Trok()]; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Prespic(), new Wild_Boar()]; }
}