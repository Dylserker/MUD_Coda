<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamLake3 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(2, -1);
    }

    public function name(): string { return 'Incarnam - Lac 3'; }
    public function description(): string { return 'Lac numéro 3 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
