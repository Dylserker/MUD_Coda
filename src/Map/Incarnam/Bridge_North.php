<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class Bridge_North extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 2);
    }

    public function name(): string { return 'Incarnam - Pont Nord'; }
    public function description(): string { return 'Un pont menant vers le temple.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
