<?php

namespace App\Map\Incarnam;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamTraverser5 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
    $this->position = new Position(5, 0);
    }

    public function name(): string { return 'Incarnam - Traverser 5'; }
    public function description(): string { return 'Le passage numéro 5 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
