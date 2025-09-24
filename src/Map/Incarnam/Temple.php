<?php

namespace App\Map\Incarnam;

use App\Staurie\Component\Map\Blueprint;
use App\Staurie\Game\Position\Position;

class Temple extends Blueprint
{
    private Position $position;

    public function __construct()
    {
    $this->position = new Position(0, 0);
    }

    public function name(): string { return 'Incarnam - Temple'; }
    public function description(): string { return 'Le temple d\'Incarnam, baigné de lumière.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new \App\Npc\Incarnam\JulienGi()]; }
    public function items(): array { return []; }
    public function monsters(): array { return []; }
}
