<?php

namespace App\Map\Incarnam;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class IncarnamTraverser4 extends Blueprint
{
    private Position $position;

    public function __construct()
    {
    $this->position = new Position(4, 0);
    }

    public function name(): string { return 'Incarnam - Traverser 4'; }
    public function description(): string { return 'Le passage numéro 4 d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new \App\Npc\Incarnam\Pipelette()]; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
