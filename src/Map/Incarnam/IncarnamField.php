<?php

namespace App\Map\Incarnam;

use Jugid\Staurie\Component\Map\Blueprint;
use Jugid\Staurie\Game\Position\Position;
use App\Npc\Incarnam\Field\Tripin;
use App\Monster\Incarnam\Field\Tofu;
use App\Monster\Incarnam\Field\Wild_Sunflower;

class IncarnamField extends Blueprint
{
    private Position $position;

    public function __construct()
    {
        $this->position = new Position(0, 0);
    }

    public function name(): string { return 'Incarnam - Champ'; }
    public function description(): string { return 'Les champs paisibles d\'Incarnam.'; }
    public function position(): Position { return $this->position; }

    public function npcs(): array { return [new Tripin()]; }
    public function items(): array { return []; }
    public function monsters(): array { return [new Tofu(), new Wild_Sunflower()]; }
}