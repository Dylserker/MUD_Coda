<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;

class IncarnamTraverser2 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
    $this->position = new Position(2, 0);
    }

    public function name(): string { return 'Incarnam - Traverser 2'; }
    public function description(): string { return 'Le passage numéro 2 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return []; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
