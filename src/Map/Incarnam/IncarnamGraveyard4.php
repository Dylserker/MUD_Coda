<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamGraveyard4 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(6, -3);
    }

    public function name(): string { return 'Incarnam - Cimetière 4'; }
    public function description(): string { return 'Cimetière numéro 4 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
