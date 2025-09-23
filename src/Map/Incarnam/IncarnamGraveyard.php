<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Incarnam\Graveyard\Master_Donge;
use App\Monster\Incarnam\Graveyard\Chafer;
use App\Monster\Incarnam\Graveyard\Archer_Chafer;

class IncarnamGraveyard extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, -1);
    }

    public function name(): string { return 'Incarnam - Cimetière'; }
    public function description(): string { return 'Des âmes errantes hantent ces lieux.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new Master_Donge()]; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Chafer(), new Archer_Chafer()]; }
}